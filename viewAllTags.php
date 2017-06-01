<?php
include('config/init.php');
    echo echoAdminHeaderHtml("Admin Section", "Tags");
    ?>
        <h4 class = "projects"> Add new tag name: </h4>
        <div class = "forms">
        </br>
            <form action="newTagName.php" method="post">
            <input type = "hidden" name = "blogPostId" value ="
            <?php $postId ?>"/>
            New Tag Name: <br/><input type="text" name="tagName" id="tagName" />
            <br/><br/>
            <input type="hidden" name="articleid" id="articleid" />
            <input type="submit" name="submitItem" value="Add Tag" style="background-color: #b2e5a7"/>
            <input type="submit" name="deleteItem" value="Delete Tag" style="background-color: #e5a7a7"/>
        </form> </div>

        <h4 class = "projects"> List of all tag names: </h4>
    <?php

    allTags();
    echo echoAdminFooterHtml();
  ?>
