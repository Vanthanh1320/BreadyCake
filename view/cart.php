<?php
    if (empty($_SESSION['carts'])){
        $_SESSION['carts']=array();
    }

?>

<div class="cart">
    <div class="product__main">
        <div class="container">
            <div class="cart__main">
                <form action="" class="cart__form">
                    <table class="cart__table">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quality</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;

                            if (isset($_SESSION['carts']) && count($_SESSION['carts'])>0) {
                                for ($i = 0; $i < count($_SESSION['carts']); ++$i) {
                                    if ($_SESSION['carts'][$i] != '' && isset($_SESSION['carts'][$i])) {
                                        $sql = "Select id,name,image,price from products where id=" . $_SESSION['carts'][$i];
                                        $products = mysqli_fetch_array($conn->query($sql));

                                        $total += $_SESSION['quality'][$i] * $products['price'];

                                        echo '
                                                 <tr>
                                                        <td class="product__remove">
                                                            <button class="remove" onclick="deletePro('.$products['id'].')">x</button>
                                                        </td>
                                                        <td class="product__img"><img src="' . $products['image'] . '" alt=""></td>
                                                        <td class="product__name">' . $products['name'] . '</td>
                                                        <td class="product__price">' . $products['price'] . '</td>
                                                        <td class="product__action">
                                                            <div class="quality">
                                                                <button class="quality-btn quality-decrease " id="" onclick="decrease(' . $products['id'] . ')">-</button>
                                                                <input type="text" class="quality-cart" value="' . $_SESSION['quality'][$i] . '">
                                                                <input type="hidden" class="id" value="">
                                                                <button class="quality-btn quality-increase" id="" onclick="increase(' . $products['id'] . ')">+</button>
                                                            </div>
                                                        </td>
                                                        <td class="product__total">' . $_SESSION['quality'][$i] * $products['price'] . '</td>
                                                  </tr>
                                            ';
                                    }
                                }
                            }else{
                                echo '
                                            <tr>
                                                <td colspan="6"><p>Your cart is currently empty.!!</p></td>
                                            </tr>
                                        ';
                            }
                            ?>
                        </tbody>
                    </table>
                </form>

                <div class="cart-total">
                    <h2>CART TOTALS</h2>
                    <table class="cart__table">
                        <tbody>
                        <tr class="cart-subtotal">
                            <th>SUBTOTAL</th>
                            <td>
                                <span class="amount-price">
                                    <?=(isset($_SESSION['carts']))? $total:0?>
                                </span>
                            </td>
                        </tr>
                        <tr class="order-total">
                            <th>TOTAL</th>
                            <td><span class="amount-price"><strong><?=(isset($_SESSION['carts']))? $total:0?></strong></span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="cart-checkout">
                    <a class="cart-checkout-link" href="index.php?pages=checkout">Check out</a>
                </div>
            </div>
        </div>
    </div>

</div>


<script>
  function increase(id) {
      $.post('view/functionCart/updateProduct.php', {
          'action': 'increase',
          'id': id
      }, function(data) {
          location.reload()
      })
  }

  function decrease(id) {
      $.post('view/functionCart/updateProduct.php', {
          'action': 'decrease',
          'id': id
      }, function(data,event) {
          // event.preventDefault();

          location.reload();

      })
  }

  function deletePro(id) {
      $.post('view/functionCart/deleteProduct.php', {
          'id': id
      }, function(data,event) {
          location.reload()
      })
  }


</script>
