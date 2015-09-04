<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
 <div class="container-fluid">
  <div class="navbar-header">
   <a class="navbar-brand" href="index.php">Connected to: <?php echo FTP_SERVER; ?></a>
  </div> <!-- div: id="navbar-header" -->
  <div class="navbar-collapse collapse">
   <ul class="nav navbar-nav navbar-right">
    <li><a href="javascript:location.reload()"><span class="glyphicon glyphicon-refresh"></span></a></li>
    <?php if(strcmp(basename($_SERVER['PHP_SELF']),"index.php") == 0) { ?>
      <li class="active"><a href="index.php">Files</a></li>
      <li><a href="dlinprogress.php">DL in progress</a></li>
      <li><a href="settings.php">Settings</a></li>
    <?php } elseif(strcmp(basename($_SERVER['PHP_SELF']),"dlinprogress.php") == 0) { ?>
      <li><a href="index.php">Files</a></li>
      <li class="active"><a href="dlinprogress.php">DL in progress</a></li>
      <li><a href="settings.php">Settings</a></li>
    <?php } elseif(strcmp(basename($_SERVER['PHP_SELF']),"settings.php") == 0) { ?>
      <li><a href="index.php">Files</a></li>
      <li><a href="dlinprogress.php">DL in progress</a></li>
      <li class="active" ><a href="settings.php">Settings</a></li>
    <?php } ?>
   </ul> <!-- class="nav navbar-nav navbar-right" -->
  </div> <!-- div: navbar-collapse collapse -->
 </div> <!-- div: id="container-fluid" -->
</div> <!-- div: class="navbar navbar-inverse navbar-fixed-top" role="navigation" -->

