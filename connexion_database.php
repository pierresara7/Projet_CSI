 <?php
 $dbhost = "localhost"; 
  
  // Name of the database
  $dbname = "bdd";
  
  // User name
  $dbuser = "root";
  
  // Password (not used here)
  $dbpass = "";
 
  mysql_connect($dbhost, $dbuser) or die("Erreur MySQL : ".mysql_error());
  mysql_select_db($dbname) or die("Erreur MySQL : ".mysql_error());
  ?>