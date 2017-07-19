<?php
function echoCookingHeaderHtml($title){
 return "
 <html>
    <head>
        <link rel='shortcut icon' href='/images/favicon.ico' type='image/x-icon'>
            <title> $title </title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' href='/styleCooking.css?Time=".microtime()."'/>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        <link href='https://fonts.googleapis.com/css?family=Bungee+Shade|Esteban|Monoton|Montserrat' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Bungee+Shade|Dancing+Script|Ewert|Give+You+Glory|Permanent+Marker|VT323' rel='stylesheet'>
        <script
          src='https://code.jquery.com/jquery-3.2.1.min.js'
          integrity='sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4='
          crossorigin='anonymous'></script>

    </head>

<body>
    <h1>
        the  foodie  JENeration
    </h1>
    <div class = 'header'>
    <ul>
        <li>
            <a href = '/cookingWebsite/homepage.php'>
                Homepage
            </a> </li>
        <li>
            <a href = '/cookingWebsite/tagOrganizer.php'>
                Recipes
            </a> </li>
        <li>
            <a href = '/cookingWebsite/loginSignUp.php'>
                Login
             </a> </li>
        <li>
            <a href = '/index.php'>
                Return To Blog
            </a> </li>
        </ul>

</div>";}

function yourCookbookEchoHtmlHeader($title){
 return "
 <html>
    <head>
    <link rel='shortcut icon' href='/images/favicon.ico' type='image/x-icon'>
            <title> $title </title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' href='/styleCooking.css?Time=".microtime()."'/>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        <link href='https://fonts.googleapis.com/css?family=Bungee+Shade|Esteban|Monoton|Montserrat' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Bungee+Shade|Dancing+Script|Ewert|Give+You+Glory|Permanent+Marker|VT323' rel='stylesheet'>
          <script src='https://code.jquery.com/jquery-3.2.1.min.js'integrity='sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4='crossorigin='anonymous'></script>

    </head>

<body>
    <h1>
        the  foodie  JENeration
    </h1>
    <div class = 'header'>
    <ul>
        <li>
            <a href = '/cookingWebsite/yourCookbook/yourRecipes.php'>
                Your Recipes
            </a> </li>
        <li>
            <a href = '/cookingWebsite/yourCookbook/newRecipes.php'>
                Add New Recipes
            </a> </li>
        <li>
            <a href = '/cookingWebsite/yourCookbook/allRecipes.php'>
                All Recipes
             </a>
        </li>
        <li>
            <a href = '/cookingWebsite/yourCookbook/groceryList.php'>
                Shopping List
            </a> </li>
        <li>
            <a href = '/cookingWebsite/yourCookbook/addTags.php'>
                    Tags
            </a> </li>
        <li>
            <a href = '/cookingWebsite/yourCookbook/logoutCooking.php'>
                Logout
            </a> </li>

</div>";}
//         <script src='//cdn.quilljs.com/1.2.6/quill.js'></script>
        // <script src='//cdn.quilljs.com/1.2.6/quill.min.js'></script>
        // <link href='//cdn.quilljs.com/1.2.6/quill.snow.css' rel='stylesheet'>
        // <link href='//cdn.quilljs.com/1.2.6/quill.bubble.css' rel='stylesheet'>
        // <link href='//cdn.quilljs.com/1.2.6/quill.core.css' rel='stylesheet'>
        // <script src='//cdn.quilljs.com/1.2.6/quill.core.js'></script>
