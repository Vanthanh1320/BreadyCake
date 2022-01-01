<?php
    $sql="Select p.*,b.brandName from products as p, brand as b where b.id=p.brandid and p.status=1";
    $sqlCate="Select * from brand where status=1";
    $categories=$conn->query($sqlCate);

    $pages='products';
    if(isset($_GET['cate'])){
        $categoryId=$_GET['cate'];
        $sql.=" and p.brandid=".$categoryId;
        $pages='products&cate='.$categoryId;
    }elseif (isset($_GET['keyword'])){
        $keyword=$_GET['keyword'];
        $sql.=" and p.name like '%".$keyword."%'";
        $pages='products&keyword='.$keyword;
    }

    $page=1;
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }

    $numberPro=12;
    $from=($page-1)*$numberPro;
    $totalPro=$conn->query($sql);
    $totalPro=ceil(mysqli_num_rows($totalPro)/$numberPro);
    $sql.=" limit $from,$numberPro";

    $result=$conn->query($sql);


?>

<div class="product__main">
    <div class="container">
        <div class="row">
            <div class="col l-2 m-0 c-0">
                <div class="product__filter">
                    <h3>Category</h3>

                    <ul class="product__cate-list">
                        <?php foreach ($categories as $category):?>
                            <li class="product__cate-item <?=(isset($_GET['cate']) && $_GET['cate']==$category['id'])?'current-cate':''?>">
                                <a href="?pages=products&cate=<?=$category['id']?>" class="cate-name"><?=$category['brandName']?></a>
                            </li>
                        <?php endforeach;?>
                    </ul>
                </div>

                <div class="product__adventage">
                    <img src="./images/views/widget-ads.jpg" alt="" class="product__adventage-img">
                </div>
            </div>

            <div class="product__filter product-mobile">
                <h3>Category</h3>

                <ul class="product__cate-list">
                    <?php foreach ($categories as $category):?>
                        <li class="product__cate-item <?=(isset($_GET['cate']) && $_GET['cate']==$category['id'])?'current-cate':''?>">
                            <a href="?pages=products&cate=<?=$category['id']?>" class="cate-name"><?=$category['brandName']?></a>
                        </li>
                    <?php endforeach;?>

                </ul>
            </div>

            <div class="col l-10 m-12 c-12">
                <div class="product__banner">
                    <div class="row">
                        <div class="col l-6 m-6">
                            <a href="" class="product__colection">
                                <img src="./images/views/product-1.jpg" alt="" class="product__colection-img">
                            </a>
                        </div>

                        <div class="col l-6 m-6">
                            <a href="" class="product__colection">
                                <img src="./images/views/product-1.jpg" alt="" class="product__colection-img">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row product">
                    <?php if(mysqli_fetch_array($result) !=null) :?>
                        <?php foreach ($result as $item) :?>
<!--                        --><?php //var_dump(array_count_values($item));?>
                        <div class="col l-3 m-4 c-6">
                            <div class="product-item">
                                <div class="product-thumbnail">
                                    <img src="<?=$item['image']?>" alt="" class="product-image" >
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
                    <?php else :?>
                    <div class="col l-12">
                        <div class="product-item">
                            <h1>Product not found</h1>
                        </div>
                    </div>
                    <?php endif;?>
                </div>

                <div class="modal-overlay"></div>
                <div class="modal-product modal-overlay">
                    <div class="modal-container">
                        <div class="modal-product-box">
                            <button class="modal-close">
                                <i class="fas fa-times"></i>
                            </button>
                            <div class="modal-product-content">
                                <?php foreach ($result as $item) :?>
                                    <img src="<?=$item['image']?>" alt="" class="modal-product-img">
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product__pagination">
                    <ul class="product__pagination-list">
                        <?php for ($i=1;$i<=$totalPro;$i++) :?>
                            <li class="product__pagination-item <?= (empty($_GET['page']) && $i==1) || (isset($_GET['page']) && $_GET['page']==$i) ? 'active-page':''?>">
                                <a href="?pages=<?=$pages?>&page=<?=$i?>" class="product__pagination-link"><?=$i?></a>
                            </li>
                        <?php endfor;?>

<!--                        <li class="product__pagination-item">-->
<!--                            <a href="" class="product__pagination-link">></a>-->
<!--                        </li>-->
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>