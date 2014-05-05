
<div id="page-heading">
  <h1>CMS - Add</h1>
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
            <td>
              
              <!-- start id-form -->
              <?php echo form_open('cms/add');?>
              <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                <tr>
                  <th valign="top">Title :</th>
                  <td><? $attributes = array('id' => 'title', 'name' => 'title','class'=>'inp-form', 'tabindex' => '1'); ?>
                    <?=form_input($attributes)?></td>
                  <td>
				  	<?php if(form_error('title')):?>					
				  		<div class="error-left"></div>
	                    <div class="error-inner"><?php echo form_error('title');?> </div>
					<?php endif;?>	
					</td>
                </tr>
                <tr>
                  <th valign="top">Short Description:</th>
                  <td><? $attributes = array('id' => 'short_desc', 'name' => 'short_desc','class'=>'inp-form', 'tabindex' => '1','maxlength'=>'100'); ?>
                    <?=form_input($attributes)?></td>
                  <td>			
					<?php if(form_error('short_desc')):?>					
					<div class="error-left"></div>
					<div class="error-inner"><?php echo form_error('short_desc');?> </div>
					<?php endif;?>	

				</td>
                </tr>
                <tr>
                  <th valign="top">Long Description :</th>
                  <td><? $attributes = array('id' => 'long_desc', 'name' => 'long_desc','class'=>'', 'tabindex' => '1','rows'=>'30','cols'=>'130'); ?>
                    <?=form_textarea($attributes)?></td>
                  <td>			
					<?php if(form_error('long_desc')):?>					
					<div class="error-left"></div>
					<div class="error-inner"><?php echo form_error('long_desc');?> </div>
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
