<?php
    if (isset($_POST['name'])){
        $fullName=$_POST['name'];
        $address=$_POST['address'];
        $phoneNumber=$_POST['phoneNumber'];
        $email=$_POST['email'];

        $sql="INSERT into orders (name,mobile,email,address) values ('$fullName','$phoneNumber','$email','$address')";
        $order=$conn->query($sql);

        $sql="SELECT id from orders order by id desc limit 1";
        $result=mysqli_fetch_array($conn->query($sql));
        $orderid=$result['id'];

        for ($i=0;$i<count($_SESSION['carts']);++$i){
            if(isset($_SESSION['carts'][$i])){
                $productId=$_SESSION['carts'][$i];
                $number=$_SESSION['quality'][$i];
                $price=$_SESSION['price'][$i];

                $sql="INSERT into orderdetail(productid,orderid,number,price) values ('$productId','$orderid','$number','$price')";
                $orderDetail=$conn->query($sql);

                $sqlUpdate="UPDATE products set quality=quality-".$number." where id=".$productId;
                $update=$conn->query($sqlUpdate);
            }
        }

        unset($_SESSION['carts']);
        unset($_SESSION['name']);
        unset($_SESSION['quality']);
        unset($_SESSION['price']);
        unset($_SESSION['image']);

        echo '<script>
                    alert("Order Success")
                    location="index.php";
            </script>';
    }
?>

<div class="checkout">
    <div class="product__main">
        <div class="container">
            <div class="checkout__main">
                <div class="cart-total">
                    <h2>BILLING DETAILS</h2>
                    <form method="post">

                        <div class="row">
                            <div class="col l-8 m-12 c-12">
                                <div class="checkout__info">
                                    <div class="form-group">
                                        <label for="">FullName</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <input type="text" class="form-control" name="address"required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">PhoneNumber</label>
                                        <input type="text" class="form-control" name="phoneNumber" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" name="email" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col l-4 m-12 c-12">
                                <div class="checkout__order">
                                    <h4>Your order</h4>
                                    <div class="checkout__order-product">
                                        Products <span>Total</span>
                                    </div>
                                    <ul>
                                        <?php
                                        $total = 0;

                                        if (isset($_SESSION['carts'])) {
                                            for ($i = 0; $i <= count($_SESSION['carts']); $i++) {
                                                if (isset($_SESSION['carts'][$i])) {
                                                    $sql = "Select name,price from products where id=" . $_SESSION['carts'][$i];
                                                    $products = mysqli_fetch_array($conn->query($sql));

                                                    $total += $products['price'] * $_SESSION['quality'][$i];
                                                    echo '
                                                         <li>' . $products['name'] . ' <span>' . $products['price'] * $_SESSION['quality'][$i] . '</span></li>
    
                                                    ';
                                                }
                                            }
                                        }
                                        ?>
                                    </ul>
                                    <div class="checkout__order-total">
                                        Total <span><?= $total ?></span>
                                    </div>
                                    <button class="checkout__order-btn update-btn">Place order</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


