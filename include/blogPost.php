<?php
function getAllBlogPosts(){
    $post = array(
        array(
            'postId'=>0,
            'title'=> "Getting To Know Me <br/>",
            'body'=> "<div class = 'aboutMe'>
                    Below are some more facts about me: <br/> <br/>
                    I am from NY <br/>
                     My favorite dessert is ice cream <br/>
                     My least favorite forrd is chocolate <br/>
                     I am scared of cats <br/>
             My favorite Disney movie is mulan <br/><br/><br/>"
         ),
         array(
             'postId'=>1,
             'title'=> "What I am Studying <br/>",
             'body'=> "<div class = 'aboutMe'>
                     I am currently studying CogNeuro<br/><br/><br/>",
          ),
           array(
               'postId'=>2,
               'title'=> "What I'm Listening to <br/>",
               'body'=> "<div class = 'aboutMe'>
                    Explore the album covers to see what I am listening to!<br/><br/><br/>",
              ));
          return $post;
}
// include_once('config/init.php');
// function getAllBlogPostsPost($postID){
// $Result = dbQuery("
//     SELECT *
//     FROM blog_post
//     WHERE blogPostId =:blogPostId
//     ", array("blogPostId"=>$postId));
//     return $Result;
// }

function echoPostLinkHtml(){
    $post = getAllBlogPosts();
    for ($i = 0; $i<count($post); $i++){
        $postId = $post[$i]['postId'];
        $postTitle = $post[$i]['title'];
        $postBody= $post[$i]['body'];
      echo  "<a class = 'resume' href = 'viewPost.php?postId=". $postId."'>".$postTitle." </a><br/>";
    }
}



function contentOfBlog($postId){
    $post = getAllBlogPosts();
    $postTitle = $post[$postId]['title'];
    $postBody= $post[$postId]['body'];
    return "<h2>". $postTitle. "</h2>" . $postBody. "<br> <p style= 'text-decoration: underline'> Feel free to leave any comments below </p>
     Name: <input type='text' name='name' id='name' /><br />
    Email: <input type='text' name='email' id='email' /><br />
     Comment:<br />
     <textarea name='comment' id='comment'></textarea><br />
     <input type='hidden' name='articleid' id='articleid' value=".$postId." />
     <input type='submit' value='Submit' /> </form> </div>";
 }
