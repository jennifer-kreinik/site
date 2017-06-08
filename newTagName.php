<?php
include('config/init.php');
if(isset($_POST['submitItem'])){
    dbQuery("INSERT INTO tags (tagName)
        VALUES (:tag)", array('tag'=>$_REQUEST['tagName']));
            header('Location:viewAllTags.php');
}
if(isset($_POST['deleteItem'])){
    dbQuery("DELETE FROM tags WHERE tagName=:tagName", array('tagName'=>$_REQUEST['tagName']));
    dbQuery("DELETE FROM blogPost_tags_linked WHERE tagName= :tagName", array('tagName'=>$_REQUEST['tagName']));
    header('Location:viewAllTags.php');
}
