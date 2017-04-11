<?php 
	$url = $_POST['url'];
 	$mottofile = fopen("$url", "r");
	echo fgets($mottofile);		
	
  ?>