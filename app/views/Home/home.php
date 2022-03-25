<?php require APPROOT . '/views/includes/header.php'; 
?>
    <h1>Home View</h1>
    <p>This view is invoked by HomeController</p>

    <?php
        if($data != []){
            echo '<div class="alert alert-success" role="alert">'.
             $data['msg'].'
          </div>';
        }
    ?>
<?php require APPROOT . '/views/includes/footer.php'; ?>