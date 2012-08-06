<?php
$dbAddress = "localhost";
$dbUser = "drupal";
$dbPass = "cacapopo1";
$dbName = "sb";

print('DATABASE = '.$dbName.'<br />');

function queryDb($sqlStr)
{
    mysql_connect($GLOBALS["dbAddress"], $GLOBALS["dbUser"], $GLOBALS["dbPass"]) or die('Error: Cannot connect to database');
    mysql_select_db($GLOBALS["dbName"]) or die('Error: Cannot select database');
    if($result = mysql_query($sqlStr))
        return $result;
    else
    {
        print('Query failed: '.mysql_error());
        print('<pre>'.$sqlStr.'</pre>');
        die();
    }
}

if($result = queryDb("
    SELECT TABLE_NAME, ENGINE
      FROM information_schema.TABLES
      WHERE TABLE_SCHEMA = '$dbName'
"))
{
    while($row = mysql_fetch_assoc($result))
    {
        print('TABLE_NAME = '.$row['TABLE_NAME'].', ENGINE = '.$row['ENGINE'].'<br />');
        queryDb("ALTER TABLE ".$row['TABLE_NAME']." ENGINE = MyISAM");
    }    
}
?>
