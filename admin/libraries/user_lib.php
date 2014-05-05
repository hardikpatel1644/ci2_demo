<?php

class User_lib {
	
	var $_obj;
	
	function User_lib()
	{
		$this->_obj =& get_instance();
	}

	function check_access($userid=0,$type='',$module = '')
	{
		if($userid==0||$type=='') return FALSE;
		
		$data = $this->_obj->user_model->get_user_permissions($userid,$module);
		
		if(empty($data)) return FALSE;
		
		if($type=='permissions') {
			return TRUE;
		}
		else {
			if($data[$type]==1) {
				return TRUE;
			}
			
			return FALSE;
		}
	}
	
	
	function check_can_edit_user($groupid=0,$adminid=0)
	{
		if(!is_numeric($groupid)||!is_numeric($adminid)) return FALSE;
		
		$query = $this->_obj->db->query('SELECT
																*
															FROM
																`user`
															WHERE
																`id` = '.$adminid.'
															AND
																`group_id` <= '.$groupid.'');
																
		if($query->num_rows()!=0) return TRUE;
		
		return FALSE;
	}         
	function check_access_cms($userid=0,$catid=0)
	{
		$data = $this->_obj->user_model->get_cms_permissions($catid);
		$asGroupName = $this->_obj->user_model->get_user_group_name($userid);
		
		if(empty($data)) return FALSE;
		
		if($data[$asGroupName['group_name']]==1) 
		{
				return TRUE;
		}
			
		return FALSE;
		
	}
	
}
