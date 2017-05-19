<html>
  <head>
    <title> Contact </title>
    <link rel="stylesheet" href="style.css?Time=<?php echo microtime()?>" />
  </head>
  <body>
      <h1>
          More Info About Me </h1>
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
<h2> Contact
    <h4 class="contact">
        Email: <a href="mailto:jenny.kreinik@lessannoyingcrm.com">jenny.kreinik@lessannoyingcrm.com <br/> </a>
        linkedIn: <a href="http://linkedin.com/in/jennifer-kreinik-731a63106"> Jennifer Kreinik</a> <br/><br/><br/>

        <p style= 'text-decoration: underline'> Leave any comments below </p>
        <form method='post'>
    Name: <input type='text' name='name' id='name' /><br />

    Email: <input type='text' name='email' id='email' /><br />
    Comment:<br />
        <textarea name='comment' id='comment'></textarea><br />
        <input type='hidden' name='articleid' id='articleid' value='<? echo $_GET["id"]; ?>' />
        <input type='submit' value='Submit' />
        </form>
    </h4>
<div class = "aboutMe">
    <p>
        Please feel free to reach out to me with any questions or concers
    </p>
</div></h2>

<!--
<div style ='border-bottom: 3px dotted #cccccc'>

    <table border= 1px solid black>
        <tr>
            <th align = "center"> Name </th>
            <th align = "center"> major </th>
            <th align = "center"> Home State </th>
        </tr>
        <tr>
            <td align = "center" > Jennifer </td>
            <td align = "center"> CogNeuro </td>
            <td align = "center"> NY </td>
        </tr>
    </table>
    <br>
</div>
    <h2><font color = "navy"> fun facts </h2> </font>
    <div style ='border-bottom: 3px dotted #cccccc;'>
    <p> <li> my favorite sport to play is volleyball </li>
        <li> my favorite sport to watch is basketball </li>
        <li>my least favorite food is chocolate </li>
    </p>
</div>
    <h2> <font color = "pink"> Here is a picture of me </font> </h2>
    <div style ='border-bottom: 3px dotted #cccccc;'>
    <p>
        <img src = "picofme.jpg" alt = "pic of me" >
    </p>
</div>
-->
</div>

<br/>
    <h3>
    Jennifer Kreinik: LessAnnoyingCRM Summer, 2017
</body>
</html>
