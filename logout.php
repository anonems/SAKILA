<!-- cette page permet de ce deconnecter de son compte -->
<?php   
session_start();
session_destroy();
header("location: index.php");
exit();
?>