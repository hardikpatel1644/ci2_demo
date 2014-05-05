<?php

class Auth {

    var $_obj;
    var $_user;

    /**
     * Function to call contructor
     * @return unknown_type
     */
    function Auth() {
        $this->_obj = & get_instance();
        $this->_obj->load->library('session');
        $this->_get_session();
    }

    /**
     * Function to create hash
     * @param $password string
     * @param $email string
     * @param $salt Null
     * return array
     */
    function _hash($ssPassword, $ssEmail, $ssSalt = NULL) {
        //$string = $ssPassword.$ssEmail;
        $ssString = $ssPassword;

        //$encryption_key = $this->_obj->config->item('encryption_key');


        if ($ssSalt === NULL) {
            $ssSalt = sha1(uniqid(rand(), TRUE));
        }

        $ssString = $ssString . $ssSalt;

        $ssHashed = sha1($ssString);

        return array('hashed' => $ssHashed, 'salt' => $ssSalt);
    }

    /**
     * Function to set url in session
     * @param $url string
     */
    function _set_session_url($ssUrl) {
        $data['url'] = $ssUrl;

        $this->_obj->session->set_userdata('url', $asData);
    }

    /**
     * Function to set session for system
     * @param $asUser Array
     * @param $snIdInstance Integer
     * @param $otheruser string
     * return session
     */
    function _set_session_user($asUser, $snIdInstance = '', $otheruser = '') {
        $asData['id'] = $asUser['id'];
        $asData['email'] = $asUser['email'];
        $asData['first_name'] = $asUser['first_name'];
        $asData['last_name'] = $asUser['last_name'];
        $asData['logged_in'] = 1;

        if ($otheruser != '') {
            $this->_obj->session->set_userdata('otherauth', $asData);
        } else {
            $this->_obj->session->set_userdata('auth', $asData);
        }

        $this->_get_session();
    }

    /**
     * Function to get session object
     * return boolean
     */
    function _get_session() {
        $asUser = $this->_obj->session->userdata('auth');

        if ($asUser === FALSE || (isset($asUser['logged_in']) && $asUser['logged_in'] !== '1')) {
            $asUser = array(
                'id' => 0,
                'logged_in' => FALSE
            );

            $this->_user = $asUser;

            return FALSE;
        } else {
            $this->_user = $asUser;

            return TRUE;
        }
    }

    /**
     *
     * Function to clear all session
     * @return unknown_type
     */
    function _clear_session() {
        $this->_obj->session->unset_userdata('auth');
        $this->_obj->session->unset_userdata('otherauth');
        $this->_get_session();
    }

    /**
     *
     * Function to get logged in user.
     * @return boolean
     */
    function logged_in() {
        return $this->_user['logged_in'];
    }

    /**
     *
     * Function to get user data
     * @return object
     */
    function get_user() {
        return $this->_user;
    }

    /**
     * Function to login in system
     * @param $ssEmail String
     * @param $ssPassword string
     * return boolean
     */
    function login($ssEmail, $ssPassword) {
        $snIdInstance = '';
        $this->_obj->db->where('email', $ssEmail);
        $this->_obj->db->where('status', 1);

        $ssQuery = $this->_obj->db->get('user', 1);


        if ($ssQuery->num_rows() == 0) {
            return FALSE;
        }


        $asUser = $ssQuery->row_array();


        $ssHashed = $this->_hash($ssPassword, $ssEmail, $asUser['salt']);


        if ($asUser['password'] == $ssHashed['hashed']) {
            $this->_set_session_user($asUser);

            return TRUE;
        }

        return FALSE;
    }

    /**
     * Fcuntion to create new user
     * @param $asUser array
     * return integer
     */
    function create($asUser = NULL) {
        if (empty($asUser))
            return FALSE;

        $asUser_main = $asUser;

        $encrypted = $this->_hash($asUser['password'], $asUser['email']);

        $clear_password = $asUser['password'];

        $asUser['password'] = $encrypted['hashed'];
        $asUser['salt'] = $encrypted['salt'];

        $this->_obj->db->insert('user', $asUser);
        $snIdUser = $this->_obj->db->insert_id();

        $this->sendMail($asUser_main);

        return $snIdUser;
    }

