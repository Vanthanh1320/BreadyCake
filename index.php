<?php
    ob_start();
    session_start();
    $conn= new mysqli('localhost','root','','cake');
//    unset($_SESSION['carts']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' id='bready-custom-fonts-css' href="https://fonts.googleapis.com/css?family=Kaushan+Script%7CLora%3A400%2C700%7CLibre+Baskerville%3A400%2C400i%2C700&#038;ver=1.0.8" media='all' />
    <link rel='stylesheet' id='font-awesome-css'  href='http://warethemes.com/wordpress/bready/wp-content/plugins/js_composer/assets/lib/bower/font-awesome/css/font-awesome.min.css?ver=6.0.4' media='all' />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/responsive.css">
    <link rel="stylesheet" href="./css/grid.css">
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-replace-svg="nest"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="shortcut icon" type="image/png" href="./images/views/logo-light.png"/>
    <title>Bready</title>
</head>
<body>
<div class="main">

    <div class="search__box">
        <div class="search__remove ">
            <i class="fas fa-times"></i>
        </div>
        <div class="search__container">
            <div class="search__header">
                <p>Enter yours keywords:</p>
                <form action="" class="search__form" method="get">
                    <input type="hidden" name="pages" value="products">
                    <input type="text" class="form-control" name="keyword">

                    <button class="search__btn">
                        <img src="./images/views/icons8-search-30.png" alt="" class="search__img">
                    </button>
                </form>
            </div>
        </div>
    </div>

    <header class="header">
        <?php
            if(isset($_GET['pages'])){
                include 'view/layout/header.php';
            }else{
                include 'view/headerHome.php';
            }
        ?>
    </header>

        <?php
            include 'view/layout/article.php';
        ?>

    <footer class="footer">
      <?php include 'view/layout/footer.php'?>
    </footer>

    <div class="backtop">
        <i class="fa fa-angle-up"></i>
    </div>
</div>

    <?php include 'view/layout/script.php'?>

</body>
</html>