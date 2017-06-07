<?php
include('config/init.php');
    echo echoHeaderHtml("Blog", "My Blog!");
    $postId = $_REQUEST['blogPostId'];
?>
<div class="aboutMe">
<?php
    echo contentOfBlog($postId);
    commentSection($postId);
    echocommentHtml($postId);
    echo echoFooterHtml();
  ?>
