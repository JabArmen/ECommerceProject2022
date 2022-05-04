


<div id="popup1" class="overlay">
  <div class="popup"> <a class="close" id="closeB" href="#">&times;</a>
    <div id="dialog" class="window">

      <div class="box">
        <div class="newletter-title">
          <h2>Our Github link</h2>
        </div>
        <div class="box-content newleter-content">
          <label>Armen, Gevorg, Devrin</label>
          <div id="frm_subscribe">
            
            <div class="subscribe-bottom">
            <a href="https://github.com/JabArmen/ECommerceProject2022"><i class = "fa fa-github"></i></a>
            </div>
          </div>
          <!-- /#frm_subscribe -->
        </div>
        <!-- /.box-content -->
      </div>
    </div>
  </div>
</div>
  <script>
  function show() {
    var button2 = document.querySelector("#closeB");
    button2.addEventListener('click', function runThisOnButtonClick(event) {
    
      document.getElementsByClassName("overlay")[0].style.visibility = "hidden";
      document.getElementsByClassName("overlay")[0].style.opacity = "0";
});
    function news(){
    document.getElementsByClassName("overlay")[0].style.visibility = "visible";
    document.getElementsByClassName("overlay")[0].style.opacity = "1";
    }
    
    setTimeout(function(){document.getElementsByClassName("overlay")[0].style.visibility = "visible";
    document.getElementsByClassName("overlay")[0].style.opacity = "1";}, 3000);
  }
  show();
</script>