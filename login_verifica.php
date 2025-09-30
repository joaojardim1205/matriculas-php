<?php
$login_cookie = $_COOKIE["login"];
if(!isset($login_cookie)) {
    header("Location: login.php");
}
