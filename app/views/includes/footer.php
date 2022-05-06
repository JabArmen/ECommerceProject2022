<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="inner-content">
                    <p class="para">2022 Team SussyKeychains

                        - Armen Jabamikos | Gevorg Markarov | Devrin Aiden Tiongson</a></p>
                    <p class="para">Among Us is &copy; 2018-2021 Innersloth LLC</p>
                </div>

            </div>

        </div>

        <div id="donate-button-container">
            <div id="donate-button"></div>
            <script src="https://www.paypalobjects.com/donate/sdk/donate-sdk.js" charset="UTF-8"></script>
            <script>
                PayPal.Donation.Button({
                env:'production',
                hosted_button_id:'2HN4SJ7CG9UK2',
                image: {
                src:'https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif',
                alt:'Donate with PayPal button',
                title:'PayPal - The safer, easier way to pay online!',
                }
                }).render('#donate-button');
            </script>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="<?php echo URLROOT; ?>/vendor/jquery/jquery.min.js"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



<!-- Additional Scripts -->
<script src="<?php echo URLROOT; ?>/js/custom.js"></script>
<script src="<?php echo URLROOT; ?>/js/owl.js"></script>
<script src="<?php echo URLROOT; ?>/js/slick.js"></script>
<script src="<?php echo URLROOT; ?>/js/isotope.js"></script>
<script src="<?php echo URLROOT; ?>/js/accordions.js"></script>


<script language="text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t) { //declaring the array outside of the
        if (!cleared[t.id]) { // function makes it static and global
            cleared[t.id] = 1; // you could use true and false, but that's more typing
            t.value = ''; // with more chance of typos
            t.style.color = '#fff';
        }
    }
</script>


</body>

</html>