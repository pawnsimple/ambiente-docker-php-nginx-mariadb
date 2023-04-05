<?php
        
    unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   session_start(); 
    session_destroy(); 
   
   header('Refresh: 1; URL = index.php'); 
?>