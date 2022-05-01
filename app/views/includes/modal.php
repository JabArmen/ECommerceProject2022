<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="imgViewLabel" aria-hidden="true" style="margin-top: 200px ; ">
        <div class="modal-dialog">
            <button type="button" data-bs-dismiss="modal" style="border-radius:360px ; background-color:red; height:30px; width:30px; float:right;"><span class="fa fa-x"></span></button>
            <div class="modal-content" style="background-color:black;">
                <div class="modal-body">
                  <p style = "margin-left:20px; color: white;">Are you sure, you want to delete your account?<p>
                      <br>
                    <a href="#" data-bs-dismiss="modal" type="button" class="btn btn-secondary" style="
                        float: left;
                        width: 150px;
                        height: 40px;
                        background: #A7C7E7;
                        border: 1px solid #707070;
                        color: black;
                    ">Cancel</a>
                    <a href="http://localhost/ECommerceProject2022/UserInfo/delete/<?php echo $_SESSION['user_id']?>" type="button" class="btn btn-primary" style="
                        float: left;
                        width: 150px;
                        height: 40px;
                        background: #A7C7E7;
                        margin-left: 60px;
                        border: 1px solid #707070;
                        color: black;
                    ">Delete</a>
                    
                </div>
        </div>
    </div>
</div>