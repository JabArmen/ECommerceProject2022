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

<?php 
    if($data != null){
?>

<div class="card mx-auto mt-3" style="width: 60%;">
        <h4 class="text-center">Here are the latest exchange rates:</h4>
        <h6>Provided by: <?php echo $data->provider ?></h6>
        <h6>Last updated at [UTC] : <?php echo $data->time_last_update_utc ?></h6>
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Currency Code</th>
      <th scope="col">Rate</th>
    </tr>
  </thead>
  <tbody>
      <?php 
        foreach ($data->rates as $code =>$rate) {
            echo '<tr>
            <td>'.$code.'</td>
            <td>'.$rate.'</td>
          </tr>';
        }
      ?>
  </tbody>
</table>
</div>


<?php 
    }
    else {
        echo 'No data';
    }
?>

<?php require APPROOT . '/views/includes/footer.php'; ?>