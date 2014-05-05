
<div id="page-heading">
  <h1>Change Password</h1>
</div>
<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
  <tr>
    <th rowspan="3" class="sized"><img src="<?php echo base_url();?>public/admin/images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
    <th class="topleft"></th>
    <td id="tbl-border-top">&nbsp;</td>
    <th class="topright"></th>
    <th rowspan="3" class="sized"><img src="<?php echo base_url();?>public/admin/images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
  </tr>
  <tr>
    <td id="tbl-border-left"></td>
    <td><!--  start content-table-inner -->
      <div id="content-table-inner">
        <table border="0" width="100%" cellpadding="0" cellspacing="0">
          <tr valign="top">
            <td><!--  start step-holder -->
              <div id="step-holder">
                <div class="step-no">1</div>
                <div class="step-dark-left"><a href="">Change Password</a></div>
                <div class="clear"></div>
              </div>
              <!--  end step-holder -->
              <!-- start id-form -->
              <?php echo form_open('user/changepassword');?>
              <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                <tr>
                  <th valign="top">Old Password :</th>
                  <td><? $attributes = array('id' => 'oldPassword', 'name' => 'oldPassword','class'=>'inp-form', 'tabindex' => '1'); ?>
                    <?=form_input($attributes)?></td>
                  <td>
				  	<?php if(form_error('oldPassword')):?>					
				  		<div class="error-left"></div>
	                    <div class="error-inner"><?php echo form_error('oldPassword');?> </div>
					<?php endif;?>	
					</td>
                </tr>
                <tr>
                  <th valign="top">New Password :</th>
                  <td><? $attributes = array('id' => 'newPassword', 'name' => 'newPassword','class'=>'inp-form', 'tabindex' => '1'); ?>
                    <?=form_input($attributes)?></td>
                  <td>			
					<?php if(form_error('newPassword')):?>					
					<div class="error-left"></div>
					<div class="error-inner"><?php echo form_error('newPassword');?> </div>
					<?php endif;?>	

				</td>
                </tr>
                <tr>
                  <th valign="top">Confirm Password :</th>
                  <td><? $attributes = array('id' => 'confirmPassword', 'name' => 'confirmPassword','class'=>'inp-form', 'tabindex' => '1'); ?>
                    <?=form_input($attributes)?></td>
                  <td>			
					<?php if(form_error('confirmPassword')):?>					
					<div class="error-left"></div>
					<div class="error-inner"><?php echo form_error('confirmPassword');?> </div>
					<?php endif;?>	
				</td>
                </tr>
                <tr>
                  <th>&nbsp;</th>
                  <td valign="top"><input type="submit" value="" class="form-submit" />
                    <input type="reset" value="" class="form-reset"  />
                  </td>
                  <td></td>
                </tr>
              </table>
              <?php echo form_close();?>
              <!-- end id-form  -->
            </td>
        </table>
        <div class="clear"></div>
      </div>
      <!--  end content-table-inner  -->
    </td>
    <td id="tbl-border-right"></td>
  </tr>
  <tr>
    <th class="sized bottomleft"></th>
    <td id="tbl-border-bottom">&nbsp;</td>
    <th class="sized bottomright"></th>
  </tr>
</table>
<div class="clear">&nbsp;</div>
