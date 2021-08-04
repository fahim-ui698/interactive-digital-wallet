<?php

function connection()
{
    $connection =new mysqli("localhost","fahim","123","digital-wallet");
    if($connection->connect_errno)
    {
        die("Database connection failed.".$connection->connect_error);
    }
    return $connection;
}

function write($category,$to,$amount,$datetime)
{
    $connection=connection();
    $sql=$connection->prepare("INSERT INTO history (category,sendTo,amount,time)
    VALUES(?,?,?,?)");
    $sql->bind_param("ssss",$category,$to,$amount,$datetime);
    return $sql->execute();
}

function getAllHistory()
{
    $connection=connection();
    $sql=$connection->prepare("SELECT * FROM history");
    $sql->execute();
    $response=$sql->get_result();
    return $response->fetch_all(MYSQLI_ASSOC);
}
 
function getHistory($category)
{
    $connection=connection();
    $sql=$connection->prepare("SELECT * FROM history WHERE time = ?");
    $sql->bind_param("s",$category);
    $sql->execute();
    $response=$sql->get_result();
    return $response->fetch_all(MYSQLI_ASSOC);
}
?>