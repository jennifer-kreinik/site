<?php
include('config/init.php');
    echo echoHeaderHtml("Blog", "My Blog!");
 ?>
<h2> My Blog!
    <h4 class="projects">
        Links to my blog pages
    </h4>
    <div class="aboutMe">
        <ul class="resume">
        <li class="resume">
            <?php
            echoPostLinkHtml();
            ?>
        </div>

<?php
    echo echoFooterHtml();
?>
