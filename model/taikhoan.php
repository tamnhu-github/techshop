<?php
function insert_taikhoan($email,$user,$password){
    $sql = "INSERT INTO taikhoan(email,user,password) values('$email','$user','$password')";
    pdo_execute($sql);
}

function checkuser($user,$pass){
    $sql = "SELECT * FROM taikhoan WHERE user='".$user."' AND password ='".$pass."'";
    $sp = pdo_query_one($sql);
    return $sp;
}

?>