<?php

	$dbname = 'GVGdfkUGFNlXLeJaTcGA';
 
	$host = getenv('HTTP_BAE_ENV_ADDR_SQL_IP');
	$port = getenv('HTTP_BAE_ENV_ADDR_SQL_PORT');
	$user = getenv('HTTP_BAE_ENV_AK');
	$pwd = getenv('HTTP_BAE_ENV_SK');
 
	$link = @mysql_connect("{$host}:{$port}",$user,$pwd,true);
	if(!$link) {
    	die("Connect Server Failed: " . mysql_error());
	}

	if(!mysql_select_db($dbname,$link)) {
    	die("Select Database Failed: " . mysql_error($link));
	}

	$result = mysql_query("SELECT Link, Title FROM Reference");

	$count = 1;
	while ($row = mysql_fetch_row($result)) {
      	echo $count . ".";
		echo "<a href=\"" . $row[0] . "\">" . $row[1] . "</a><br><br>";
      	$count++;
	}

	mysql_close($link);
?>
