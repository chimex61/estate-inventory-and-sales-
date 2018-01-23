<?php
if(!isset($_SESSION))session_start();
session_destroy();
include("Libraries/Admin.php");
Admin::TransitTo("index.php");
?>