<!-- ****** Cart Area Start ****** -->
<?php 
$totalprice = 0;
foreach ($_SESSION['cart_products'] as $pkey => $quantity) {
    $product = $data->getProduct($pkey);
    $totalprice += $quantity*$product->price;
    echo "
                <div class='row'>
                    <div class='col-12'>
                        <div class='cart-table clearfix'>
                            <table class='table table-responsive'>
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class='cart_product_img d-flex align-items-center'>
                                            <a href='#'><img src='img/product-img/product-9.jpg' alt='Product'></a>
                                            <h6>$product->name</h6>
                                        </td>
                                        <td class='price'><span>$$product->price</span></td>
                                        <td class='qty'>
                                            <div class='quantity'>
                                                <span class='qty-minus'><a href='".URLROOT."/Product/decrementProduct/$pkey'><i class='fa fa-minus' aria-hidden='true'></i></a></span>
                                                <span class='qty-minus'><p class='mt-1'>$quantity</p></span>
                                                <span class='qty-plus'><a href='".URLROOT."/Product/incrementProduct/$pkey'><i class='fa fa-plus' aria-hidden='true'></i></a></span>
                                            </div>
                                        </td>
                                        <td class='total_price'><span>$".$quantity*$product->price."</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>";
} ?>
<div class='cart-footer d-flex mt-30'>
                            <div class='back-to-shop w-50'>
                                <a href="<?php echo URLROOT?>">Continue shopping</a>
                            </div>
                            <div class='update-checkout w-50 text-right'>
                                <a href="<?php echo URLROOT.'/Product/clearCart'?>">clear cart</a>
                            </div>
                        </div>
<div class="row">


    <div class="col-12 col-lg-9">
        <div class="cart-total-area mt-70">
            <div class="cart-page-heading">
                <h5>Cart total</h5>
                <p>Final info</p>
            </div>

            <ul class="cart-total-chart">
                <li><span>Subtotal</span> <span><?php echo $totalprice; ?></span></li>
                <li><span>Shipping</span> <span>Free</span></li>
                <li><span><strong>Total</strong></span> <span><strong><?php echo $totalprice; ?></strong></span></li>
            </ul>
            <a href="checkout.html" class="btn karl-checkout-btn">Proceed to checkout</a>
        </div>
    </div>
</div>
</div>
</div>
<!-- ****** Cart Area End ****** -->


<!-- /.wrapper end -->