<?php
include('config/init.php');
    echo echoAdminHeaderHtml("Admin Section", "Edit Post");
    ?>
    </div>
        <h2> New Post </h2>
        <div class = "forms">
        </br>
            <form action="newBlogPost.php" method="post">
            Blog Post Title: <br/><input type="text" name="blogTitle" id="blogTitle" value="Blog Title" /><br/><br/>
            Blog Post:<br/>
            <textarea name="body" id="body" style="height:200px" >Type blog post here...</textarea><br/><br/>
            Tag(s): <br/><select id = "tagName" name= "tagName"><option disabled selected value> -- Select Tag -- </option>
    <?php
    echo tagDropDownMenu()
    ?>
            <option value="NULL">NULL</option>
        </select><br/><br/><input type="hidden" name="articleid" id="articleid" />
            <input type="submit" value="Create New Post" style="background-color: #b2e5a7"/> </form> </div>



    <?php
    echo echoAdminFooterHtml();
  ?>
