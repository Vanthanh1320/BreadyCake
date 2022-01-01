<?php
ob_start();
$conn= new mysqli('localhost','root','','cake');

$cart=[];
$id=$_POST['id'];
$quality=$_POST['quality'];

$sql="Select id,name,image,quality,price from products where id=".$id;
$product=mysqli_fetch_array($conn->query($sql));

function checkProduct($id){
    for ($i=0;$i<count($_SESSION['carts']);++$i){
        if($_SESSION['carts'][$i]==$id){
            return $i;
        }
    }
    return -1;
}
if(isset($_SESSION['carts'])){
    if(checkProduct($id)==-1){
        $index=count($_SESSION['carts']);
        $_SESSION['carts'][$index]=$id;
        $_SESSION['name'][$index]=$product['name'];
        $_SESSION['image'][$index]=$product['image'];
        $_SESSION['price'][$index]=$product['price'];
        $_SESSION['quality'][$index]=(int)$quality;
    }else{
        $tmp=$_SESSION['quality'][checkProduct($id)]+(int)$quality;
        if($tmp > $product['quality']){
            echo '<script>
                    alert("The number of products added has exceeded the quantity in stock");
                    history.back();
                
                </script>';
            return;
        }else{
            $_SESSION['quality'][checkProduct($id)]+=(int)$quality;
        }
    }
}
else{
    $_SESSION['carts'][0]=$id;
    $_SESSION['name'][0]=$product['name'];
    $_SESSION['image'][0]=$product['image'];
    $_SESSION['price'][0]=$product['price'];
    $_SESSION['quality'][0]=(int)$quality;
}

header("Location:index.php?pages=cart");

?>



