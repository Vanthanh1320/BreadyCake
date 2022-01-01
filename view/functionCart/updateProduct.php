<?php
session_start();

$action=$_POST['action'];
$id=$_POST['id'];

switch ($action){
    case 'increase':
        increase($id);
        break;
    case 'decrease':
        decrease($id);
        break;
}


function increase($id){
    if(isset($_SESSION['carts'])){
        for ($i=0;$i<count($_SESSION['carts']);++$i){
            if($_SESSION['carts'][$i]==$id){
                $_SESSION['quality'][$i]++;
            }
        }
    }
}

function decrease($id){
    if(isset($_SESSION['carts'])){
        for ($i=0;$i<count($_SESSION['carts']);++$i){
            if($_SESSION['carts'][$i]==$id && $_SESSION['quality'][$i]>1){
                $_SESSION['quality'][$i]--;
            }
        }
    }
}

