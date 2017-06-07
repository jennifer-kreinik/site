<?php
function addNewTagQuery ($tagName){
        dbQuery("INSERT INTO tags (tagName)
            VALUES (:tag)", array('tag'=>$tagName));
                return header('Location:/adminStuff/viewAllTags.php');
}
function deleteNewTagQuery ($tagName){
        dbQuery("DELETE FROM tags WHERE tagName=:tagName", array('tagName'=>$tagName));
        dbQuery("DELETE FROM blogPost_tags_linked WHERE tagName= :tagName", array('tagName'=>$tagName));
        return header('Location:/adminStuff/viewAllTags.php');
}
function addNewTagToExistingPost($tagName, $postId){
    dbQuery("INSERT INTO blogPost_tags_linked (tagName, blogPostId)
        VALUES (:tag, :postId)", array('tag'=>$tagName, 'postId'=>$postId));
            header('Location:/adminStuff/adminListAllBlogPosts.php');
}
function deleteTagFromExistingPost($tagName, $postId){
    dbQuery("DELETE FROM blogPost_tags_linked WHERE tagName=:tagName and blogPostId=:blogPostId",
        array('tagName'=>$tagName, 'blogPostId'=>$postId));
        header('Location:/adminStuff/adminListAllBlogPosts.php');
}
