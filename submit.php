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

	$sql   = "INSERT INTO Reference VALUES(\"" . $_POST['link'] . "\",\"" . $_POST['title'] . "\")";
	$state = mysql_query($sql);

	if ($state == FALSE) {
		exit('<script>alert("Failed!");window.location.href="index.htm"</script>');
	}
	else {
		echo '<script>alert("Done.");window.location.href="index.htm"</script>';
	}

	mysql_close($link);
?>
