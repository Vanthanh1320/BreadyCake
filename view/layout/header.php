<nav class="navigation header-1">
    <div class="container">
        <a href="" class="logo-product"><img src="./images/views/logo-light.png" alt=""></a>
        <div class="header-action">
            <a href="" class="header__search" href="#">
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

                        if (!empty($_SESSION['carts'])): ?>
                            <?php for ($i = 0; $i < count($_SESSION['carts']); ++$i): ?>
                                <?php if ($_SESSION['carts'][$i] != ''): ?>
                                    <?php
                                    $sql = "Select id,name,image,price from products where id=" . $_SESSION['carts'][$i];
                                    $products = mysqli_fetch_array($conn->query($sql));

                                    $total += $_SESSION['quality'][$i] * $products['price'];
                                    ?>
                                    <div class="cart-cakes">
                                        <div class="cart-info">
                                            <h4><?= $products['name'] ?></h4>
                                            <p><?= $_SESSION['quality'][$i] ?> x <?= $products['price'] ?></p>
                                        </div>
                                        <div class="cart-image"><img src="<?= $products['image'] ?>" alt="image">
                                        </div>
                                    </div>

                                <?php endif; ?>

                            <?php endfor; ?>

                        <?php else: ?>

                            <p style="text-align: center">No products in the cart</p>
                        <?php endif; ?>
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
        <ul class="menu">
            <li class="menu-item">
                <a href="index.php" class="menu-link">Home</a>
            </li>
            <li class="menu-item">
                <a href="" class="menu-link">About</a>
            </li>
            <li class="menu-item">
                <a href="?pages=products" class="menu-link">Product</a>
            </li>
            <li class="menu-item">
                <a href="" class="menu-link">Contact</a>
            </li>
        </ul>
    </div>
</nav>

<nav class="navigation-mobile header-1">
    <div class="container">
        <a href="#" class="navigation__logo">
            <img src="./images/logo-light.png" alt="" class="navigation__image">
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
                <span class="number__cart"><?= isset($_SESSION['carts']) ? count($_SESSION['carts']) : '0' ?></span>

                <div class="cart-home">
                    <div class="cart-cakes-item">
                        <?php
                        $total = 0;

                        if (!empty($_SESSION['carts'])): ?>
                            <?php for ($i = 0; $i < count($_SESSION['carts']); ++$i): ?>
                                <?php if ($_SESSION['carts'][$i] != ''): ?>
                                    <?php
                                    $sql = "Select id,name,image,price from products where id=" . $_SESSION['carts'][$i];
                                    $products = mysqli_fetch_array($conn->query($sql));

                                    $total += $_SESSION['quality'][$i] * $products['price'];
                                    ?>
                                    <div class="cart-cakes">
                                        <div class="cart-info">
                                            <h4><?= $products['name'] ?></h4>
                                            <p><?= $_SESSION['quality'][$i] ?> x <?= $products['price'] ?></p>
                                        </div>
                                        <div class="cart-image"><img src="<?= $products['image'] ?>" alt="image">
                                        </div>
                                    </div>

                                <?php endif; ?>

                            <?php endfor; ?>

                        <?php else: ?>

                            <p style="text-align: center">No products in the cart</p>
                        <?php endif; ?>
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

<div class="head__background background-cover">
    <div class="head__product-title">
        <?php
        if (isset($_GET['pages'])) :?>
            <h1><?= ucfirst($_GET['pages']) ?></h1>
        <?php endif ?>
    </div>
</div>



