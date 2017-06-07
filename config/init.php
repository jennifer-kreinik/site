<?php
date_default_timezone_set('America/Chicago');
include('config/config.php');
include('include/db_query.php'); //this should happen right after config so other functions have access to the database
include('include/posts/echoPostHtml/headerFooter.php');
include('include/posts/echoPostHtml/viewingBlogPostFormat.php');
include('include/posts/querys/dateAndTime.php');
include('include/posts/echoPostHtml/editOrNewBlogPost.php');
include('include/forms/errorCheck.php');
include('include/forms/textBoxes.php');
include('include/posts/echoPostHtml/tags.php');
include('include/posts/echoPostHtml/commentSection.php');
include('include/contactPageSQLinsert.php');
include('include/posts/querys/postQuerys.php');
include('include/posts/querys/tagQuerys.php');
