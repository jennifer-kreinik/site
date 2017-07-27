<?php
sha1($_REQUEST['pssword']),-->store password/get the password
    -->TERRIBLE One
bcrypt --> look this up: this is WAY more secure
you want the slowest hashing algorithum possible
verify user function:
    put this function atop of every private Page
Setting the session:
    you set it when the user logs in
    $_SESSION['userId']=their user id
getting Session:
    include();
    VerifyUser();
    

 ?>
