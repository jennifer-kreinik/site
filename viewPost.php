<?php
include('config/init.php');
    echo echoHeaderHtml("Getting to Know Me", "My Blog!");
    $postId = $_REQUEST['postId'];
    echo contentOfBlog($postId);
    echo echoFooterHtml();
  ?>
  
