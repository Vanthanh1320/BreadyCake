<?php
session_start();

if (isset($_POST['id'])){
    $idProduct=$_POST['id'];

    for ($i=0;$i<count($_SESSION['carts']);++$i){
        if($_SESSION['carts'][$i]==$idProduct){
            unset($_SESSION['carts'][$i]);
            unset($_SESSION['name'][$i]);
            unset($_SESSION['image'][$i]);
            unset($_SESSION['quality'][$i]);
            unset($_SESSION['price'][$i]);

        }
    }
}else{
    echo'Delete Product Fail!';
}



