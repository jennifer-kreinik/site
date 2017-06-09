<?php
function echoCommentHtml($postId){
    $postSpecificComments = dbQuery("
        SELECT * FROM blog_post
        INNER JOIN blogComments ON blogComments.blogPostId = blog_post.blogPostId
        WHERE blogComments.blogPostId = :varPostId
        ORDER BY dateComment DESC
        ", array("varPostId" => $postId));
        $commentPostArray = array();
        $returncommentPostArray = "";
        foreach ($postSpecificComments as $postComments){
            if(!in_array($postComments['blogPostId'], $commentPostArray)){
                array_push($commentPostArray, $postComments['blogPostId']);
            }
            $returncommentPostArray .= "<div class='commentStyle'><i class='fa fa-user-circle-o' aria-hidden='true'><br/>".$postComments['username']." </i>
                <p class='commentSection' > ".$postComments['comment']."<br/>".$postComments['dateComment']."</p></div><br/>";
        }
        return $returncommentPostArray;
    }
