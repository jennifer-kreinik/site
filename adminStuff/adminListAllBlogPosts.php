<?php
include('init.php');
// include('config/init.php');
verifyUser();
    echo echoAdminHeaderHtml("Admin Section", "Blog Posts");
?>
    <h4 class = "projects"> List of all blog posts: </h4>
<?php
    echo echoListOfAllPostsAdmin(). echoAdminFooterHtml();
 ?>
