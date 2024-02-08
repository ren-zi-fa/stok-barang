<?php

function koneksi(){
    $con = mysqli_connect("localhost","renzi","renzi","stokbarang");
    if(!$con){
        die(" database gagal terkoneksi");
    }
    return $con;
}