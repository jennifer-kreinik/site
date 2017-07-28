<?php
include('init.php');
// include('config/init.php');
verifyUser();
session_destroy();
header('Location: /blogUserView/login.php');
exit;