    /**
     * Function to send mail to user
     * @param $asUser array
     * @param $blChange boolean
     */
    function sendMail($asUser = NULL, $blChange = false) {
        if (empty($asUser))
            return FALSE;
        $config['mailtype'] = 'html';
        $this->_obj->load->library('email', $config);
        $this->_obj->email->from(SYSTEM_URL, SYSTEM_NAME . " Administrator");
        $this->_obj->email->to($asUser['email']);

        if ($blChange == false) {

            $this->_obj->email->subject('Registration Confirmation');
            $message = "
			<table>
				<tr><td colspan='2'>Hello, " . $asUser['first_name'] . "&nbsp;" . $asUser['last_name'] . "</td></tr>	
				<tr><td colspan='2'>&nbsp;</td></tr>
				<tr><td colspan='2'>This mail is confirmation of your registration in <a href='http://jakobox.com'>Jakobox</td></tr>
				<tr><td colspan='2'>&nbsp;</td></tr>
				
				<tr><td colspan='2'>Your account is ready to use. 
				To log in visit http://" . SYSTEM_URL . " and enter the following details</td></tr>
				<tr><td colspan='2'>&nbsp;</td></tr>
				<tr><td width='24'>Username:</td><td>" . $asUser['email'] . "</td></tr>
				<tr><td width='24'>Password:</td><td>" . $asUser['password'] . "</td></tr>
				<tr><td colspan='2'>&nbsp;</td></tr>
				<tr><td colspan='2'>Important: This is a temporary password, please change it immediately.</td></tr>
				<tr><td colspan='2'>&nbsp;</td></tr>
				<tr><td colspan='2'>This email is system generated, please do not reply. If you have any problems contact your system administrator.</td></tr>
				<tr><td colspan='2'>&nbsp;</td></tr>
				<tr><td colspan='2'>Thanks Again</td></tr>
				<tr><td colspan='2'>Jakobox Team</td></tr>
			</table>";
        } else {
            $this->_obj->email->subject('Login Details Changed - ' . SYSTEM_NAME);
            $message = "
			<table>
				<tr><td colspan='2'>Hello, " . $asUser['first_name'] . "&nbsp;" . $asUser['last_name'] . "</td></tr>	
				<tr><td colspan='2'>&nbsp;</td></tr>
				<tr><td colspan='2'>Your login details has been updated in " . SYSTEM_NAME . ".</td></tr>
				<tr><td colspan='2'>&nbsp;</td></tr>
				<tr><td colspan='2'>To log in visit http://" . SYSTEM_URL . " and enter the following details</td></tr>
				<tr><td width='24'>Email:</td><td>" . $asUser['email'] . "</td></tr>
				<tr><td width='24'>Password:</td><td>" . $asUser['password'] . "</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td colspan='2'>Important: This is a temporary password, please change it immediately.</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td colspan='2'>This email is system generated, please do not reply. If you have any problems contact your system administrator.</td></tr>
				<tr><td colspan='2'>&nbsp;</td></tr>
				<tr><td colspan='2'>" . SYSTEM_NAME . "</td></tr>
			</table>";
        }
        $this->_obj->email->message($message);

        $this->_obj->email->send();

        //$this->_obj->email->print_debugger();
    }

    /**
     * Function to send email for new registration and change password
     * @param $ssEmail string
     * @param $ssSubject String
     * @param $ssMsg String
     * @param $bcc string
     * @param $from string
     * @param $asUserName array
     *
     */
    function send_mail($ssEmail, $ssSubject, $ssMsg, $bcc = '0', $from = '', $asUserName = '') {
        $config['mailtype'] = 'html';
        $this->_obj->load->library('email', $config);
        if ($from != '')
            $this->_obj->email->from($from, $asUserName);
        else
            $this->_obj->email->from(SYSTEM_URL, SYSTEM_NAME . " Administrator");
        if ($bcc == '1') {
            $this->_obj->email->to(ADMIN_MAILID);
            $this->_obj->email->bcc($ssEmail);
        } else
            $this->_obj->email->to($ssEmail);
        $this->_obj->email->subject($ssSubject);
        $this->_obj->email->message($ssMsg);
        $this->_obj->email->send();
    }

