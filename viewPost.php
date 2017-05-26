<?php
include('config/init.php');
    echo echoHeaderHtml("Blog", "My Blog!");
    $postId = $_REQUEST['blogPostId'];
    echo contentOfBlog($postId);
    echo echoFooterHtml();
  ?>
