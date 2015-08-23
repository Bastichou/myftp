<?php
 // get file container folder path
 $documentRootPath = realpath(dirname(__FILE__));
 // get global application root path
 $applicationRootPath = $documentRootPath . '/..';
 // update include paths with application lib
 set_include_path(get_include_path() . PATH_SEPARATOR . "$applicationRootPath/lib");
 set_include_path(get_include_path() . PATH_SEPARATOR . "$applicationRootPath/config");

 // load needed files
 require_once('functions.php');
 require_once('config.php');
 require_once('classes.php');

 $return_msg = '';
?>
