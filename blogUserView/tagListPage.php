<?php
include('init.php');
// include('config/init.php');
    echo echoHeaderHtml("Blog", "My Blog!");
 ?>
<h2> My Blog!
    <h4 class="projects">
        List of categories:
    </h4>
    <div class="aboutMe">
        <ul class="resume">
        <li class="resume">
            <?php
            blogTagOrganizer();
            ?>
        </div>

<?php
    echo echoFooterHtml();
?>
