<script type="text/javascript">
$(document).ready(function () 
{		
	$("#forgotbox").show();
	return false;
	});
});
</script>
<div id="login-holder"><!-- start logo -->
<div id="logo-login"><a href="index.html"><span>Hardik Patel</span><!-- <img src="<?php echo base_url(); ?>public/admin/images/shared/logo.png" width="156" height="40" alt="" /> --></a>
</div>
<!-- end logo -->

<div class="clear"></div>




<!--  start forgotbox ................................................................................... -->
<div id="forgotbox" style="display:block;">
<?php echo $this->session->flashdata('succ_msg'); ?>
<div id="forgotbox-text">Please send us your email and we'll reset your
password.</div>
<!--  start forgot-inner -->
<div id="forgot-inner">
<?=form_open('user/forgotpassword',array('name'=>'forgotPass'))?>
<table border="0" cellpadding="0" cellspacing="0">
	<?php if(form_error('femail')):?>
	<tr>
		<td>&nbsp;</td>
		<td><?php echo  form_error('femail')?></td>
	</tr>
	<?php endif;?>
	<tr>
		<th>Email address:</th>

<td><? $attributes = array('id' => 'femail', 'name' => 'femail','class'=>'login-inp', 'tabindex' => '1'); ?>
		<?=form_input($attributes)?></td>
		
	</tr>
	<tr>
		<th></th>
		<td><? $attributes = array('id' => 'btnForgotPass', 'name' => 'btnForgotPass','class'=>'submit-login', 'tabindex' => '1'); ?>
		<?=form_submit($attributes)?></td>
	</tr>
</table>
<?php echo form_close();?>
</div>
<!--  end forgot-inner -->
<div class="clear"></div>

</div>
<!--  end forgotbox --></div>
