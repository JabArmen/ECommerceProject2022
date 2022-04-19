<?php require APPROOT . '/views/Admin/header.php';?>
    <br>
  <div class="latest-products">
  <div class="container">
      <div class="row">
        <table class = "table table-bordered">
        <?php
          foreach ($data['users'] as $user) {
            echo"<tr>";
                
                echo"<td>$user->username</td>";
                if($user->secret === null) {
                    echo "<td>null</td>";
                }else {
                    echo"<td>$user->secret</td>";
                }
                echo"<td>
                <a href='/ECommerceProject2022/Admin/deleteUser/$user->username.'> Delete</a>
                </td>";
                echo"</tr>";
          }
        ?>
        </table>

</div>
    </div>
  </div>

  


<?php require APPROOT . '/views/includes/footer.php'; ?>