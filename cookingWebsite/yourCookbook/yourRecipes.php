<?php
include('init.php');
verifyUserCooking();
echo yourCookbookEchoHtmlHeader("New Recipe");
?>
<div  class='title'>
    <h2> All Your Favorite Recipes </h2>
    <input type="text" id="myInput" onkeyup="searchBar('myInput', 'myUL')" placeholder="Search for recipes...">
</div><br/>
<ul id="myUL">
    <li ><a href="#" class="titleSearch">Recipes</a></li><br/><br/>
    <?php
        echo echoListOfAllYourRecipes();
     ?>
</ul>

    </div><br/>
