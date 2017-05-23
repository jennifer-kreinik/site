<?php
function getArray(){
    $post = array(
        array(
            'postid'=>0,
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
             'postid'=>1,
             'title'=> "What I am Studying <br/>",
             'body'=> "<div class = 'aboutMe'>
                     I am currently studying CogNeuro<br/><br/><br/>",
          ));
          return $post;
}

function getPost(){
    $post = getArray();
    for ($i = 0; $i<count($post); $i++){
        $postId = $post[$i]['postid'];
        $postTitle = $post[$i]['title'];
        $postBody= $post[$i]['body'];
      echo  "<a class = 'resume' href = 'viewPost.php?postid=". $postId."'>".$postTitle." </a><br/>";
    }
}



function blog(){
    $post = getArray();
    $postId = $_REQUEST['postid'];
    $postTitle = $post[$postId]['title'];
    $postBody= $post[$postId]['body'];
    echo "<h2>". $postTitle. "</h2>" . $postBody. "<br> <p style= 'text-decoration: underline'> Feel free to leave any comments below </p>
     Name: <input type='text' name='name' id='name' /><br />
    Email: <input type='text' name='email' id='email' /><br />
     Comment:<br />
     <textarea name='comment' id='comment'></textarea><br />
     <input type='hidden' name='articleid' id='articleid' value=".$postId." />
     <input type='submit' value='Submit' /> </form> </div>";
 }
