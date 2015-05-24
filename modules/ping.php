<?php
require 'src/twitter.class.php';
$host="localhost";
$user="root";
$pass="zero";
$db_name="snort";$db_name2="laporan";

$consumerKey='ssGmnYBY84RZIvuWNbZFQAOWi';
$consumerSecret='GmDh4zUm4Ofw7OGJ61ePI8tIVWJAFSLnN2DtjxejLFB0641chz';
$accessToken='3139854703-pB25jfuFacQVXsCvmp6nIHEssOV7dAoHhlvudH1';
$accessTokenSecret='KqbAD1cjt3ahW3cPlkcFknok007jEGRhVojAC7gJ7gadt';
$twitter = new Twitter($consumerKey, $consumerSecret, $accessToken,$accessTokenSecret);

//$tweet = $twitter->send($send_tweet);

$conn=mysql_connect($host,$user,$pass) or die ('not connected:' .mysql_error());
mysql_select_db($db_name2,$conn);

//=====================================================================================================

$sql_sign=mysql_fetch_array(mysql_query("select * from sign where id=1 limit 1"));
$id10=$sql_sign['sign10'];

//=====================================================================================================
$cari_akun=mysql_query("select akun from admin");
$akun="";
while ($data_akun=mysql_fetch_array($cari_akun))
{
	$akun=$akun.' '.$data_akun['akun'];
}

//====================================================================================================
$sql=mysql_query("select * from host");
while ($data=mysql_fetch_array($sql))
{
$host = $data['ip'];
$stt=$data['status']; 
$port = 80; 
$datetime=date('Y-m-d H:i:s');
$waitTimeoutInSeconds = 1; 

if($fp = fsockopen($host,$port,$errCode,$errStr,$waitTimeoutInSeconds))
{   
   	mysql_query("update host set status='up' where ip='$host'");
	if ($stt=='down')
	{	
		$psn="Host ".$host." sudah Up.";
		$send_tweet="ALERT: ".$psn." From: ".$host." AT: ".$datetime."  ".$akun;
		mysql_query("Insert into alert(signature,pesan,time,ip_src,ip_dest) values (10,'$psn','$datetime','$host','0.0.0.0')");
		if ($id10==1){$tweet = $twitter->send($send_tweet);}
	}
} else {
   	mysql_query("update host set status='down' where ip='$host'");
	if ($stt=='up')
	{
		$psn="Host ".$host." Mengalami Down.";
		$send_tweet="ALERT: ".$psn." From: ".$host." AT: ".$datetime."  ".$akun;
		mysql_query("Insert into alert(signature,pesan,time,ip_src,ip_dest) values (10,'$psn','$datetime','$host','0.0.0.0')");
		if ($id10==1){$tweet = $twitter->send($send_tweet);}
	}
}
}
//fclose($fp);

?>