    /**
     * Function to change password
     * @param $ssNewPw string
     * @param $asUserDetails string
     * return string
     */
    function change_password($ssNewPw, $asUserDetails) {
        $ssHashed = $this->_hash($ssNewPw, $asUserDetails['email'], $asUserDetails['salt']);
        $ssMsg = "
			<table>
				<tr><td colspan='2'>Hello, " . $asUserDetails['first_name'] . "&nbsp;&nbsp;" . $asUserDetails['last_name'] . "</td></tr>	
				<tr><td colspan='2'>This is your new password for Celgip.com.</td></tr>
				<tr><td colspan='2'>Please login with following details of yours.</td></tr>
				<tr><td>Email:</td><td>" . $asUserDetails['email'] . "</td></tr>
				<tr><td>Password:</td><td>" . $ssNewPw . "</td></tr>
				<tr><td colspan='2'><a href='" . site_url() . "' >" . site_url() . "</a></td></tr>
				<tr><td colspan='2'><b>Celgip</b></td></tr>
			</table>";
        $this->send_mail($asUserDetails['email'], "New Password for Celgip", $ssMsg);
        return $ssHashed;
    }

    /**
     * Function to manage users
     * @param $snId integer
     * @param $asUser array
     * @param $snIdInstance integer
     * return array
     */
    function manage($snId = 0, $asUser = NULL, $snIdInstance = 0) {

        if ($snId == 0 || empty($asUser))
            return FALSE;

        $asUser_main = $asUser;

        $encrypted = $this->_hash($asUser['password'], $asUser['email']);

        $clear_password = $asUser['password'];

        $asUser['password'] = $encrypted['hashed'];
        $asUser['salt'] = $encrypted['salt'];


        $this->_obj->db->where('id', $snId);
        $this->_obj->db->update('user', $asUser);

        $this->_obj->db->where('id_parent', $snId);
        $this->_obj->db->update('user', array('parent_name' => $asUser['first_name'] . ' ' . $asUser['last_name']));

        if ($snIdInstance != '') {
            $this->_obj->db->where('id', $snId);
            $ssQuery = $this->_obj->db->get('instance_user');
            $num = $this->_obj->db->affected_rows();
            if ($num > 0) {
                $result = $ssQuery->row_array();
                if ($result['id_instance'] != $snIdInstance && $snIdInstance != 0) {
                    $this->_obj->db->where('id', $snId);
                    $this->_obj->db->update('instance_user', array('id_instance' => $snIdInstance));
                } else if ($snIdInstance == 0)
                    $this->_obj->db->delete('instance_user', array('id' => $snId));
            }
            else {
                if ($snIdInstance != 0)
                    $this->_obj->db->insert('instance_user', array('id_instance' => $snIdInstance, 'id' => $snId));
            }
        }

        $this->sendMail($asUser_main, true);

        return $asUser;
    }

    /**
     *
     * Function to logout from system
     * @return unknown_type
     */
    function logout() {

        $this->_clear_session();
        unset($_SESSION);
        session_unset();
        unset($_COOKIE);
        //$this->delFiles("tmp/associations/");
        //$this->delFiles("tmp/nonces/");
    }

    /**
     * Function to delete files from directory
     * @param $dir string
     */
    function delFiles($dir) {
        $files = glob($dir . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (substr($file, -1) == '/')
                delTree($file);
            else
                unlink($file);
        }
        if (is_dir($dir))
            rmdir($dir);
    }

    /**
     * Function to reset password
     * @param $ssEmail string
     * return boolean
     */
    function reset_password($ssEmail) {
        $this->_obj->load->library('email');

        $this->_obj->db->where('email', $ssEmail);
        $ssQuery = $this->_obj->db->get('user', 1);

        if ($ssQuery->num_rows() == 0) {
            return FALSE;
        }

        $asUser = $ssQuery->row_array();

        $hash = substr(sha1($asUser['email'] . rand()), 0, 10);

        $asData = array(
            'reset_password_hash' => $hash
        );

        $this->_obj->db->where('id', $asUser['id']);
        $ssQuery = $this->_obj->db->update('user', $asData);

        return TRUE;
    }

    /**
     * Function to set password
     * @param $snId integer
     * @param $ssPassword string
     * return boolean
     */
    function set_password($snId, $ssPassword) {
        $this->_obj->db->where('id', $snId);
        $ssQuery = $this->_obj->db->get('user', 1);


        if ($ssQuery->num_rows() == 0) {
            return FALSE;
        }

        $asUser = $ssQuery->row_array();


        $new_password = $this->_hash($ssPassword, $asUser['email']);

        $asData = array(
            'password' => $new_password['hashed'],
            'salt' => $new_password['salt']
        );

        $this->_obj->db->where('id', $asUser['id']);
        $this->_obj->db->update('user', $asData);
        //$this->sendMail($asUser,true);

        return TRUE;
    }

