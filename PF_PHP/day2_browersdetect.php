<?php
echo "<br>"."<h3>"."QUESTION NO 1"."</h3>"."<br>";
echo "Client IP Address: " . $_SERVER['REMOTE_ADDR']."<br>";
echo "Browser Detection: " . $_SERVER['HTTP_USER_AGENT'];
// echo"<pre>";
// print_r($_SERVER);
// echo"</pre>";


echo "<br>"."<h3>"."QUESTION NO 2"."</h3>"."<br>";
$myurl='https://www.pf.com.pk/categories/Products.php';
$url=parse_url($myurl);
echo'Protocol:'.$url['scheme']."<br>";
echo'Host:'.$url['host']."<br>";
echo'Path:'.$url['path']."<br>";
// echo'Filename:'.$url['basename']."<br>";
echo'Filename'.basename($myurl);

?>