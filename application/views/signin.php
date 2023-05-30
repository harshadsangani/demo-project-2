<div class="auth-wrapper">
    <div class="auth-content">
        <div class="auth-bg">
            <span class="r"></span>
            <span class="r s"></span>
            <span class="r s"></span>
            <span class="r"></span>
        </div>
        <div class="card">
            <div class="card-body text-center">
                <div class="mb-4">
                    <i class="feather icon-unlock auth-icon"></i>
                </div>
                <h3 class="mb-4">Login</h3>
                <div><span id="err_msg" class="text-danger"></span></div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Email" require>
                </div>
                <div><span id="err_password" class="text-danger"></span></div>
                <div class="input-group mb-4">
                    <input type="password" class="form-control" id="password" name="password" placeholder="password"
                        required>
                </div>
                <!-- dropdown -->
                <select class="form-control" aria-label="Default select example" id="login_type" required>
                    <!-- <option selected>Admin</option> -->
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                </select>
                <span id="invalid" class="text-danger"></span>
                <button class="btn btn-primary shadow-2 mb-4 mx-auto d-flex justify-center " id="submit">Login
                </button>
            </div>
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->

<!-- submit data -->
<script type="text/javascript">
//ajax post
$(document).ready(function() {
    $("#username").on("input", function() {
        $("#err_msg").hide();
    });
    $("#password").on("input", function() {
        $("#err_password").hide();
    });

    // $(document).on('click', '#submit', function() {
    $("#submit").on('click', function() {
        var username = $("#username").val();
        var password = $("#password").val();
        var login_type = $("#login_type").val();
        // console.log(login_type)
        // console.log(username);
        // console.log(password);   
        // return false;



        if (username == "") {
            $("#err_msg").text("username is requared").show();
        }
        if (password == "") {
            $("#err_password").text("password is requred").show();
        }
        // console.log(username);
        // console.log(password);
        // console.log(login_type);
        // return false;
        if (username != "" && password != "") {
            $.ajax({

                type: "POST",
                url: "<?= base_url('/Login_controller/check_login'); ?>",
                data: {
                    username: username,
                    password: password,
                    login_type: login_type,         
                },

                success: function(result) {
                    // console.log(result)
                    // return false;
                    if (result == 1) {
                        window.location.href = "<?= base_url('Home_controller') ?>";
                    } else {
                        $("#invalid").html("Invalid username or password.");
                    }
                }
            })
        }

    })
});
</script>