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
			<table class="table table-bordered table-hover">
			 <thead>
				<th>FTP Content : <?php echo $listing_path; ?></th>
			 </thead>
			 <tbody>
				<?php
				 $file_list = ftp_list_file($listing_path); 
				 foreach($file_list as $file) { ?>
					<tr>
					 <td>
						<a href='index.php?p=<?php echo $file;?>'>
						  <?php echo $file; ?>
						</a>
					 </td>
					 <td class="cel-download"><a href='index.php?dl_process=1&file_path=<?php echo $file;?>'><span class="glyphicon glyphicon-download"></span></a></td>
					</tr>
				<?php } ?>
			 </tbody>
			</table>
		</div>
	</div> <!-- div: class="container-fluid" -->
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="statics/bootstrap/js/bootstrap.min.js">
 </body>
</html>
