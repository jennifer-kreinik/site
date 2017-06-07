<?php
include('config/init.php');
    echo echoAdminHeaderHtml("Admin Section", "Blog Posts");
?>
    <h4 class = "projects"> List of all blog posts: </h4>
<?php
    echo echoListOfAllPostsAdmin(). echoAdminFooterHtml();
 ?>
