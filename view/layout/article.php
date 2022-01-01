<?php
    if(isset($_GET['pages'])){
        switch ($_GET['pages']){
            case 'products':
                include 'view/products.php';
                break;
            case 'cart':
                include 'view/cart.php';
                break;
            case 'detail':
                include 'view/detail.php';
                break;
            case 'checkout':
                include 'view/checkout.php';
                break;

        }
    }
    elseif (isset($_GET['func'])){
        switch ($_GET['func']){
            case 'addProduct':
                include 'view/functionCart/addProduct.php';
                break;
            case 'deleteProduct':
                include 'view/functionCart/deleteProduct.php';
                break;
        }
    }
    else{
        include 'view/home.php';
    }
