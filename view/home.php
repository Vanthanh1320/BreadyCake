<?php
    $sql="Select * from products where hot=1";
    $productHot=$conn->query($sql);

//    echo $productHot;
?>

<div class="slider">
    <div class="slider__background">
        <a class="slider__prev" >
            <img src="./images/views/left-arrow.png" class="slider__controll" />
        </a>

        <div class="slider__center">
            <div class="slider__sale">
                <img src="./images/views/badge-brown.png" alt="" class="slider__sale-image">
                <span class="slider__sale-number">50%</span>
            </div>
            <img src="./images/views/slider-5.png" alt="" class="slider__image ">
            <img src="./images/views/slider-6.png" alt="" class="slider__image ">

            <a href="#" class="order-btn slider-order">Order Now</a>
        </div>

        <a class="slider__next" >
            <img src="./images/views/next.png" class="slider__controll"/>
        </a>

    </div>

</div>

<div class="introduce">
    <div class="heading">
        <h3 class="introduce__head">Delicieux</h3>
        <p class="introduce__text">WELCOME TO THE STORE</p>
        <span>
                    <img src="./images/views/floral.png" alt="" class="head-image">
                </span>
    </div>

    <div class="introduce__main">
        <div class="row introduce__box">
            <!-- <div class="col l-4 introduce__item">
                <img src="./images/award-1.png" alt="" class="introduce__main-image">
                <h4 class="introduce__title">BAKERY OF THE YEAR
                    <span>2011 -2012</span>
                </h4>

                <p class="introduce__main-text">Tart bear claw cake tiramisu chocolate bar gummies dragée lemon drops brownie. Jujubes chocolate cake sesame snaps</p>
            </div> -->

        </div>
    </div>

    <div class="introduce__foot">
        <div class="row">
            <div class="col-5 introduce__foot-left">
                <img src="./images/views/baker-png.png" alt="" class="introduce__foot-image">
            </div>

            <div class="col-7 introduce__foot-right">
                <p class="introduce__foot-text">“It seems that every country that can get its hands on butter has its opinion of what butter cream frosting should be. Some are made with eggs and butter.”</p>
                <small>Sunshine - CEO Bakery</small>
                <img src="./images/views/signature-2.png" alt="" class="introduce__foot-image">
            </div>
        </div>
    </div>
</div>

<div class="deal">
    <div class="deal__backgroud background-cover">
        <div class="container">
            <div class="deal__heading">
                <h3 class="deal__head">Deal of the day</h3>
                <p class="deal__text">BREADS EVERY DAY</p>
                <span>

                    <img src="./images/views/floral.png" alt="" class="head-image">

                </span>
            </div>


            <div class="deal__main">
                <div class="row product-home">
                    <?php foreach ($productHot as $produtcs) :?>

                        <div class="col l-4 m-6 c-12">
                            <div class="product-item">
                                <div class="product-left">
                                    <img src="<?= $produtcs['image'] ?>" alt="" class="product-image">
                                </div>
                                <div class="product-right">
                                    <a href="?pages=detail&id=<?=$produtcs['id']?>" class="product-title"><?= $produtcs['name'] ?></a>
                                    <p class="product-category">CUPCAKE - ORGANIC</p>
                                    <p class="product-price"><?= $produtcs['price'] ?></p>
                                </div>

                                <ul class="product-action action-home">
                                    <li>
                                        <a href="" class="product-action-link">
                                            <img src="./images/views/magnifying-glass.png" alt="">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach;?>

                </div>

                <div class="modal-overlay"></div>
                <div class="modal-product modal-overlay">
                    <div class="modal-container">
                        <div class="modal-product-box">
                            <button class="modal-close">
                                <i class="fas fa-times"></i>
                            </button>
                            <div class="modal-product-content">
                                <?php foreach ($productHot as $item): ?>

                                    <img src="<?= $item['image'] ?>" alt="" class="modal-product-img">
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="stated">
    <div class="stated__background">
        <div class="container">
            <section class="stated__box">

                <div class="stated-center">
                    <article class="stated-article activeSlide">
                        <img src="./images/views/1.jpg" alt="maria ferguson" class="stated__image">
                        <p class="stated__title">“Dessert pudding dessert jelly beans cupcake sweet caramels gingerbread. Fruitcake biscuit cheesecake. Cookie topping sweet muffin pudding tart bear claw sugar plum croissant.</p>
                        <div class="stated__footer">
                            <p><strong>Logan May</strong> - CEO & Founder Invision</p>
                        </div>
                    </article>
                    <article class="stated-article ">
                        <img src="./images/views/2.jpg" alt="maria ferguson" class="stated__image">
                        <p class="stated__title">“Dessert pudding dessert jelly beans cupcake sweet caramels gingerbread. Fruitcake biscuit cheesecake. Cookie topping sweet muffin pudding tart bear claw sugar plum croissant.</p>
                        <div class="stated__footer">
                            <p><strong>Logan May</strong> - CEO & Founder Invision</p>
                        </div>
                    </article>
                    <article class="stated-article ">
                        <img src="./images/views/3.jpg" alt="maria ferguson" class="stated__image">
                        <p class="stated__title">“Dessert pudding dessert jelly beans cupcake sweet caramels gingerbread. Fruitcake biscuit cheesecake. Cookie topping sweet muffin pudding tart bear claw sugar plum croissant.</p>
                        <div class="stated__footer">
                            <p><strong>Logan May</strong> - CEO & Founder Invision</p>
                        </div>
                    </article>

                    <div class="stated__controls">
                        <ul class="stated__list">
                            <li class="stated__item" data-index="0"></li>
                            <li class="stated__item" data-index="1"></li>
                            <li class="stated__item" data-index="2"></li>
                        </ul>
                    </div>
                </div>
            </section>

        </div>
    </div>

