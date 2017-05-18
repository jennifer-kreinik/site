<?php
include('init.php');

$result = dbQuery("SELECT * FROM messages limit 1");

echo "<h1>".$result['MessageBody']."</h1>";
