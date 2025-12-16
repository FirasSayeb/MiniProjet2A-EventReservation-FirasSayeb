<?php
    try {
        $dbhost = 'localhost';
        $dbname='minievent';
        $dbuser = 'root';
        $dbpass = '';
        $conn = new PDO(
"mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
return $conn; ;
    }
    
   catch (PDOException $e) {
        echo "Error : " . $e->getMessage() . "<br/>";
        die();
    }
    
?>