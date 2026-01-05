<?php
session_start();
session_unset();
session_destroy();
header("location:lat_login.php?login=sukses");
exit;


?>