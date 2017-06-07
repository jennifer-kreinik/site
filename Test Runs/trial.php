<?php
include('config/init.php');
// $link = mysqli_connect("localhost", "cf", "password", "cf");
// if(isset($_POST['submitItem'])){
//     $postId = $_REQUEST['blogPostId'];
//     $title = mysqli_real_escape_string($link, $_REQUEST['blogTitle']);
//     $body = mysqli_real_escape_string($link, $_REQUEST['body']);

    dbQuery("UPDATE blog_post SET title = :title, body= :body
        WHERE blogPostId= :postId",
        array('title'=>$_REQUEST['blogTitle'], 'body'=>$_REQUEST['body'],'postId'=>$_REQUEST['blogPostId']));
            header('Location:adminListAllBlogPosts.php');



    // if(isset($_POST['deleteItem'])){
    //     $postId = $_REQUEST['blogPostId'];
    //     $sql ="DELETE FROM blog_post
    //         WHERE blogPostId= $postId";
    //         if(mysqli_query($link, $sql)){
    //             header('Location:adminListAllBlogPosts.php');
    //         } else{
    //             echo echoAdminHeaderHtml("Blog", "My Blog!")." <h4 class='contact'> ERROR: Unable to execute request $sql. " . mysqli_error($link)." </h4>". echoFooterHtml();
    //         }
    //         exit;
    //     }

// close connection
mysqli_close($link);
?>
