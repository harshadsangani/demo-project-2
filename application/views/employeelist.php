<!-- Button trigger modal -->
<div id="session_expired_popup" style="display:none;">
    <p>Your session has expired. Please log in again.</p>
</div>

<button type="button" class="btn btn-primary float-right mt-5 mx-4" data-bs-toggle="modal"
    data-bs-target="#exampleModal">
    Add
</button>
<button type="button" class="btn btn-primary float-right mt-5" id="logout">
    log out
</button>
<div class="container mt-5">

    <!-- staff list table -->

    <table class="table table-bordered" name="tb1" style="width: 80%; margin: auto;">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Emp_id</th>
                <th scope="col">Emp_name</th>
                <th scope="col">emp_designation</th>
                <th scope="col">roll_add</th>
                <th scope="col">roll_edit</th>
                <th scope="col">roll_delete</th>
                <th scope="col">roll_view</th>
                <th scope="col">emp_doj</th>
                <th scope="col">emp_img</th>

            </tr>
        </thead>
        <tbody>

            <?php                                
              foreach ($getdata as $row)  
             { ?>
            <tr>
                <td><?php echo $row->emp_id;?></td>
                <td><?php echo $row->emp_name;?></td>
                <td><?php echo $row->emp_des;?></td>
                <td><?php echo $row->role_add;?></td>
                <td><?php echo $row->role_edit;?></td>
                <td><?php echo $row->role_delete;?></td>
                <td><?php echo $row->role_view;?></td>
                <td><?php echo $row->emp_doj;?></td>
                <td>
                    <?php if($row->image_path){?>
                    <img height="50px" width="50px" src="<?php echo base_url('/uploads/').$row->image_path;?>">
                    <?php }?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h4>Employee Information Form</h4>

                    <!-- form start  -->
                    <form method="post" id="submit-form" enctype="multipart/form-data" action=" ">
                        <div class="form-group">
                            <label for="">upload your image here</label>
                            <input type="file" name="img_file" class="form-control" id="img_upload">
                            <!-- <div id="error_msg"></div> -->
                            <h4 id="error_msg"></h4>
                        </div>
                        <div class="form-group">
                            <label class="text-dark" for="emp-id">Employee ID:</label>
                            <input type="text" class="form-control" id="emp_id" name="emp_id">
                        </div>

                        <div class="form-group">
                            <label class="text-dark" for="emp-name">Employee Name:</label>
                            <input type="text" class="form-control" id="emp_name" name="emp_name">
                        </div>

                        <div class="form-group">
                            <label class="text-dark" for="emp-destination">Employee Destination:</label>
                            <input type="text" class="form-control" id="emp_des" name="emp_des">
                        </div>
                        <!-- roll start -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="add" name="roll_add">
                            <label class="form-check-label text-dark" for="add">Add</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="edit" name="roll_edit">
                            <label class="form-check-label text-dark" for="edit">Edit</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="delete" name="roll_delete">
                            <label class="form-check-label text-dark" for="delete">Delete</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="view" name="roll_view">
                            <label class="form-check-label text-dark" for="view">View</label>
                        </div>

                        <div class="form-group mt-3">
                            <label class="text-dark" for="emp-doj">Employee Date of Joining:</label>
                            <input type="date" class="form-control" id="emp-doj" name="emp_doj">
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="submit_form_btn" class="btn btn-primary">Submit</button>
            </div>

            </form>
            <div id="error-msg"></div>
            <!-- form end -->
        </div>
    </div>
</div>

<!-- ajax -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#submit_form_btn').click(function(e) {
        e.preventDefault();
        // var formData = new FormData();
        var formData = new FormData($('#submit-form')[0]);
        console.log(formData);
        // return false;
        $.ajax({
            url: '<?php echo base_url("Login_Controller/insert_data"); ?>',
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                // console.log(response);
                // Handle the response from the server

                if (response == 1) {
                    window.location = "<?php echo site_url('Home_controller/index'); ?>";
                } else {
                    alert(
                        "please upload image less than 38mb OR choose formant jpg|jpeg|png"
                    );
                    // location.reload();
                }

            },
            error: function(jqXHR, textStatus, errorThrown) {
                // console.log(textStatus, errorThrown);
                var errormsg = jqXHR.responseText;
                $("#error_msg").html(errormsg);
            }
        });
    });
});
</script>
<script>
//logout jquery
$(document).ready(function() {
    $('#logout').click(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("Login_Controller/logout"); ?>',
            success: function(response) {
                var res = JSON.parse(response);
                if (res.status) {
                    alert("logout succesfully")
                    window.location.href = '<?php echo base_url('Login_Controller'); ?>';
                }
            }
        });
    });
});
</script>
<script>
function checkSession() {
    $.ajax({
        url: '<?php echo base_url("Home_Controller/check_session_status"); ?>',
        success: function(response) {
            if (response == "expired") {
                // show the pop-up message
                $('#session_expired_popup').show();
                window.location.href = '<?php echo base_url('Login_Controller/index'); ?>';
            } else {
                // session is still active, check again after 5 seconds
                setTimeout(checkSession, 5000);
            }
        }
    });
}
</script>