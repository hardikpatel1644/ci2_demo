<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php echo $title; ?></title>	
		<script type="text/javascript" src="<?php echo base_url(); ?>public/client/jquery-1.3.2.min.js"></script>						
		<link href="<?php echo base_url(); ?>public/client/style.css" rel="stylesheet" type="text/css" />	
</head>
<body>		



<div id="container">

<div id="header">

<h1>Logo| Company Name</h1>
</div>

<div id="tabs10">

</div>

<div id="container2">
<div id="content">
<?php $this->load->view($page_view);?>
</div>

<div id="sidebar">
<h2>Main Menu</h2>
      <p><a href="#">Home</a></p>
	   <p><a href="#">About Us</a></p>
	    <p><a href="#">News</a></p>
		 <p><a href="#">Contact Us</a></p>
		  <p><a href="#">Links</a></p>

</div>

<div id="footer">
<p>

Copyright © 2005 | All Rights Reserved  
</p>
</div>

</div>

</div>

</body>
</html>
