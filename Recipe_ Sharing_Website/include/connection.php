<?php 
     $servername = "localhost";
     $username = "root";
     $password = "emu121212!";
     $dbname = "recipe_sharing_website";

     // Create connection
     $conn = new mysqli($servername, $username, $password, $dbname);

     // Check connection
     if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
     }?>