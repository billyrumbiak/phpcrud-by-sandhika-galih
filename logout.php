<?php 

// cara menghapus session
session_start();
$_SESSION = [];
session_unset();
session_destroy();

// cara menghapus cookie
setcookie('id', '', time() - 3600);
setcookie('key', '', time() - 3600);

header("Location: index.php");
exit;

?>