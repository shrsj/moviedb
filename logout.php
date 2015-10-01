<?php
include('config.php');
Session_start();
Session_destroy();
header("Location: http://movies.sj/index.php");
exit;

?>