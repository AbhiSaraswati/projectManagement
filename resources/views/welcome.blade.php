<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <section class="bg-image">
            <div class="mask d-flex align-items-center gradient-custom-3">
                <div class="container">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-6 mt-5" id="register-column">
                            <div class="card" style="border-radius: 15px;">
                                <div class="card-body px-5">
                                    <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                                    <form id="registration_form">

                                        
                                        <div class="form-outline mb-3">
                                            <input type="text" id="register_name" name="register_name" class="form-control form-control-lg" />
                                            <label class="form-label" for="form3Example1cg">Your Name</label>
                                        </div>

                                        <div class="form-outline mb-3">
                                            <input type="email" id="register_email" name="register_email" class="form-control form-control-lg" />
                                            <label class="form-label" for="form3Example3cg">Your Email</label>
                                        </div>

                                        <div class="form-outline mb-3">
                                            <input type="password" id="register_password" name="register_password" class="form-control form-control-lg" />
                                            <label class="form-label" for="form3Example4cg">Password</label>
                                        </div>

                                        <div class="d-flex justify-content-center">
                                            <button type="button" onclick="registerUser();" class="btn btn-success btn-block btn-lg gradient-custom-4 text-light">Register</button>
                                        </div>

                                        <p class="text-center text-muted mt-3 mb-0">Have already an account? <a href="#!" onclick="registerSwitchForms();" class="fw-bold text-body"><u>Login here</u></a></p>
                                    </form>

                                </div>
                            </div>
                        </div>

                        <div class="col-6 mt-5" id="login-column">
                            <div class="card" style="border-radius: 15px;">
                                <div class="card-body px-5">
                                    <h2 class="text-uppercase text-center mb-5">Login Your Account</h2>

                                    <form>
                                        
                                        <div class="form-outline mb-3">
                                            <input type="email" id="login_email" name="login_email" class="form-control form-control-lg" />
                                            <label class="form-label" for="form3Example3cg">Your Email</label>
                                        </div>

                                        <div class="form-outline mb-3">
                                            <input type="password" id="login_password" name="login_password" class="form-control form-control-lg" />
                                            <label class="form-label" for="form3Example4cg">Password</label>
                                        </div>

                                        <div class="d-flex justify-content-center">
                                            <button type="button" onclick="send_login_details();" class="btn btn-success btn-block btn-lg gradient-custom-4 text-light">Login</button>
                                        </div>

                                        <!-- <p class="text-center text-muted mt-3 mb-0">Dont have an account? <a href="#!" onclick="loginSwitchForms();" class="fw-bold text-body"><u>Go to Register</u></a></p> -->
                                   
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>

    var data = {};
    data['_token'] = " {{csrf_token()}} "
$( document ).ready(function() {
    $("#register-column").hide();
});

function registerSwitchForms() {
    $("#login-column").show();
    $("#register-column").hide();
}

function loginSwitchForms() {
    $("#login-column").hide();
    $("#register-column").show();
}

function registerUser() {
        data['name'] = $("#register_name").val();
        data['email'] = $("#register_email").val();
        data['password'] = $("#register_password").val();
        $.ajax({
            type:"POST",
                data:data,
                url:"save_signup_details",
                success:function(returndata) {
                    if(returndata == 1) {
                        alert("Thank You for Signing up");
                        $("#registration_form")[0].reset();
                        $("#login-column").show();
                        $("#register-column").hide();
                    } else {
                        alert("Something went wrong.. Try Again");
                    }  
                }
        })
    }

    function send_login_details() {
        data['email'] = $("#login_email").val();
        data['password'] = $("#login_password").val();
        $.ajax({
            type:"POST",
                data:data,
                url:"check_login_details",
                success:function(returndata) {
                    // alert(returndata);
                    // console.log(returndata);
                    var rowCount = returndata['count_rows'];
                    var designation = returndata['designation'];
                    // console.log(emailid);
                    if(rowCount == 1 && designation == 0) {
                        window.location.href = "dashboard";
                        $("#signup_form")[0].reset();
                    } else if (rowCount == 1 && designation == 2) {
                        window.location.href = "cto_page";
                    } else {
                        alert("Something went wrong.. Try Again");
                    }
                    
                }
        })
    }

</script>
</html>