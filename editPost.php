<?php
include('config/init.php');
    echo echoAdminHeaderHtml("Admin Section", "Edit Post");
    $postId = $_REQUEST['blogPostId']
    ?>
        <h2> Edit Post </h2>
    <?php
    editBlogPost($postId);
    echo echoAdminFooterHtml();
  ?>
