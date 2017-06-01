<?php
include('config/init.php');
    dbQuery("INSERT INTO tags (tagName)
        VALUES (:tag)", array('tag'=>$_REQUEST['tagName']));
            header('Location:viewAllTags.php');
