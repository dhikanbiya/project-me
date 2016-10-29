<?php
//include config
require_once('../db/con.php');

//log user out
$user->logout();
header('Location: index.php'); 

?>