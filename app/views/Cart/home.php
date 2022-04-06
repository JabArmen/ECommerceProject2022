<?php require APPROOT . '/views/includes/header.php';
?>


<body>
    <!-- Core Style CSS -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/core-style.css">

    <!-- Responsive CSS -->
    <link href="<?php echo URLROOT; ?>/css/responsive.css" rel="stylesheet">
<div class="cart_area section_padding_100 clearfix">
            <div class="container">
<?php
if(isset($_SESSION['cart_products'])){
    include_once 'loadedcart.php';
}
else {
    echo '<h1>There are no products in your cart</h1>
    <div class="cart-footer d-flex mt-30">
                            <div class="back-to-shop w-50">
                                <a href="'.URLROOT.'">Continue shopping</a>
                            </div>
                            
                        </div>';
}

?>

</div>
        </div>
</body>
</html>


<?php require APPROOT . '/views/includes/footer.php'; ?>