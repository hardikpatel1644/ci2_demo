<?php

$config = array(
'login' => array(
array('field' => 'email','label' => 'Email','rules' => 'trim|valid_email|required|xss_clean'),
array('field' => 'password','label' => 'Password','rules' => 'trim|required|xss_clean')
),
'user/changepassword' => array(
array('field' => 'oldPassword','label' => 'Old Password','rules' => 'trim|required|min_length[6]|max_length[25]|xss_clean'),
array('field' => 'newPassword','label' => 'New Password','rules' => 'trim|required|min_length[6]|max_length[25]|xss_clean'),
array('field' => 'confirmPassword','label' => 'Confirm Password','rules' => 'trim|required|matches[password]|xss_clean')

),
'forgot_password' => array(
array('field' => 'femail','label' => 'Email','rules' => 'trim|valid_email|required|xss_clean'),
),
'admin/user/add' => array(
array('field' => 'first_name','label' => 'First Name','rules' => 'trim|required|max_length[255]|xss_clean'),
array('field' => 'last_name','label' => 'Last Name','rules' => 'trim|required|max_length[255]|xss_clean'),
array('field' => 'group_id','label' => 'Group',	'rules' => 'trim|required|xss_clean'),
array('field' => 'email','label' => 'Email','rules' => 'trim|valid_email|required|callback_validate_unique[email]|xss_clean'),
array('field' => 'password','label' => 'Password','rules' => 'trim|required|min_length[6]|max_length[25]|xss_clean'),
array('field' => 'password_repeat','label' => 'Repeated Password','rules' => 'trim|required|matches[password]|xss_clean')
),
'admin/user/edit' => array(
array('field' => 'first_name','label' => 'First Name','rules' => 'trim|required|max_length[255]|xss_clean'),
array('field' => 'last_name','label' => 'Last Name','rules' => 'trim|required|max_length[255]|xss_clean'),
array('field' => 'group_id','label' => 'Group',	'rules' => 'trim|required|xss_clean'),
array('field' => 'email','label' => 'Email','rules' => 'trim|valid_email|required|callback_validate_unique[email]|xss_clean'),
array('field' => 'password','label' => 'Password','rules' => 'trim|required|min_length[6]|max_length[25]|xss_clean'),
array('field' => 'email','label' => 'Email','rules' => 'trim|valid_email|required|callback_validate_unique[email]|xss_clean'),

),
'admin/mailuser' => array(
array('field' => 'subject','label' => 'Subject','rules' => 'trim|required|xss_clean'),
array('field' => 'content','label' => 'Content','rules' => 'trim|required|xss_clean')
),
'admin/instance/add' => array(
array('field' => 'instance_name','label' => 'Instance Name','rules' => 'trim|required|max_length[255]|callback_validate_regex|xss_clean')
//array('field' => 'instance_name','label' => 'Instance Name','rules' => 'trim|required|max_length[255]|xss_clean')
),
'admin/transfer' => array(
array('field' => 'id_instance','label' => 'Instance','rules' => 'trim|required|max_length[255]|xss_clean'),
),
'admin/user/transfer' => array(
array('field' => 'id_user','label' => 'User','rules' => 'trim|required|xss_clean'),
),
'admin/instance/edit' => array(
array('field' => 'instance_name','label' => 'Instance Name','rules' => 'trim|required|max_length[255]|callback_validate_regex|xss_clean')
//array('field' => 'instance_name','label' => 'Instance Name','rules' => 'trim|required|max_length[255]|xss_clean')
),
'deck/categories/add' => array(
array('field' => 'category_name','label' => 'Category Name','rules' => 'trim|required|max_length[255]|callback_validate_unique[category_name]|xss_clean')
),
'deck/categories/edit' => array(
array('field' => 'category_name','label' => 'Category Name','rules' => 'trim|required|max_length[255]|callback_validate_unique[category_name]|xss_clean')
),
'deck/decks/add' => array(
array('field' => 'deck_name','label' => 'Deck Name','rules' => 'trim|required|max_length[255]|callback_deck_unique[deck_name]|xss_clean'),
array('field' => 'id_category','label' => 'Category','rules' => 'trim|required|max_length[255]|xss_clean'),
array('field' => 'deck','label' => 'Deck','rules' => 'callback_validate_file[deck]|xss_clean'),
/*array('field' => 'date1','label' => 'Start Date','rules' => 'trim|required|callback_validate_date[date1]|xss_clean'),
array('field' => 'date2','label' => 'End Date','rules' => 'trim|required|callback_validate_date[date2]|callback_datecompare[date1]|xss_clean'),*/
array('field' => 'description','label' => 'description','rules'=>'xss_clean')
),
'deck/download' => array(
array('field' => 'downloadName','label' => 'Download Name','rules' => 'trim|required|max_length[50]|xss_clean')
),
'deck/update' => array(
array('field' => 'id_category','label' => 'Category','rules' => 'trim|required|max_length[255]|xss_clean'),
array('field' => 'deck','label' => 'Deck','rules' => 'callback_validate_file[deck]|xss_clean'),
array('field' => 'date1','label' => 'Start Date','rules' => 'trim|required|callback_validate_date[date1]|xss_clean'),
/*array('field' => 'date2','label' => 'End Date','rules' => 'trim|required|callback_validate_date[date2]|callback_datecompare[date1]|xss_clean'),*/
array('field' => 'description','label' => 'description','rules'=>'xss_clean')
),


'deck/bracket' => array(
array('field' => 'selSlide','label' => 'filename','rules' => 'trim|required|xss_clean'),
array('field' => 'bracket_color','label' =>'bracket','rules' => 'trim|required|xss_clean'),
),


'deck/transferbracket' => array(
array('field' => 'bracket_color','label' => 'Bracket Color','rules' => 'trim|required|xss_clean'),
),

'deck/create_selection' => array(
array('field' => 'selectionName','label' => 'Selection Name','rules' => 'trim|required|max_length[255]|callback_validate_select[selectionName]|xss_clean')
),

'profile' => array(
array('field' => 'first_name','label' => 'First Name','rules' => 'trim|required|max_length[255]|xss_clean'),
array('field' => 'last_name','label' => 'Last Name','rules' => 'trim|required|max_length[255]|xss_clean'),
array('field' => 'email','label' => 'Email','rules' => 'trim|valid_email|required|callback_validate_unique[email]|xss_clean'),
array('field' => 'password','label' => 'Password','rules' => 'trim|min_length[6]|max_length[25]|callback_pwcheck[repassword]|xss_clean'),
array('field' => 'repassword','label' => 'Re-type Password','rules' => 'trim|min_length[6]|max_length[25]|xss_clean'),
/*array('field' => 'open_id','label' => 'Open Id','rules' => 'trim|valid_email|callback_validate_unique[email]|xss_clean'),*/

),

'profile/changePassword' => array(
array('field' => 'password','label' => 'Password','rules' => 'trim|required|min_length[6]|max_length[25]|xss_clean'),
array('field' => 'confirm_password','label' => 'Confirm Password','rules' => 'trim|required|matches[password]|xss_clean')

),


'deck/editrange' => array(
array('field' => 'date1','label' => 'Start Date','rules' => 'trim|required|callback_validate_date[date1]|xss_clean'),
/*array('field' => 'date2','label' => 'End Date','rules' => 'trim|required|callback_validate_date[date2]|callback_datecompare[date1]|xss_clean'),*/
),

'admin/cmspages/edit' => array(
array('field' => 'page_name','label' => 'Page Name','rules' => 'trim|required|max_length[255]|xss_clean'),
),

'admin/switchinstance' => array(
array('field' => 'id_instance','label' => 'Instance','rules' => 'trim|required|xss_clean'),
array('field' => 'id_user','label' => 'Admin','rules' => 'trim|required|xss_clean')
),
'deck/cattransfer' => array(
array('field' => 'id_category','label' => 'Category','rules' => 'trim|required|max_length[255]|xss_clean'),
),

'forms/add' => array(
array('field' => 'id_user','label' => 'Assign to','rules' => 'trim|required|xss_clean'),
array('field' => 'id_fcategory','label' => 'Form Category','rules' => 'trim|required|xss_clean'),
array('field' => 'vform_title','label' => 'Form Title','rules' => 'trim|required|xss_clean'),
array('field' => 'tform_desc','label' => 'From Description','rules' => 'trim|required|xss_clean')
),

'formadmin/fromcategories/edit' => array(
array('field' => 'fcategory_name','label' => 'Category Name','rules' => 'trim|required|max_length[255]|callback_validate_unique[fcategory_name]|xss_clean')
),


'user/registration' => array(
array('field' => 'company_name','label' => 'Company Name','rules' => 'trim|required|xss_clean'),
array('field' => 'first_name','label' => 'First Name','rules' => 'trim|required|xss_clean'),
array('field' => 'last_name','label' => 'Last Name','rules' => 'trim|required|xss_clean'),
array('field' => 'address1','label' => 'Address Line 1','rules' => 'trim|required|xss_clean'),
array('field' => 'address2','label' => 'Address Line 2','rules' => 'trim|required|xss_clean'),
array('field' => 'town','label' => 'Town','rules' => 'trim|required|xss_clean'),
array('field' => 'county','label' => 'County','rules' => 'trim|required|xss_clean'),
array('field' => 'post_code','label' => 'Post Code','rules' => 'trim|required|xss_clean'),
array('field' => 'email','label' => 'Email','rules' => 'trim|required|callback_validate_unique[email]|xss_clean'),
array('field' => 'country','label' => 'Country','rules' => 'trim|required|xss_clean'),
array('field' => 'telephone_no','label' => 'Telephone No','rules' => 'trim|required|xss_clean'),
array('field' => 'address1','label' => 'Address Line 1','rules' => 'trim|required|xss_clean'),
array('field' => 'address2','label' => 'Address Line 2','rules' => 'trim|required|xss_clean'),
array('field' => 'plan_type','label' => 'Plan Type','rules' => 'trim|required|max_length[255]|xss_clean'),
array('field' => 'plan_duration','label' => 'Plan Duration','rules' => 'trim|required|max_length[255]|xss_clean'),
array('field' => 'add_licence','label' => 'Additional Licence','rules' => 'trim|numeric|max_length[10]|xss_clean'),
array('field' => 'total','label' => 'Total','rules' => 'trim|xss_clean'),
array('field' => 'card_type','label' => 'Card Type','rules' => 'trim|required|xss_clean'),
array('field' => 'card_number','label' => 'Card Number','rules' => 'trim|required|callback_validateCreditcard_number[card_type]|xss_clean'),
array('field' => 'expire_month','label' => 'Expire Month','rules' => 'trim|required|xss_clean'),
array('field' => 'expire_year','label' => 'Expire Year','rules' => 'trim|required|callback_validateCreditCardExpirationDate[expire_month]|xss_clean'),
array('field' => 'card_varification_no','label' => 'Card Varification Number','rules' => 'trim|required|callback_validateCVV[card_number]|xss_clean'),

),



'systemsettings/editcmspage' => array(
array('field' => 'page_name','label' => 'Page Name','rules' => 'trim|required|max_length[255]|xss_clean'),
),
'systemsettings/priceplan' => array(
array('field' => 'price_value[1]','label' => 'Price Value','rules' => 'trim|numeric|max_length[10]|xss_clean'),
array('field' => 'price_value[2]','label' => 'Price Value','rules' => 'trim|numeric|max_length[10]|xss_clean'),
array('field' => 'price_value[3]','label' => 'Price Value','rules' => 'trim|numeric|max_length[10]|xss_clean'),
array('field' => 'price_value[4]','label' => 'Price Value','rules' => 'trim|numeric|max_length[10]|xss_clean')

),
'admin/user/add_client' => array(
array('field' => 'company_name','label' => 'Company Name','rules' => 'trim|required|max_length[255]|xss_clean'),
array('field' => 'first_name','label' => 'First Name','rules' => 'trim|required|max_length[255]|xss_clean'),
array('field' => 'last_name','label' => 'Last Name','rules' => 'trim|required|max_length[255]|xss_clean'),
array('field' => 'plan_type','label' => 'Plan Type','rules' => 'trim|required|max_length[255]|xss_clean'),

array('field' => 'add_licence','label' => 'Additional Licence','rules' => 'trim|numeric|max_length[10]|xss_clean'),
array('field' => 'add1','label' => 'Address Line 1','rules' => 'trim|required|max_length[255]|xss_clean'),

array('field' => 'add2','label' => 'Address Line 2','rules' => 'trim|max_length[255]|xss_clean'),
array('field' => 'town','label' => 'Town / City','rules' => 'trim|required|max_length[255]|xss_clean'),
array('field' => 'county','label' => 'County / Region','rules' => 'trim|required|max_length[255]|xss_clean'),
array('field' => 'country','label' => 'Country','rules' => 'trim|required|max_length[255]|xss_clean'),
array('field' => 'post_code','label' => 'Post Code /Postal Code','rules' => 'trim|required|max_length[255]|xss_clean'),
array('field' => 'tele_number','label' => 'Telephone Number','rules' => 'trim|required|max_length[255]|xss_clean'),
array('field' => 'email','label' => 'Email','rules' => 'trim|valid_email|required|callback_validate_unique[email]|xss_clean')
),

'cms/add' => array(
array('field' => 'title','label' => 'Title','rules' => 'trim|required|xss_clean'),
array('field' => 'short_desc','label' => 'Short Description','rules' => 'trim|required|xss_clean'),
array('field' => 'long_desc','label' => 'Long Description','rules' => 'trim|required|xss_clean'),

),


'admin/user/edit_client' => array(
array('field' => 'company_name','label' => 'Company Name','rules' => 'trim|required|max_length[255]|xss_clean'),
array('field' => 'first_name','label' => 'First Name','rules' => 'trim|required|max_length[255]|xss_clean'),
array('field' => 'last_name','label' => 'Last Name','rules' => 'trim|required|max_length[255]|xss_clean'),
array('field' => 'plan_type','label' => 'Plan Type','rules' => 'trim|required|max_length[255]|xss_clean'),

array('field' => 'add_licence','label' => 'Additional Licence','rules' => 'trim|numeric|max_length[10]|xss_clean'),
array('field' => 'add1','label' => 'Address Line 1','rules' => 'trim|required|max_length[255]|xss_clean'),
array('field' => 'town','label' => 'City','rules' => 'trim|required|max_length[255]|xss_clean'),
array('field' => 'county','label' => 'Region','rules' => 'trim|required|max_length[255]|xss_clean'),
array('field' => 'country','label' => 'Country','rules' => 'trim|required|max_length[255]|xss_clean'),
array('field' => 'post_code','label' => 'Postal Code','rules' => 'trim|required|max_length[255]|xss_clean'),
array('field' => 'tele_number','label' => 'Telephone Number','rules' => 'trim|required|max_length[255]|xss_clean'),
array('field' => 'email','label' => 'Email','rules' => 'trim|valid_email|required|callback_validate_unique[email]|xss_clean'),
array('field' => 'password','label' => 'Password','rules' => 'trim|min_length[6]|max_length[25]|matches[rep_password]|xss_clean'),
array('field' => 'rep_password','label' => 'Repeat Password','rules' => 'trim|min_length[6]|max_length[25]|xss_clean')
),

);
