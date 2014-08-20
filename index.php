<?php
require'facebook.php';



$facebook=new Facebook(array(
'appId'=>'671683016233337',
'secret'=>'2ce7519b0748d3781ab95b0fe8d99d1c'
));


if($facebook->getUser()==0)
{
	 $login=$facebook->getLoginUrl();
	 echo"<a href='$login'>Log in with Facebook</a>";
}
else
{
	echo"You are in loged in user in facebook";
	$api=$facebook->api('me');
	
	$id=$api['id'];
	
	echo"<img  src='https://graph.facebook.com/$id/picture' height='40px' width='40px' />";
	echo"<table border='1'>";
	echo"<tr>";
	echo"<td>"."ID"."</td>";
	echo"<td>".$api['id']."</td>";
	echo"</tr>";
	echo"<tr>";
	echo"<td>"."FirstName"."</td>";
	echo"<td>".$api['first_name']."</td>";
	echo"</tr>";
	echo"<tr>";
	echo"<td>"."LastName"."</td>";
	echo"<td>".$api['last_name']."</td>";
	echo"</tr>";
	echo"<tr>";
	echo"<td>"."NAME"."</td>";
	echo"<td>".$api['name']."</td>";
	echo"</tr>";
	echo"<tr>";
	echo"<td>"."Link"."</td>";
	echo"<td>".$api['link']."</td>";
	echo"</tr>";
	echo"<tr>";
	echo"<td>"."Gender"."</td>";
	echo"<td>".$api['gender']."</td>";
	echo"</tr>";
	echo"<tr>";
	echo"<td>"."updated Time"."</td>";
	echo"<td>".$api['updated_time']."</td>";
	echo"</tr>";
	echo"<tr>";
	echo"<td>"."Birth Day"."</td>";
	echo"<td>".$api['birthday']."</td>";
	echo"</tr>";
	echo"</table>";
	echo"<pre>";
	print_r($api);
	echo"</pre>";
	echo"<a href='logout.php'>Logout</a>";
	

 
}



//friendlist

?>
