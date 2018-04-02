<?php 

try {
    $db = new PDO('mysql:host=localhost;dbname=lesson', 'root', '');
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>