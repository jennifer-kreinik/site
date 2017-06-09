<?php
include('config/init.php');
verifyUser();
    echo echoAdminHeaderHtml("Admin Section", "Admin Section");
    ?>
    <h2> This is the Admin Section </h2>
    <?php
    echo echoAdminFooterHtml();
  ?>