    /**
     * Function for edit profile
     *
     * @param $snId = id of user
     * @param $asData = array()
     * @return true or false
     */
    function edit_profile($snId, $asData = array()) {

        $asData = array('first_name' => $asData['first_name'],
            'last_name' => $asData['last_name'],
            'email' => $asData['email'],
            'send_email' => $asData['send_email'],
            'open_id' => $asData['open_id']
        );
        if ($asData['password'] != '') {
            $new_password = $this->_hash($asData['password'], $asData['email']);
            $asData['password'] = $new_password['hashed'];
            $asData['salt'] = $new_password['salt'];
        } else {
            $asData['password'] = $asData['old_password'];
            $asData['salt'] = $asData['old_salt'];
        }

        $this->_obj->db->where('id', $snId);
        $this->_obj->db->update('user', $asData);
        return true;
    }

    /**
     * Function to login by oepn id
     * @param $asUser array
     * return boolean
     */
    function loginByOpenId($asUser) {
        if (sizeof($asUser) > 0) {
            $this->_obj->db->where('id', $asUser['id']);
            $iuquery = $this->_obj->db->get('instance_user');
            $cnt = $iuquery->num_rows();
            $snIdInstance = '';
            if ($cnt > 0) {
                $iresult = $iuquery->row_array();
                $snIdInstance = $iresult['id_instance'];
            }

            $this->_set_session_user($asUser, $snIdInstance);

            return TRUE;
        }

        return FALSE;
    }

    /**
     *
     * Function to genereate random password
     * @return string
     */
    function generate_random_password() {

        $chars = "abcdefghijkmnopqrstuvwxyz023456789";

        srand((double) microtime() * 1000000);

        $i = 0;

        $pass = '';

        while ($i <= 7) {

            $num = rand() % 33;

            $tmp = substr($chars, $num, 1);

            $pass = $pass . $tmp;

            $i++;
        }

        return $pass;
    }

    /*     * ************************************************ Added By Hardik Patel **************** */

    /**
     * Function to send mail for forgotpassword
     * @param $ssEmailTo string
     * @param $asFrom array
     */
    function sendEmailForgotpass($ssEmailTo, $asFrom) {
        if ($ssEmailTo != '' && sizeof($asFrom) > 0 && $asFrom != 0) {
            foreach ($asFrom as $ssValue) {
                $ssNameFrom = $asFrom['first_name'] . " " . $asFrom['last_name'];
                $ssEmailFrom = $asFrom['email'];
                $snIdUser = $asFrom['id'];
            }


            $this->_obj->load->library('email');

            $this->_obj->email->from($ssEmailFrom, $ssNameFrom);
            $this->_obj->email->to($ssEmailTo);
            $ssNewPassword = $this->generateRandomPassword();
            //_pr($ssNewPassword,1);
            $this->set_password($snIdUser, $ssNewPassword); // Change password and salt in database
            $ssMsg = "
			<table>
				<tr><td colspan='2'>Hello, " . $ssNameFrom . "</td></tr>	
				<tr><td colspan='2'>This is your new password for Admin Panel.</td></tr>
				<tr><td colspan='2'>Please login with following details of yours.</td></tr>
				<tr><td>Email:</td><td>" . $ssEmailTo . "</td></tr>
				<tr><td>Password:</td><td>" . $ssNewPassword . "</td></tr>
				<tr><td colspan='2'><a href='" . site_url() . "' >" . site_url() . "</a></td></tr>
				<tr><td colspan='2'><b>Admin</b></td></tr>
			</table>";

            $this->_obj->email->subject('New password created for admin panel');
            $this->_obj->email->message($ssMsg);

            $this->_obj->email->send();

            echo $this->_obj->email->print_debugger();
        }
    }

    /**
     * Function to generate random password
     * return string
     */
    function generateRandomPassword() {

        $ssChars = "abcdefghijkmnopqrstuvwxyz023456789";

        srand((double) microtime() * 1000000);

        $i = 0;

        $ssPass = '';

        while ($i <= 7) {

            $ssNum = rand() % 33;

            $ssTmp = substr($ssChars, $ssNum, 1);

            $ssPass = $ssPass . $ssTmp;

            $i++;
        }

        return $ssPass;
    }

}
