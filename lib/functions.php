<?php
 // Write your functions in this files
 function curlFtp_list_file($path)
 {
	//
	// Config using encrypted FTP procole : FTP/TLS
	$ftp_list = curl_init();
	curl_setopt($ftp_list, CURLOPT_URL, 'ftp://'.FTP_SERVER.'/'.$path.'/');
	curl_setopt($ftp_list, CURLOPT_FTPLISTONLY, 1);
	curl_setopt($ftp_list, CURLOPT_USERPWD, FTP_USERNAME.':'.FTP_PASSWORD);
	curl_setopt($ftp_list, CURLOPT_VERBOSE, TRUE);
	curl_setopt($ftp_list, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ftp_list, CURLOPT_SSL_VERIFYHOST, FALSE);
	curl_setopt($ftp_list, CURLOPT_SSLVERSION, 3);
	curl_setopt($ftp_list, CURLOPT_FTP_SSL, CURLFTPSSL_ALL);
	curl_setopt($ftp_list, CURLOPT_FTPSSLAUTH, CURLFTPAUTH_TLS);
	curl_setopt($ftp_list, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ftp_list, CURLOPT_TIMEOUT, 10);
	curl_setopt($ftp_list, CURLOPT_FOLLOWLOCATION, 1);
	//curl_setopt($ftp_list, CURLOPT_FILE, $path);

	echo 'ftp://'.FTP_SERVER.'/'.$path.'/';

	$data = curl_exec($ftp_list);
	$error = curl_errno($ftp_list);
	curl_close($ftp_list);	
	define('FTP_LISTING_PATH',$path);

	if($error == 0)
	{
		return explode("\n",$data);
	}
	else
	{
		return 'FTP connection failed.. :(';
	}
 }

 function curlFtp_download_file($path)
 {
	//
	$ftp_download = curl_init();
	curl_setopt($ftp_download, CURLOPT_URL, 'ftp://'.FTP_SERVER.'/'.$path.'/');
	curl_setopt($ftp_download, CURLOPT_USERPWD, FTP_USERNAME.':'.FTP_PASSWORD);
	curl_setopt($ftp_download, CURLOPT_VERBOSE, TRUE);
	curl_setopt($ftp_download, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ftp_download, CURLOPT_SSL_VERIFYHOST, FALSE);
	curl_setopt($ftp_download, CURLOPT_SSLVERSION, 3);
	curl_setopt($ftp_download, CURLOPT_FTP_SSL, CURLFTPSSL_ALL);
	curl_setopt($ftp_download, CURLOPT_FTPSSLAUTH, CURLFTPAUTH_TLS);
	curl_setopt($ftp_download, CURLOPT_TIMEOUT, 10);
	curl_setopt($ftp_download, CURLOPT_RETURNTRANSFER, 1);

	$fp = fopen(LOCAL_PATH.'/'.$path, 'w');
	curl_setopt($ftp_download, CURLOPT_FILE, $fp);
	
	$data = curl_exec(ftp_download);
	curl_close($ftp_download);
	fclose($fd);
 } 

 function ftp_transfert_mode($file) {
	echo 'hey';
}

 function ftp_connection() {
	$connect = ftp_connect(FTP_SERVER,21,5);
	if($connect == FALSE) {
		$GLOBALS['return_s'] = 3;
		$GLOBALS['return_msg'] = 'Unable to connect to the FTP server..';
		header('settings.php');
	}
	$login = ftp_login($connect, FTP_USERNAME, FTP_PASSWORD);
	if(!$login) {
		$GLOBALS['return_s'] = 3;
		$GLOBALS['return_msg'] = 'Login/Password incorrect..';
	}
	//$data = ftp_nlist(ftp_connect(FTP_SERVER),".");
	return $connect;
 }

 function ftp_list_file($path) {
	$connect = ftp_connection();
	//echo $connect;
	echo get_resource_type($connect);
	//$data = ftp_nlist(ftp_connect("front148.sdbx.co"),$path);
	//$data = ftp_nlist($connect,$path);
	//$data = ftp_rawlist(ftp_connect(FTP_SERVER),$path);
	//return $data;
 }

 function ftp_download_file($path) {
	if(is_dir('ftp://' .FTP_USERNAME. ':' .FTP_PASSWORD. '@' .FTP_SERVER. '/' .$path)) {
		// Create the new folder on the local path		
		if(!file_exists(LOCAL_PATH. '/' .$path)) {
			mkdir(LOCAL_PATH. '/' .$path);
		}
		$contents = ftp_nlist(ftp_connect(FTP_SERVER),$path);
		foreach($contents as $file) {
			$path_file = $path. '/' .$file;
			ftp_download_file($path_file);
		}
	}
	// Downloads a single file
	elseif(is_file('ftp://' .FTP_USERNAME. ':' .FTP_PASSWORD. '@' .FTP_SERVER. '/' .$path)) {
		// Check if file exists, and resume download if possible
		if(file_exists(LOCAL_PATH. '/' .$path)) {
			$resumePos = filesize(LOCAL_PATH. '/' .$path);
			$d = ftp_nb_get(ftp_connect(FTP_SERVER), LOCAL_PATH. '/' .$path, $path, FTP_BINARY, $resumePos);
		} else {
			$d = ftp_nb_get(ftp_connect(FTP_SERVER), LOCAL_PATH. '/' .$path, $path, FTP_BINARY);
		}
		while($d == FTP_MOREDATA) {
			$d = ftp_nb_continue(ftp_connect(FTP_SERVER));
		}
		if($d == FTP_FINISHED) {
			$GLOBALS['return_s'] = 2;
			$GLOBALS['return_msg'] = 'Download started successfully ! :)';
		} else {
			$GLOBALS['return_s'] = 3;
			$GLOBALS['return_msg'] = 'An error occured during downloading';
		}
	}
	else {
		$GLOBALS['return_s'] = 3;
		$GLOBALS['return_msg'] = 'Invalid file path provided';
	}
 }
?>
