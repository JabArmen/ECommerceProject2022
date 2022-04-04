<?php require APPROOT . '/views/includes/header.php';  ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
 

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/MVC/API/ExchangeRates">Exchange rates</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/MVC/API/Holidays">Holidays</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/MVC/API/Age">Age</a>
      </li>
    </ul>
   
  </div>
</nav>


<div class="card mx-auto mt-3" style="width: 80%;">
    <?php 
        if($data['msg'] != null){
            echo '<div class="alert alert-danger" role="alert">'.
                $data['msg'].'
            </div>';
        }
        else{

            echo '<p class="lead text-center display-4">
            The age of '.$data['ageData']->name.' is '.$data['ageData']->age.'
          </p>';
            
        }
    ?>


</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>