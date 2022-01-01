<!--<header class="header">-->
    <nav class="navigation">
        <div class="container">
            <div class="navigation__left">
                <ul class="navigation__list">
                    <li class="navigation__item">
                        <a href="index.php" class="navigation__link">Home</a>
                        <div class="underline show"></div>
                    </li>
                    <li class="navigation__item"><a href="" class="navigation__link">About</a></li>
                </ul>
            </div>
            <div class="navigation__center">
                <a href="#" class="navigation__logo">
                    <img src="./images/views/logo-light.png" alt="" class="navigation__image">
                </a>
            </div>
            <div class="navigation__right">
                <ul class="navigation__list">
                    <li class="navigation__item"><a href="?pages=products" class="navigation__link">Product</a></li>
                    <li class="navigation__item"><a href="" class="navigation__link">Contact</a></li>
                </ul>

                <div class="navigation__action">
                    <a href="#" class="header__search">
                        <img src="./images/views/search.png" alt="" class="search__image">
                    </a>
                    <a class="header__cart" href="?pages=cart">
                        <img src="./images/views/shopping-cart.png" alt="" class="cart__image">
                        <span class="number__cart">
                            <?= isset($_SESSION['carts']) ? count($_SESSION['carts']) : '0' ?>
                        </span>
                        <div class="cart-home">
                            <div class="cart-cakes-item">

                                <?php
                                $total = 0;
                                if (isset($_SESSION['carts'])) {
                                    for ($i = 0; $i < count($_SESSION['carts']); ++$i) {
                                        if ($_SESSION['carts'][$i] != '') {
                                            $sql = "Select id,name,image,price from products where id=" . $_SESSION['carts'][$i];
                                            $products = mysqli_fetch_array($conn->query($sql));

                                            $total += $_SESSION['quality'][$i] * $products['price'];

                                            echo '
                                                 <div class="cart-cakes">
                                                    <div class="cart-info">
                                                        <h4>' . $products['name'] . '</h4>
                                                        <p>' . $_SESSION['quality'][$i] . ' x ' . $products['price'] . '</p>
                                                    </div>
                                                    <div class="cart-image">
                                                        <img src="' . $products['image'] . '" alt="' . $products['name'] . '">
                                                    </div>
                                                </div>
                                            ';
                                        }
                                    }
                                } else {
                                    echo '<p style="text-align: center">No products in the cart</p>';
                                }
                                ?>
                            </div>
                            <div class="cart-subtotal-home">
                                <h4>SubTotal: <span><?=(isset($_SESSION['carts'])? $total:0)?></span></h4>
                            </div>

                            <div class="cart-option">
                                <button class="cart-view">View cart</button>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </nav>

<nav class="navigation-mobile">
    <div class="container">
        <a href="#" class="navigation__logo">
            <img src="./images/views/logo-light.png" alt="" class="navigation__image">
        </a>

        <div class="navigation__toggle">
            <img src="./images/views/menu.png" alt="" class="navigation__toggle-img">
        </div>
        <div class="navigation__action">
            <a href="" class="header__search">
                <img src="./images/views/search.png" alt="" class="search__image">
            </a>
            <a class="header__cart" href="?pages=cart">
                <img src="./images/views/shopping-cart.png" alt="" class="cart__image">
                <span class="number__cart"> <?= isset($_SESSION['carts']) ? count($_SESSION['carts']) : '0' ?></span>

                <div class="cart-home">
                    <div class="cart-cakes-item">
                        <?php
                        $total = 0;
                        if (isset($_SESSION['carts'])) {
                            for ($i = 0; $i < count($_SESSION['carts']); ++$i) {
                                if ($_SESSION['carts'][$i] != '') {
                                    $sql = "Select id,name,image,price from products where id=" . $_SESSION['carts'][$i];
                                    $products = mysqli_fetch_array($conn->query($sql));

                                    $total += $_SESSION['quality'][$i] * $products['price'];

                                    echo '
                                                 <div class="cart-cakes">
                                                    <div class="cart-info">
                                                        <h4>' . $products['name'] . '</h4>
                                                        <p>' . $_SESSION['quality'][$i] . ' x ' . $products['price'] . '</p>
                                                    </div>
                                                    <div class="cart-image">
                                                        <img src="' . $products['image'] . '" alt="' . $products['name'] . '">
                                                    </div>
                                                </div>
                                            ';
                                }
                            }
                        } else {
                            echo '<p style="text-align: center">No products in the cart</p>';
                        }
                        ?>
                    </div>

                    <div class="cart-subtotal-home">
                        <h4>SubTotal: <span>45.00</span></h4>
                    </div>

                    <div class="cart-option">
                        <button class="cart-view">View cart</button>
                    </div>
                </div>
            </a>
        </div>
    </div>
</nav>
<!--</header>-->