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

<div class="card mx-auto mt-3" style="width: 80%;">
        <h4 class="text-center">Here are the holiday</h4>
        <h6 class="text-center">Total holidays: <?php echo count($data) ?></h6>   
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Data</th>
      <th scope="col">Name</th>
      <th scope="col">Local Name</th>
      <th scope="col">Provinces</th>
    </tr>
  </thead>
  <tbody>
      <?php 
        foreach ($data as $holiday) {
            echo '<tr>
            <td>'.$holiday->date.'</td>
            <td>'.$holiday->name.'</td>
            <td>'.$holiday->localName.'</td>
            <td>'; 

            if($holiday->counties != null){
    
                foreach($holiday->counties as $county){
                    $provinces = (explode(" ",$county));
            
                    foreach ($provinces as $province) {
                        $province = ltrim($province, "CA"); 
                        $province = ltrim($province, "-");
                        echo "<li>";
                        echo $province;
                        echo " ";
                        echo "</li>";
                    }
                }
            }
            else{
                echo " - ";
            }   
            echo'</td>
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