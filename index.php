<?php

require("sdk/facebook.php");
$config = array(
"appId"=>"118862201654483",
"secret"=>"c16414c88ee2788c6c81e8f44a61b579"
);
$facebook = new Facebook($config);
$user_id=$facebook->getUser();
if($user_id)
	{
		$user=$facebook->api("/me","GET");
		//var_dump($user);
	print "welcom {$user['name']}";
	print "<img src='https://graph.facebook.com/$user_id/picture?type=large'";
	$friends=$facebook->api("/me/friends?fields=id,name,gender","GET");
	//var_dump($friends['data']);
	print "<ul>";
	foreach($friends['data'] as $friends)
	{
		print "<li>{$friends['name']}</li>";
		print "<img src='https://graph.facebook.com/{$friends['id']}/picture'";

		}
	print "</ul>";
	}
	else
	{
		print "You ar e not authentecated to this app";
		$login_url=$facebook->getLoginUrl(array("scope"=>"email"));
		print "<a href='$login_url'>Login</a>";
		
		}
		/*
		
		$im=imagecreate(200,200) or die("gd library not activated");
		imagecolorallocate($im,180,2,250);
		imagepng($im,"demoimage.png");
		*/
?>
<img src="demoimage.png" />