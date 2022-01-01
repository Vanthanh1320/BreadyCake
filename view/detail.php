<?php
    if (isset($_GET['id'])){
        $productId=$_GET['id'];
    }

    $sql="Select p.*,b.brandName from products as p, brand as b where b.id=p.brandid and p.id=".$productId;
    $product=mysqli_fetch_array($conn->query($sql));

?>

<div class="product__main">
    <div class="container">
        <div class="product__detail">
            <div class="row">
                <div class=" col l-5 m-12 c-12">
                    <div class="product__detail-thumb">
                        <img src="<?=$product['image']?>" alt="">
                    </div>
                </div>

                <div class="col l-7 m-12 c-12">
                    <div class="product__detail-info">
                        <h1><?=$product['name']?></h1>
                        <span class="product__detail-price">$<?=$product['price']?></span>
                        <div class="product__detail-desc">
                            <p>Lollipop dessert donut marzipan cookie bonbon sesame snaps chocolate cake.</p>
                        </div>
                        <div class="product__detail-status">
                            <h5>Category: <a href=""><?=$product['brandName']?></a> </h5>
                        </div>

                        <form action="index.php?func=addProduct" class="product__detail-form" method="post">
                            <div class="product__detail-number">
                                <div class="form-group-number">
                                    <input type="hidden" name="id" class="form-control" value="<?=$product['id']?>">
                                    <button class="btn-detail minus"> <span>-</span></button>
                                    <input type="text" name="quality" class="form-control product-value" value="1">
                                    <button class="btn-detail plus"> <span>+</span> </button>

                                </div>
                            </div>

                            <div class="product__detail-sharing">
                                <button class="product-btn" name="submit" type="submit">Add to cart<button/>

                                    <p class="product__detail-share">share this:
                                        <a href="" class="product__detail-link"><i class="fab fa-facebook-f"></i></a>
                                        <a href="" class="product__detail-link"><i class="fab fa-twitter"></i></a>
                                        <a href="" class="product__detail-link"><i class="fab fa-pinterest"></i></a>
                                    </p>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    $brandid=$product['brandid'];
    $productid=$product['id'];

    $sql="Select p.*,b.brandName from products as p, brand as b where b.id=p.brandid and p.brandid='$brandid' having p.id !='$productid'";
    $productRelated=$conn->query($sql);
?>

<div class="product__main related">
    <div class="container">
        <div class="related__heading">
            <h3 class="related__head">Related Products</h3>
            <p class="related__text">MAYBE YOU LIKE</p>
            <span>
                <img src="./images/views/floral.png" alt="" class="head-image">
            </span>
        </div>
        <div class="row product">
            <?php foreach ($productRelated as $item):?>
                <div class="col l-3 m-6 c-12">
                    <div class="product-item">
                        <div class="product-thumbnail">
                            <img src="<?=$item['image']?>" alt="<?=$item['name']?>" class="product-image loading="lazy">
                        </div>
                        <div class="product-content">
                            <a href="?pages=detail&id=<?=$item['id']?>" class="product-title"><?=$item['name']?></a>
                            <p class="product-category"><?=$item['brandName']?></p>
                            <p class="product-price"><?=$item['price']?></p>
                        </div>

                        <ul class="product-action">
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
                        <?php foreach ($productRelated  as $item) :?>
                            <img src="<?=$item['image']?>" alt="" class="modal-product-img">
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
