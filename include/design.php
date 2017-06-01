<?php
include_once('config/init.php');
function echoAdminHeaderHtml($title, $head){
     return "
     <html>
        <head>
            <link rel='shortcut icon' href='images/favicon.ico' type='image/x-icon'>
                <title> $title </title>
            <link rel='stylesheet' href='style.css?Time=".microtime()."'/>
            <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
            <link href='https://fonts.googleapis.com/css?family=Gilda+Display' rel='stylesheet'>
        </head>
    <body>
        <h1>
            <div class='floating-box'><img src='images/logoPGN.png' alt='logo' style= 'height: 150px; width: auto'></div>
            <div class='floating-box1'> </div>
            <div class='floating-box2'><br/>$head</div>
        </h1>
        <br style ='clear: both'>
        <div class = 'active'>
        <ul>
            <li>
                <a href = 'adminSection.php'>
                    Admin Home
                </a> </li>
            <li>
                <a href = 'adminListAllBlogPosts.php'>
                    Blog Posts
                </a> </li>
            <li>
                <a href = 'viewAllTags.php'>
                    Tags
                </a> </li>
            <li>
                <a href = 'addNewPost.php'>
                    New Post
                </a> </li>
            <li>
                <a href = 'index.php'>
                    OG Site
                </a> </li>
        </ul>
    </div>";}
function echoAdminFooterHtml(){
    return "
            <br/>
            <h3 >
                Jennifer Kreinik: LessAnnoyingCRM Summer, 2017
             <br/>
        <div class='logo'>
            logo: <a href='http://logomakr.com' title='Logo Maker'>LogoMaker.com</a>
        </div>
            </h3>
            </body>
        </html>";
}
function tagDropDownMenu(){
    $tagTypes = dbQuery("
        SELECT *
        FROM tags
        ")->fetchALL();
    $tagArray = array();
        $returnDropDownMenu = "";
        foreach ($tagTypes as $tagsOrganized){
            if(!@$tagArray[$tagsrganized['tagName']]){
                $tagArray[$tagsOrganized['tagName']] = true;
            }
            $returnDropDownMenu .= "<option value='".$tagsOrganized['tagName']."'>".$tagsOrganized['tagName']."</option>";
        }
        return $returnDropDownMenu;
    }
function editBlogPost($postId){
    $posts = dbQuery("
        SELECT *
        FROM blog_post
        WHERE blogPostId = :varPostId
        ", array("varPostId"=>$postId))
        ->fetch();
    echo "
        <div class = 'forms'>
        </br>
            <form action='insertEditedPost.php' method='post'>
            <input type='hidden' name='blogPostId' value='". $postId."'/>
            Blog Post Title:<br/> <input type='text' name='blogTitle' id='blogTitle' value='".$posts['title']. "' /><br/><br/>
            Blog Post:<br/>
            <textarea name='body' id='body' style='height:200px'>".$posts['body']. "</textarea><br />
            <input type='hidden' name='articleid' id='articleid' /><br/>
            <input type='submit' name='submitItem' value='Edit Post' style='background-color: #b2e5a7' />
            <input type='submit' name='deleteItem' value='Delete Post' style = 'background-color: #e5a7a7' />
            </form>
            </div>
         </div>";
}
function allTags (){
    $tagTypes = dbQuery("
        SELECT *
        FROM tags
        ")->fetchALL();
    $tagArray = array();
        foreach ($tagTypes as $tagsOrganized){
            if(!@$tagArray[$tagsOrganized['tagName']]){
                $tagArray[$tagsOrganized['tagName']] = true;
                echo "<br/><div class='resume'> ".$tagsOrganized['tagName']." </div>";
            }
        }
}
function echoAllPostsAdmin (){
    $posts = dbQuery("
        SELECT *
        FROM blog_post
        ")->fetchALL();
    $postArray = array();
        foreach ($posts as $postsOrganized){
            if(!@$postArray[$postsOrganized['title']]){
                $postArray[$postsOrganized['title']] = true;
    echo  "<div class='resume'><a href = editPost.php?blogPostId=".
        $postsOrganized['blogPostId']. "'> <i class='fa fa-pencil-square-o' aria-hidden='true'>
        </a></i>
        <a href = addNewTag.php?blogPostId=".$postsOrganized['blogPostId'].
        "'> <i class='fa fa-tags' aria-hidden='true'></a></i> ".$postsOrganized['title']."</div>";
            }
        }
    }
function addNewTagName(){
    echo "<div class = 'resume'>
        <form action='newTagName.php' method='post'>
        Tag Name: <br><input type='text' name='tag' id='tag' /><br/><br/>
        <input type='hidden' name='articleid' id='articleid' />
        <input type='submit' value='Submit' style='background-color: #b2e5a7'/> </form> </div>
     </div>";
    }
// function currentTagDropDownMenu($postId){
//     $currentTags = dbQuery("
//         SELECT *
//         FROM blogPost_tags_linked
//         WHERE blogPostId = :varPostId
//         ", array("varPostId"=>$postId))
//         ->fetch();
//     $tagArray = array();
//         foreach ($currentTags as $existingTags){
//             if(!@$tagArray[$existingTags['tagName']]){
//                 $tagArray[$existingTags['tagName']] = true;
//                 }
//                 echo "<option value='".$existingTags['tagName']."'>".$existingTags['tagName']."</option>";
//             }
//         }

function addTagToPost($postId){
        $posts = dbQuery("
            SELECT *
            FROM blog_post
            WHERE blogPostId = :varPostId
            ", array("varPostId"=>$postId))
            ->fetch();
        return "
            <div class = 'aboutMe'>
            </br>
                <form action='addNewTagToExistingPost.php' method='post'>
                <input type='hidden' name='blogPostId' value='". $postId."'/>
                Tag(s): <br/><select id = 'tagName' name= 'tagName'>
                <option disabled selected value> -- Select Tag -- </option>".
                tagDropDownMenu().
                "<option value='NULL'>NULL</option>
                </select>
                <input type='hidden' name='articleid' id='articleid' /><br/>
                <input type='submit' name='submitItem' value='Add Tag' />
                <input type='submit' name='deleteItem' value='Delete Post' />
                </form>
                </div>
             </div>";
    }
