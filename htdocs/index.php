<?php require_once filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/'  . 'bootstrap.php'; ?>
<?php
	// Connects to the FTP server with credentials provided by config
	//if(!ftp_login(FTP_CONNEXION,FTP_LOGIN,FTP_PASSWORD))
	//{
	//	$return_msg = 'FTP authentication error ! ';
	//	include('statics/index.php');
	//}
	// $file_list = ftp_nlist(FTP_CONNEXION,'.');
	if(isset($_GET['p']) && strcmp($_GET['p'],"") != 0) {
		//$listing_path = preg_replace('/[^-a-zA-Z0-9_.]/', '', $_GET['p']);
		$listing_path = FTP_LISTING_PATH;
	}
	else {
		$listing_path = FTP_LISTING_PATH;
	}

	$GLOBALS['return_s'] = 1;
	$GLOBALS['return_msg'] = 'Welcome on your download plateform, it\'s time to download something ? :)';

	// FTP connexion initialization 
	ftp_connection();

	// Run download process
	if(isset($_GET['dl_process']) && $_GET['dl_process'] == 1 && isset($_GET['file_path'])) {
		$download_path = preg_replace('/[^-a-zA-Z0-9_.]/', '', $_GET['file_path']);
		$download_path = filter_input(INPUT_GET,'file_path',FILTER_SANITIZE_STRING);
		ftp_download_file($download_path);
	}

	include('statics/index.php');
?>
