<div id="login-holder"><!-- start logo -->
<div id="logo-login"><a href="index.html"><span>Hardik Patel</span><!-- <img src="<?php echo base_url(); ?>public/admin/images/shared/logo.png" width="156" height="40" alt="" /> --></a>
</div>
<!-- end logo -->

<div class="clear"></div>

<!--  start loginbox ................................................................................. -->
<div id="loginbox"><!--  start login-inner -->
<div id="login-inner"><?php echo $this->session->flashdata('succ_msg'); ?>
<?php echo  form_open('login',array('name'=>'login'))?> <?php echo  (isset($msg))?'<div class="form-error">'.$msg.'</div>':''?>
<?
if(set_value('email')) :
$ssEmailVal = set_value('email');
elseif(isset($ssEmail) && $ssEmail!='') :
$ssEmailVal = $ssEmail;
else :
$ssEmailVal = '';
endif;
?>
<table border="0" cellpadding="0" cellspacing="0">
<?php if(form_error('email')):?>
	<tr>
		<td>&nbsp;</td>
		<td><?php echo  form_error('email')?></td>
	</tr>
	<?php endif;?>
	<tr>
		<th style="text-align: right;">Email : &nbsp;</th>
		<td><? $attributes = array('id' => 'email', 'name' => 'email','class'=>'login-inp', 'tabindex' => '1', 'value' => $ssEmailVal); ?>
		<?php echo  form_input($attributes)?></td>
	</tr>
	<?php if(form_error('password')):?>
	<tr>
		<td>&nbsp;</td>
		<td><?php echo  form_error('password')?></td>
	</tr>
	<?php endif;?>
	<tr>
		<th style="text-align: right;">Password : &nbsp;</th>
		<td><? $attributes = array('id' => 'password', 'name' => 'password','class'=>'login-inp', 'tabindex' => '1','onfocus'=>"this.value=''"); ?>
		<?php echo  form_password($attributes)?></td>
	</tr>
	<tr>
		<th></th>
		<td valign="top"><input type="checkbox" class="checkbox-size"
			id="login-check" /><label for="login-check">Remember me</label></td>
	</tr>
	<tr>
		<th></th>
	
		<td><? $attributes = array('id' => 'login', 'name' => 'login','class'=>'submit-login', 'tabindex' => '1'); ?>
		<?php echo  form_submit($attributes)?></td>
		
		</tr>
</table>
		<?php echo form_close();?></div>
<!--  end login-inner -->
<div class="clear"></div>
<a href="<?php site_url('user/forgotpassword');?>" class="forgot-pwd">Forgot Password?</a></div>
<!--  end loginbox --> <!--  start forgotbox ................................................................................... -->
<div id="forgotbox">
<div id="forgotbox-text">Please send us your email and we'll reset your
password.</div>
<!--  start forgot-inner -->
<div id="forgot-inner">
<?php echo  form_open('user/forgotpassword',array('name'=>'forgotPass'))?>
<table border="0" cellpadding="0" cellspacing="0">
	<tr>
		<th>Email address:</th>

<td><? $attributes = array('id' => 'femail', 'name' => 'femail','class'=>'login-inp', 'tabindex' => '1'); ?>
		<?php echo  form_input($attributes)?></td>
		
	</tr>
	<tr>
		<th></th>
		<td><? $attributes = array('id' => 'btnForgotPass', 'name' => 'btnForgotPass','class'=>'submit-login', 'tabindex' => '1'); ?>
		<?php echo  form_submit($attributes)?></td>
	</tr>
</table>
<?php echo form_close();?>
</div>
<!--  end forgot-inner -->
<div class="clear"></div>
<a href="" class="back-login">Back to login</a></div>
<!--  end forgotbox --></div>
