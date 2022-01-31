<?php
    /*
    *
    *
    */
    function phpmotorsConnect(){
    $server='mysql';
    $dbname='phpmotors';
    $username='iClient';
    $password='98z7bpy3eTLo!8gT';
    $dsn="mysql:host=$server;dbname=$dbname";
    $options=array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);

    try {
        $link= new PDO($dsn, $username, $password, $options);
        return $link;
    } catch (PDOException $e) {
        /* Redirect to a different page in the current directory that was requested */
        $host=$_SERVER['HTTP_HOST'];
        $extra='/phpmotors/view/500.php';
        header("Location: http://$host/$extra");
        exit;
    }
    }
    phpmotorsConnect()
?>