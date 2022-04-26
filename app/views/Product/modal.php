
<div class="modal fade" id="imgView<?php echo $item->product_id?>" tabindex="-1" aria-labelledby="imgViewLabel" aria-hidden="true" style="margin-top: 200px ; ">
        <div class="modal-dialog">
            <button type="button" data-bs-dismiss="modal" style="border-radius:360px ; background-color:red; height:30px; width:30px; float:right;"><span class="fa fa-x"></span></button>
            <div class="modal-content" style="background-color:black;">
                <div class="modal-body">
                
                    <p style="color: white;">
                        <?php echo $item->description;?>
                    </p>
                </div>
        </div>
    </div>
</div>