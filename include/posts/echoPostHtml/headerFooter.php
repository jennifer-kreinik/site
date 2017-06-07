<?php
function echoHeaderHtml($title, $head){
 return "
 <html>
    <head>
        <link rel='shortcut icon' href='/images/favicon.ico' type='image/x-icon'>
            <title> $title </title>
        <link rel='stylesheet' href='/style.css?Time=".microtime()."'/>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        <link href='https://fonts.googleapis.com/css?family=Gilda+Display' rel='stylesheet'>
    </head>
<body>
    <h1>
        <div class='floating-box'><img src='/images/logoPGN.png' alt='logo' style= 'height: 150px; width: auto'></div>
        <div class='floating-box1'> </div>
        <div class='floating-box2'><br/>$head</div>
    </h1>
    <br style ='clear: both'>
    <div class = 'active'>
    <ul>
        <li>
            <a href = '/index.php'>
                Home
            </a> </li>
        <li>
            <a href = '/blogUserView/contactPage.php'>
                Contact
            </a> </li>
        <li>
            <a href = '/blogUserView/Resume.php'>
                Projects/Resume
             </a> </li>
        <li>
            <a href = '/blogUserView/tagListPage.php'>
                Summer Blog
            </a> </li>
    </ul>
</div>";}
function echoFooterHtml(){
return "
<div class = 'aboutMe'>
    <p>
        Please feel free to reach out to me with any questions or concers
    </p>
    <button onclick = 'topFunction()' id ='scrlBtn' title='Scroll to top'>
        <i class='fa fa-arrow-up' aria-hidden='true'></i>
    </button>
    </h2>
</div> </div>
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
function echoAdminHeaderHtml($title, $head){
     return "
     <html>
        <head>
            <link rel='shortcut icon' href='/images/favicon.ico' type='image/x-icon'>
                <title> $title </title>
            <link rel='stylesheet' href='/style.css?Time=".microtime()."'/>
            <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
            <link href='https://fonts.googleapis.com/css?family=Gilda+Display' rel='stylesheet'>
        </head>
    <body>
        <h1>
            <div class='floating-box'><img src='/images/logoPGN.png' alt='logo' style= 'height: 150px; width: auto'></div>
            <div class='floating-box1'> </div>
            <div class='floating-box2'><br/>$head</div>
        </h1>
        <br style ='clear: both'>
        <div class = 'active'>
        <ul>
            <li>
                <a href = '/adminStuff/adminSection.php'>
                    Admin Home
                </a> </li>
            <li>
                <a href = '/adminStuff/adminListAllBlogPosts.php'>
                    Blog Posts
                </a> </li>
            <li>
                <a href = '/adminStuff/viewAllTags.php'>
                    Tags
                </a> </li>
            <li>
                <a href = '/adminStuff/addNewPost.php'>
                    New Post
                </a> </li>
            <li>
                <a href = '/index.php'>
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
