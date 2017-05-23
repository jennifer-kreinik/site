<?php
include('config/init.php');
 headerA("Contact", "More Information About Me");
 ?>
<h2> Contact
    <h4 class="contact">
        <p style= 'text-decoration: underline'> Leave any comments below </p>
        <form method='post'>
    Name: <input type='text' name='name' id='name' /><br />

    Email: <input type='text' name='email' id='email' /><br />
    Comment:<br />
        <textarea name='comment' id='comment'></textarea><br />
        <input type='hidden' name='articleid' id='articleid' value='<? echo $_GET["id"]; ?>' />
        <input type='submit' value='Submit' />
        </form>
        <a href="mailto:jenny.kreinik@lessannoyingcrm.com" class="fa fa-envelope" aria-hidden="true"></a>
        <a href="http://linkedin.com/in/jennifer-kreinik-731a63106" class="fa fa-linkedin"></a>
         <br/><br/><br/>
    </h4>
<?php
footerA();
?>
