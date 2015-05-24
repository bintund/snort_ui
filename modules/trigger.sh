#!/usr/bin/bash
cd /var/www/SNORT/modules;
PHP="/usr/bin/php"
TWEET="tweet.php"
while :
do
	$PHP $TWEET > /dev/null;
	sleep 5;
done
