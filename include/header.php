<?php
function headerA($title, $head){
 echo "
 <html>
  <head>
  <link rel='shortcut icon' href='images/favicon.ico' type='image/x-icon'>
      <title> $title </title>
      <link rel='stylesheet' href='style.css?Time=".microtime()."'/>
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
       </head>
<body>
  <h1>
        <img class = 'logoBig' src='images/logoPGN.png' alt='logo'> $head </h1>
  <div class = 'active'>
  <ul>
    <li>
        <a href = 'index.php'>
          Home
      </a> </li>
          <li>
              <a href = 'blogpost1.php'>
                  Contact
          </a> </li>
          <li>
              <a href = 'Resume.php'>
               Projects/Resume
               </a> </li>
        <li>
            <a href = 'blogpost2.php'>
                Summer Blog
                </a> </li>
      </ul>
      </div>
      <br/>
      <div style='max-width: 90%; background-color: #B3C3E4; padding:10px; margin:auto; border-radius:10px'>";
}
