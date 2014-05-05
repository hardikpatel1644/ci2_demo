
<?php echo $this->session->flashdata('succ_msg'); ?>
<?=form_open('login',array('name'=>'login'))?>		

		<?=validation_errors()?>
		<?=(isset($msg))?'<div class="form-error">'.$msg.'</div>':''?>
		<?
			if(set_value('email')) :
				$ssEmailVal = set_value('email');
			elseif(isset($ssEmail) && $ssEmail!='') :
				$ssEmailVal = $ssEmail;
			else :
				$ssEmailVal = '';
			endif;
		?>


<table>
<tr>
	<td style="text-align:right;"> Email : </td>
	<td><? $attributes = array('id' => 'email', 'name' => 'email','class'=>'login_input', 'tabindex' => '1', 'value' => $ssEmailVal); ?>
		<label><?=form_input($attributes)?></label>
	</td>
</tr>

<tr>
	<td style="text-align:right;"> Password : </td>
	<td><? $attributes = array('id' => 'password', 'name' => 'password','class'=>'login_input', 'tabindex' => '1'); ?>
		<label><?=form_password($attributes)?></label>
	</td>
</tr>

<tr>
	<td> &nbsp;</td>
	<td><input name="submit" tabindex="3"  type = "submit" value="Submit" alt="Submit"></td>
</tr>

</table>

<?php echo form_close();?>

