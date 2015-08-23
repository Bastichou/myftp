<?php include("$documentRootPath/statics/header.html");?>
<html>
 <body style>
	<?php include("$documentRootPath/statics/navbar.php");?>
	<div class="container-fluid">
		<?php if($GLOBALS['return_s'] == 1) {
			echo '<div class="alert alert-info">';
			echo $GLOBALS['return_msg'];
			echo '</div>';
		}
		if($GLOBALS['return_s'] == 2) {
			echo '<div class="alert alert-success">';
			echo $GLOBALS['return_msg'];
			echo '</div>';
		}
		if($GLOBALS['return_s'] == 3) {
			echo '<div class="alert alert-danger">';
			echo $GLOBALS['return_msg'];
			echo '</div>';
		} ?>

		<div id="container-fluid">
			<div class="page-header">
			 <h3>Downloaded FTP Files : <?php echo LOCAL_PATH;?><h3> 
			</div>
			<div class="container-fluid">
				Test 1
				<div class="progress">
				  <div class="progress-bar" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%;">
					78%
				  </div>
				</div>
			</div>
		</div>
	</div>
 </body>
</html>
