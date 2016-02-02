<?php 
	$email = "ve.rmanavneet003@gmail.com";
	$mailparts=explode("@",$email);
   $hostname = $mailparts[1];

   // validate email address syntax
   $exp = "^[a-z\'0-9]+([a-z\'0-9]+)*@([a-z0-9]+([._-][a-z0-9]+))+$^";
   $b_valid_syntax=preg_match($exp, $email);
   if($b_valid_syntax){
   	echo "yes";
   }else{
   	echo "false";
   }
 ?>
