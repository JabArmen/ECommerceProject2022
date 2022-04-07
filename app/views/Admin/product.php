<?php require APPROOT . '/views/Admin/header.php';?>
    <br>
  <div class="latest-products">
  <div class="container">
      <div class="row">
        <table class = "table table-bordered">
        <?php
          foreach ($data as $item) {
            
            echo"<tr>";
                
                echo"<td>$item->name</td>";
                echo"<td>$item->price</td>";
                echo"<td>$item->description</td>";
                echo"<td>
                <a href='/ECommerceProject2022/Admin/addProduct'> Add</a>
                </td>";
                echo"<td>
                <a href='/ECommerceProject2022/Admin/updateProduct/$item->product_id.'> Update</a>
                </td>";
                echo"<td>
                <a href='/ECommerceProject2022/Admin/deleteProduct/$item->product_id.'> Delete</a>
                </td>";
                echo"</tr>";
          }
        ?>
        </table>

</div>
    </div>
  </div>

  


<?php require APPROOT . '/views/includes/footer.php'; ?>