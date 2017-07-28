<?php
include('init.php');
// include('config/init.php');
    echo echoHeaderHtml("Blog", "My Blog!");
 ?>
<h2> My Blog!
    <div class="aboutMe">
        <ul class="resume">
        <li class="resume">
            <?php
            $postTagName = $_REQUEST['tagPostId'];
            echoPostLinkHtml($postTagName);
            ?>
        </div>

<?php
    echo echoFooterHtml();
?>
