<?php
include_once('config/init.php');
function GetPost($inputParm){
$Result = dbQuery("
    SELECT *
    FROM blog_post
    WHERE BlogPostId = :var1
    ", array("var1"=>$inputParam));
    return $Result->fetch();
}

    var_dump(GetPost(1));
 ?>
