<?php 
   
   $t=time();
   echo($t . "<br>");
   echo(date("U = Y-m-d H:i:s",$t)) . "<br>";
   $date = new DateTime();
   $date->setTimestamp(time() +  (24*6 *30));
   echo $date->format('U = Y-m-d H:i:s') . "\n";


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
