<html>
  <head>
    <title> Getting to know me </title>
    <link rel="stylesheet" href="style.css?Time=<?php echo microtime()?>" />
  </head>
<body>
    <h1>
        My Blog! </h1>
        <div class = "active">
              <ul>
              <li>
                  <a href = "index.php">
                  Home
              </a> </li>
                  <li>
                      <a href = "blogpost1.php">
                          Contact
                  </a> </li>

                  <li>
                      <a href = "Resume.php">
                       Projects/Resume </a> </li>
                <li>
                    <a href = "blogpost2.php">
                        Summer Blog </a> </li>
              </ul>
        </div>

   <br>
   <div style='max-width: 90%; background-color: #B3C3E4; padding:10px; margin:auto; border-radius:10px'>
<h2> Getting To Know Me <br/> <br/>
</h2>

<div class = "aboutMe">

      Below are some more facts about me: <br/> <br/>


        I am from NY <br/>
         My favorite dessert is ice cream <br/>
         My least favorite forrd is chocolate <br/>
         I am scared of cats <br/>
 My favorite Disney movie is mulan <br/><br/><br/>

 <p style= 'text-decoration: underline'> Leave any comments below </p>
 Name: <input type='text' name='name' id='name' /><br />

 Email: <input type='text' name='email' id='email' /><br />
 Comment:<br />
 <textarea name='comment' id='comment'></textarea><br />
 <input type='hidden' name='articleid' id='articleid' value='<? echo $_GET["id"]; ?>' />
 <input type='submit' value='Submit' />
 </form>

</div></div>

<br/>
  <h3>
  Jennifer Kreinik: LessAnnoyingCRM Summer, 2017
</body>
</html>
