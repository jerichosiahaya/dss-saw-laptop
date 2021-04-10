<?php
session_start();
include("config.php");
$username = $_SESSION['username'];
$id = $_SESSION['id'];
if (empty($_SESSION['id']) || $_SESSION['id'] == '') {
    header('Location: login.php');
}
