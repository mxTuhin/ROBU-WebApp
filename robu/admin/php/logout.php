<?php

session_start();

$_SESSION['loginAuthenticator']="";
session_destroy();
header("Location: ../");

?>