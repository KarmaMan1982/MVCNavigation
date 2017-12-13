<?php
session_start();
$_SESSION['activeTab'] = $_REQUEST['activeTabID'];
echo json_encode($_SESSION);
?>