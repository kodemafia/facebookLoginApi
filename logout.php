<?php
require'facebook.php';



$facebook=new Facebook(array(
'appId'=>'671683016233337',
'secret'=>'2ce7519b0748d3781ab95b0fe8d99d1c'
));


$facebook->destroySession();
header('location:index.php');
?>