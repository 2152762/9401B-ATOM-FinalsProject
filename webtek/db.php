<?php

$conn = new mysqli("localhost","root","","webtek");
if(!$conn){
    var_dump($conn->error);
}