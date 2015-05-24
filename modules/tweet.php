<?php SESSION_START();
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

echo 'process Start..';
//========================== PING METHOD ===================================================//

//++++++++ Menyambung ke database ++++++++++

$conn=mysql_connect($host,$user,$pass) or die ('not connected:' .mysql_error());
mysql_select_db($db_name2,$conn);

//+++++++++ cari akun twitter ++++++++++++
$cari_akun=mysql_query("select akun from admin");
$akun="";
while ($data_akun=mysql_fetch_array($cari_akun))
{
	$akun=$akun.' '.$data_akun['akun'];
}

//++++++++ Menghubungkan ke semua Host ++++++++++++

$sql=mysql_query("select * from host");
while ($data=mysql_fetch_array($sql))
{
$host = $data['ip'];
$stt=$data['status']; 
$port = 80; 
$datetime=date('Y-m-d H:i:s');
$waitTimeoutInSeconds = 1; 
$pingresult = exec("/bin/ping -c2 -w2 $host", $outcome, $status);  
    if ($status==0) {
    		mysql_query("update host set status='up' where ip='$host'");
		$stt=$data['status'];
		$datetime=date('Y-m-d H:i:s');
		if ($stt=='down')
		{	
		$psn="Host ".$host." sudah Up.";
		$send_tweet="ALERT: ".$psn." From: ".$host." AT: ".$datetime."  ".$akun;
		mysql_query("Insert into alert(signature,pesan,time,ip_src,ip_dest) values (100,'$psn','$datetime','$host','0.0.0.0')");
		$tweet = $twitter->send($send_tweet);
		}
    } else {
    		mysql_query("update host set status='down' where ip='$host'");
		$stt=$data['status'];
		$datetime=date('Y-m-d H:i:s');
		if ($stt=='up')
		{
		$psn="Host ".$host." Mengalami Down.";
		$send_tweet="ALERT: ".$psn." From: ".$host." AT: ".$datetime."  ".$akun;
		mysql_query("Insert into alert(signature,pesan,time,ip_src,ip_dest) values (100,'$psn','$datetime','$host','0.0.0.0')");
		$tweet = $twitter->send($send_tweet);
		}
    }
}

//================================================ IDS METHOD ===========================================================//

mysql_select_db($db_name,$conn);
				
$sql=mysql_query("SELECT event.cid, event.signature, signature.sig_name as signature_text, event.timestamp as time, inet_ntoa(acid_event.ip_src) as sources,acid_event.ip_src as sources2, inet_ntoa(acid_event.ip_dst) as dest, acid_event.ip_dst as dest2 from signature,event,acid_event where event.cid=acid_event.cid and event.signature=signature.sig_id order by event.timestamp desc limit 1");

$result=mysql_fetch_array($sql);
$newer_signature=$result['signature_text'];
$newer_message="ALERT: ".$newer_signature." From: ".$result['sources']." AT: ".$result['time']." IP: ".$result['dest'];
$sources=$result['sources'];
$dest=$result['dest'];
$time=$result['time'];


//++++++++++++ Fungsi untuk menginputkan ke database ++++++++++++++++++

function insert_alert($result)
	{
		$signature=$result['signature'];
		$signature_text=$result['signature_text'];
		$time=$result['time'];
		$sources_address=$result['sources'];
		$ip_destination=$result['dest'];	
		mysql_query("insert into alert(signature,pesan,time,ip_src,ip_dest) values ('$signature','$signature_text','$time','$sources_address','$ip_destination')") or die ("gagal insert data ke database laporan..");		
	}

//++++++++++ mengecek apadah data sudah ada ++++++++++++++++++

mysql_select_db($db_name2,$conn);
$cek=mysql_fetch_array(mysql_query("select * from alert order by id desc limit 1"));
$older_message=$cek['pesan'];
$older_sources=$cek['ip_src'];
$older_dest=$cek['ip_dest'];
if ($older_message<>$newer_signature || $sources<>$older_sources || $dest<>$older_dest)
{
	mysql_select_db($db_name2,$conn);
	insert_alert($result);
}


//========================================================================================================================	

mysql_select_db($db_name2,$conn);


$sql2=mysql_query("select * from alert order by id desc limit 1");
$result2=mysql_fetch_array($sql2);
$id=$result2['signature'];

//+++++++++ cari akun twitter ++++++++++++

$cari_akun=mysql_query("select akun from admin");
$akun="";
while ($data_akun=mysql_fetch_array($cari_akun))
{
	$akun=$akun.' '.$data_akun['akun'];
}
$send_tweet="ALERT: ".$newer_signature." From: ".$sources." AT: ".$time." IP: ".$dest." ".$akun;

//========================================================================================================================

if ($older_message<>$newer_signature || $sources<>$older_sources || $dest<>$older_dest)
{
	$sql_kirim_tweet=mysql_query("select * from sign");
	while ($sign_kirim_tweet=mysql_fetch_array("$sql_kirim_tweet"))
	{
	
		if ($sign_kirim_tweet['id']==$id)
		{
			if ($sign_kirim_tweet['value']==1)
			{
				echo 'Preparing to Sending Message..';
				$tweet = $twitter->send($send_tweet);
				header('location:../index.php?page=read');
			}
		}
	}	
}


?>