</div>


<div class="history">
    <div class="container">
        <div class="heading">
            <h3 class="history__head">Our history</h3>
            <p class="history__text">LIVE WITH PASSION®</p>
            <span>
                <img src="./images/views/floral.png" alt="" class="head-image">
            </span>
        </div>

        <div class="history__main">
            <div class="row history__box">

            </div>
        </div>
    </div>
</div>

<div class="delivery">
    <div class="delivery__background">
        <div class="container">
            <div class="delivery__box">
                <div class="row">
                    <div class="col l-6 delivery__item">
                        <div class="delivery__content">
                            <div class="delivery__contact">
                                <h4>OFFICE AT AMERICA</h4>
                                <h5>BASEMENT COMPANY, NEW YORK</h5>
                                <p><i class="fas fa-envelope"></i><a href="" class="delivery__link">hello@bready.com</a></p>
                                <p><i class="fas fa-phone-square-alt"></i> +1 650-253-0000</p>
                            </div>
                        </div>

                        <div class="delivery__content">
                            <div class="delivery__contact">
                                <h4>OFFICE AT AMERICA</h4>
                                <h5>BASEMENT COMPANY, NEW YORK</h5>
                                <p><i class="fas fa-envelope"></i><a href="" class="delivery__link">hello@bready.com</a></p>
                                <p><i class="fas fa-phone-square-alt"></i> +1 650-253-0000</p>
                            </div>
                        </div>

                        <div class="delivery__content">
                            <div class="delivery__contact">
                                <h4>OFFICE AT AMERICA</h4>
                                <h5>BASEMENT COMPANY, NEW YORK</h5>
                                <p><i class="fas fa-envelope"></i><a href="" class="delivery__link">hello@bready.com</a></p>
                                <p><i class="fas fa-phone-square-alt"></i> +1 650-253-0000</p>
                            </div>
                        </div>
                    </div>

                    <div class="col l-6 delivery__item">
                        <form action="" class="delivery__form">
                            <h3>DELIVERY NOW</h3>
                            <p>Delivery free wafer fruitcake. Pastry toffee wafer gingerbread liquorice. Apple pie gingerbread caramels toffee tart bonbon.</p>
                            <div class="form-group">
                                <label>Name <sup>*</sup></label>
                                <input type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Email <sup>*</sup></label>
                                <input type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Phone number <sup>*</sup></label>
                                <input type="text" class="form-control">
                            </div>

                            <div class="form-group submit">
                                <button class="order-btn delivery-order">order now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
