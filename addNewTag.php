<?php
include('config/init.php');
    echo echoAdminHeaderHtml("Admin Section", "Add Tags");
    $postId = $_REQUEST['blogPostId'];

    ?>
        <h2> Add New Tag To Post </h2>

<?php
    echo addTagToPost($postId);
    echo echoAdminFooterHtml();
  ?>
