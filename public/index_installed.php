<?php
$file = "http://".$_SERVER['HTTP_HOST']."/storage/installed";
if(!file_exists($file)) {
	rename('index.php', 'index_installed.php');
	rename('index2.php','index.php');
	header("Location: http://".$_SERVER['HTTP_HOST']."/install");
	die();
}
rename('index.php', 'index_installed.php');
rename('index2.php', 'index.php');

?>