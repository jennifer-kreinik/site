<?php
include('config/init.php');
verifyUserCooking();
session_destroy();
header('Location: /cookingWebsite/loginSignUp.php');
exit;
