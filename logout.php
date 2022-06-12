<?php
session_start();

session_unset();

session_destroy();

header("location:bootstrap_form_login.php");
exit;
?>