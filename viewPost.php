<?php
include('config/init.php');
    headerA("Getting to Know Me", "My Blog!");
    $postId = $_REQUEST['postid'];
    blog($postId);
    footerA();
  ?>
