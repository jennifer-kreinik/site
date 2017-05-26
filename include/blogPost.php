<?php
include_once('config/init.php');
function echoPostLinkHtml(){
    $post = dbQuery("
            SELECT *
            FROM blog_post
            ")->fetchALL();
    for ($i = 0; $i<count($post); $i++){
        $postId = $post[$i]['blogPostId'];
        $postTitle = $post[$i]['title'];
        $postBody= $post[$i]['body'];
        $postGenre= $post[$i]['genre'];
      echo  "$postGenre <br/><a class = 'resume' href = 'viewPost.php?blogPostId=". $postId."'>".$postTitle." </a><br/>";
    }
}
    //
    // $Result = dbQuery("
    //     SELECT *
    //     FROM blog_post
    //     ");
    //     return $Result->fetch();
  //       // ");
  //       // return $Result->fetchALL();
  //   $resultPostId = dbQuery("
  //       SELECT *
  //       FROM blog_post
  //       WHERE title = :varTitle
  //       ", array("varTitle"=>$postId));
  //       return $resultPostId->fetchALL();
  //   $resultTitle = dbQuery("
  //       SELECT *
  //       FROM blog_post
  //       WHERE title = :varTitle
  //       ", array("varTitle"=>$postTitle));
  //       return $resultTitle->fetchALL();
  //   $resultBody = dbQuery("
  //       SELECT *
  //       FROM blog_post
  //       WHERE title = :varBody
  //       ", array("varBody"=>$postBody));
  //       return $resultBody->fetchALL();
  //
  //   for($i = 0; $i < count($Result); $i++){
  //       // $postId = $$resultPostId[$i]['blogPostId'];
  //       // $postTitle = $Result[$i]['title'];
  //       // $postBody= $Result[$i]['body'];
  //     echo  "<a class = 'resume' href = 'viewPost.php?postId=".$postId."'>".$postTitle." </a><br/>";
  // }}

function contentOfBlog($postId){
    $post = dbQuery("
        SELECT *
        FROM blog_post
        WHERE blogPostId = :varPostId
        ", array("varPostId"=>$postId))
        ->fetch();
    $postTitle = $post['title'];
    $postBody= $post['body'];
    return "<h2>". $postTitle. "</h2>" . $postBody. "<br> <p style= 'text-decoration: underline'> Feel free to leave any comments below </p>
     Name: <input type='text' name='name' id='name' /><br />
    Email: <input type='text' name='email' id='email' /><br />
     Comment:<br />
     <textarea name='comment' id='comment'></textarea><br />
     <input type='hidden' name='articleid' id='articleid' value=".$postId." />
     <input type='submit' value='Submit' /> </form> </div>";
 }
