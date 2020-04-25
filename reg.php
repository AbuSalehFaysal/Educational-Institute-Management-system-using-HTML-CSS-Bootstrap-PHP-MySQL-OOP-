<?php 

    include_once dirname(__FILE__)."/autoload.php";

    use apps\libs\admins\Admin;
    // use apps\libs\staffs\Staff;
    // use apps\libs\students\Student;

    // new Admin;
    // new Staff;
    // new Student;

    $admin = new Admin;

     if ( isset($_SESSION['user_name']) ) {
        # code...
        header("location: dashboard.php");
    }

    


 ?>

<!DOCTYPE html>
<html lang="en" class=" ">
<!-- Mirrored from flatfull.com/themes/scale/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jul 2019 15:15:07 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Scale | Web Application</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="assets/css/app.v1.css" type="text/css" />
    <!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
</head>

<body class="">





    <section id="content" class="m-t-lg wrapper-md animated fadeInDown">
        <div class="container aside-xl"> <a class="navbar-brand block" href="index.html">Create an account</a>
            <section class="m-b-lg">

                <?php 

                    if ( isset($_POST['submit']) ) {
                        # code...

                        $name = $_POST['name'];

                        //username check
                        $uname = $_POST['uname'];
                        $username_check = $admin -> checkUsername($uname);

                        //email check
                        $email = $_POST['email'];
                        $email_check = $admin -> checkEmail($email);

                        //hash pass
                        $pass = $_POST['pass'];
                        // $hash_pass = password_hash($pass, PASSWORD_DEFAULT);
                        

                        if (isset( $_POST['agree'] )) {
                            # code...
                            $agree = true;
                        }else{
                            $agree = false;
                        }


                        if (empty($name) || empty($uname) || empty($email) || empty($pass)  ) {
                            # code...
                            $mess = "<p class='alert alert-danger'>Please, fill the form properly!<button class='close' data-dismiss='alert'>&times;</button></p>";
                        }elseif ( $agree == false ) {
                            # code...
                            $mess = "<p style='width: 340px; ' class='alert alert-danger'>Please indicate that you agree the terms and policy!<button class='close' data-dismiss='alert'>&times;</button></p>";
                        }elseif (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
                            # code...
                            $mess = "<p  class='alert alert-danger'>Invalid Email!<button class='close' data-dismiss='alert'>&times;</button></p>";
                        }elseif ($username_check == false) {
                            # code...
                            $mess = "<p  class='alert alert-danger'>Username already exists!<button class='close' data-dismiss='alert'>&times;</button></p>";
                        }elseif ($email_check == false) {
                            # code...
                            $mess = "<p  class='alert alert-danger'>Email already exists!<button class='close' data-dismiss='alert'>&times;</button></p>";
                        } else {
                            # code...
                            $data = $admin -> adminRegistration($name, $uname, $email, $pass);
                            if ($data == true) {
                                # code...
                                $mess = "<p  class='alert alert-success'>Congratulations!<button class='close' data-dismiss='alert'>&times;</button></p>";
                            } else {
                                # code...
                            }
                            
                        }
                        
                        
                    }


                 ?>

                 <div class="mess">
                    <?php  

                        if( isset($mess) ){
                            echo $mess;
                            }

                    ?>
                </div>


                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">


                    <div class="list-group">
                        <div class="list-group-item">
                            <input name="name" placeholder="Name" type="text" class="form-control no-border"> 
                        </div>
                        <div class="list-group-item">
                            <input name="uname" placeholder="Username" type="text" class="form-control no-border"> 
                        </div>
                        <div class="list-group-item">
                            <input name="email" type="text" placeholder="Email" type="text" class="form-control no-border"> 
                        </div>
                        <div class="list-group-item">
                            <input name="pass" type="password" placeholder="Password" type="password" class="form-control no-border"> 
                        </div>
                    </div>


                    <div class="checkbox m-b">
                        <label>
                            <input name="agree" value="agree" type="checkbox"> Agree the <a href="#">terms and policy</a> </label>
                    </div>


                    <button name="submit" type="submit" class="btn btn-lg btn-primary btn-block">Sign up</button>


                    <div class="line line-dashed"></div>


                    <p class="text-muted text-center"><small>Already have an account?</small></p> <a href="index.php" class="btn btn-lg btn-default btn-block">Sign in</a> 
                </form>





            </section>
        </div>
    </section>



















    <!-- Bootstrap -->
    <!-- App -->
    <script src="assets/js/app.v1.js"></script>
    <script src="assets/js/app.plugin.js"></script>
</body>
<!-- Mirrored from flatfull.com/themes/scale/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jul 2019 15:15:07 GMT -->

</html>