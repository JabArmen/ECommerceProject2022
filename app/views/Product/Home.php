<style>
    .yellow-color {
        color: rgb(246, 246, 19);
    }

    .product {
        width: 370px;
    }

    image {
        position: absolute;
        right: 12px;
        top: 10px
    }
</style>

<?php require APPROOT . '/views/includes/header.php';
?>
<h1>Our Products</h1>
<div class="container">
    <div class="row">
        <?php
        $i = 0;
        foreach ($data as $item) {
            echo '<div class="col">';
                echo '<div class="height d-flex">';
                echo '<div class="card p-3 product">';
                echo '<div class="d-flex justify-content-between align-items-center ">';
                echo '<div class="mt-2">';
                echo "<h4 class='text-uppercase'>$item->name</h4>";
                echo '<div class="mt-5">';
                echo '    <h5 class="text-uppercase mb-0">Price</h5>';
                echo "    <h1 class='main-heading mt-0'>$ $item->price</h1>";
                echo '    <div class="d-flex flex-row user-ratings">';
                echo '        <div class="ratings"> <i class="fa fa-star yellow-color"></i> <i class="fa fa-star yellow-color"></i><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>';
                echo '        <h6 class="text-muted ml-1">2/5</h6>';
                echo '    </div>';
                echo '</div>';
                echo '</div>';
                echo '<div class="image">';
                echo '    <!-- Image --><img src="https://cdn.shopify.com/s/files/1/0609/2541/products/kr17-01ch_grande.jpg?v=1541729873" width="200">';
                echo '</div>';
                echo '</div>';

                echo "<p>$item->description </p> <button class='btn btn-danger'>Add to cart</button>";
                echo '</div>';

                echo '</div>';
            echo '</div>';
            $i++;
            if ($i % 4 == 0) {
                echo '</div>';
                echo '<div class="row">';
            }
        }
        ?>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>