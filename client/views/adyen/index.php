
<?php //echo $this->session->flashdata('succ_msg'); ?>
<?php echo form_open('https://test.adyen.com/hpp/pay.shtml',array('name'=>'adyen','id'=>'adyen'));?>		

<?php 
	echo form_hidden('merchantReference',$merchantReference);
	echo form_hidden('skinCode',$skinCode);
	echo form_hidden('sharedSecret',$sharedSecret);
	echo form_hidden('merchantAccount',$merchantAccount);
	echo form_hidden('shopperLocale',$shopperLocale);
	echo form_hidden('sessionValidity',$sessionValidity);
	
	
?>
<input type="hidden" name="merchantSig"   id= 'merchantSig'    value="" />	
<table>

<tr>
	<td style="text-align:right;"> Order Details : </td>
	<td><label><?php echo $orderData;?><?=form_hidden('orderData',$orderData)?></label></td>
</tr>
<tr>
	<td style="text-align:right;"> Customer Name: </td>
	<td><? $attributes = array('id' => 'shopperReference', 'name' => 'shopperReference','class'=>'login_input', 'tabindex' => '1', 'value' => $shopperReference); ?>
		<label><?=form_input($attributes)?></label>
	</td>
</tr>

<tr>
	<td style="text-align:right;"> Customer Email: </td>
	<td><? $attributes = array('id' => 'shopperEmail', 'name' => 'shopperEmail','class'=>'login_input', 'tabindex' => '1', 'value' => $shopperEmail); ?>
		<label><?=form_input($attributes)?></label>
	</td>
</tr>


<tr>
	<td style="text-align:right;"> Payment Amount : </td>
	<td><label><?php echo $paymentAmount;?><?=form_hidden('paymentAmount',$paymentAmount)?></label></td>
</tr>


<tr>
	<td style="text-align:right;"> Currency Code : </td>
	<td><label><?php echo $currencyCode;?><?=form_hidden('currencyCode',$currencyCode)?></label></td>
</tr>


<tr>
	<td style="text-align:right;"> Ship Before Date : </td>
	<td><label><?php echo $shipBeforeDate;?><?=form_hidden('shipBeforeDate',$shipBeforeDate)?></label></td>	
</tr>







</table>

<?php echo form_close();?>
<input name="submit" tabindex="3"  type = "submit" value="Pay" alt="Submit" id="pay">
<script type="text/javascript">
var ssUrl = '<?php echo site_url('adyen/pay');?>';
$(document).ready( function() {
	  var data = $('form').serialize();



	  
	  $("#pay").click(function() {
		 $.ajax({
		       type: 'POST',
		       url: ssUrl,
		       data: data.toString(),
		       dataType: "text",
		       success: function(resultData) 
		       {				        
		       		$('#merchantSig').val(resultData);	
		       		alert('Please click here to redirect payment site');
		       		submitForm();		
			       	return false;					
		 	   }
		 });
		
		return false;
		});

	} );
function submitForm()
{
	$('#adyen').submit();
}

</script>