

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Manage User</h1>
	</div>
	<!-- end page-heading -->

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="<?php echo base_url(); ?>public/admin/images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="<?php echo base_url(); ?>public/admin/images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		<?php if($asResult != '' && sizeof($asResult) > 0):?>
			<!--  start table-content  -->
			<div id="table-content">
			
				<!--  start message-yellow -->
			<!-- 	<div id="message-yellow">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="yellow-left">You have a new message. <a href="">Go to Inbox.</a></td>
					<td class="yellow-right"><a class="close-yellow"><img src="<?php echo base_url(); ?>public/admin/images/table/icon_close_yellow.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div> -->
				<!--  end message-yellow -->
				
				<!--  start message-red -->
			<!-- 	<div id="message-red">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="red-left">Error. <a href="">Please try again.</a></td>
					<td class="red-right"><a class="close-red"><img src="<?php echo base_url(); ?>public/admin/images/table/icon_close_red.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div> -->
				<!--  end message-red -->
				
				<!--  start message-blue -->
			<!--	<div id="message-blue">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="blue-left">Welcome back. <a href="">View my account.</a> </td>
					<td class="blue-right"><a class="close-blue"><img src="<?php echo base_url(); ?>public/admin/images/table/icon_close_blue.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-blue -->
			
				<!--  start message-green -->
				<?php if($this->session->flashdata('succ_msg')):?>
				<div id="message-green">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="green-left"><?php echo $this->session->flashdata('succ_msg');?> </td>
					<td class="green-right"><a class="close-green"><img src="<?php echo base_url(); ?>public/admin/images/table/icon_close_green.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<?php endif;?>
				<!--  end message-green -->
		
		 
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">First Name</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Lsst Name</a></th>
					<th class="table-header-repeat line-left"><a href="">Email</a></th>
					<th class="table-header-repeat line-left"><a href="">Date Joined</a></th>					
					<th class="table-header-options line-left"><a href="#">Action</a></th>
				</tr>
				<?php foreach($asResult as $asValue):?>
				<tr>
					<td><input  type="checkbox"/></td>
					<td><?php echo $asValue['first_name']?></td>
					<td><?php echo $asValue['last_name']?></td>
					<td><?php echo $asValue['email']?></td>
					<td><?php echo dateFormate('d / m / Y',$asValue['date_joined'])?></td>																		
					<td class="options-width">
					<a href="<?php echo site_url('user/index/'.$asValue['id'].'/status')?>" title="<?php echo (($asValue['status'] == '1') ? 'Active' : 'Inactive');?>" class="icon-1 info-tooltip"></a>					
					<a href="<?php echo site_url('user/index/'.$asValue['id'].'/delete');?>" title="Delete" class="icon-2 info-tooltip"></a>
					
					<!--  <a href="" title="Edit" class="icon-2 info-tooltip"></a>
					<a href="" title="Edit" class="icon-4 info-tooltip"></a>
					<a href="" title="Edit" class="icon-5 info-tooltip"></a>-->
					</td>
				</tr>
				<?php endforeach;?>

				</table>
				<!--  end product-table................................... --> 
				</form>
			</div>
			
			<!--  end content-table  -->
		
			<!--  start actions-box ............................................... -->
			<!-- <div id="actions-box">
				<a href="" class="action-slider"></a>
				<div id="actions-box-slider">
					<a href="" class="action-edit">Edit</a>
					<a href="" class="action-delete">Delete</a>
				</div>
				<div class="clear"></div>
			</div>-->
			<!-- end actions-box........... -->
			
			<!--  start paging..................................................... -->
			<?php echo $pagination;?>
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td>
				<a href="" class="page-far-left"></a>
				<a href="" class="page-left"></a>
				<div id="page-info">Page <strong>1</strong> / 15</div>
				<a href="" class="page-right"></a>
				<a href="" class="page-far-right"></a>
			</td>
			<td>
			<select  class="styledselect_pages">
				<option value="">Number of rows</option>
				<option value="">1</option>
				<option value="">2</option>
				<option value="">3</option>
			</select>
			</td>
			</tr>
			</table>
			<!--  end paging................ -->
			<?php else:?>
				<!--  start message-yellow -->
				<div id="message-yellow">
					<table border="0" width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td class="yellow-left">No Records Found </td>
						<td class="yellow-right"><a class="close-yellow"><img src="<?php echo base_url(); ?>public/admin/images/table/icon_close_yellow.gif"   alt="" /></a></td>
					</tr>
					</table>
				</div> 
				<!--  end message-yellow -->
			
			<?php endif;?>
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
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

