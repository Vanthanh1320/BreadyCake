<?php
if(isset($_GET['pages'])){
    switch ($_GET['pages']){
        case 'products':
            echo ' 
            <script src="./js/app.js" type="module"></script>
            <script src="./js/product.js"></script>';
            break;
        case 'cart':
            echo ' <script src="./js/app.js" type="module"></script>
                    <script src="./js/cart.js"></script>';
            break;
        case 'detail':
            echo '<script src="./js/app.js" type="module"></script>
            <script src="./js/detail.js"></script>';
            break;
        case 'checkout':
            echo '<script src="./js/app.js" type="module"></script>
            <script src="./js/product.js"></script>';
            break;
    }
}else{
        echo ' <script src="./js/app.js" type="module"></script>';
}
