<?php
include('config/init.php');
    echo echoHeaderHtml("Blog", "My Blog!");
 ?>
<h2> My Blog!
    <div class="aboutMe">
        <ul class="resume">
        <li class="resume">
            <?php
            $postTagId = $_REQUEST['tagPostId'];
            echoPostLinkHtml($postTagId);
            ?>
        </div>

<?php
    echo echoFooterHtml();
?>
