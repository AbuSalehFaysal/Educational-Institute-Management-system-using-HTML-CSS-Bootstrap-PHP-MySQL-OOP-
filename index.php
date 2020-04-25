<?php 
    session_start();
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
<head>
    <meta charset="utf-8" />
    <title>Scale | Web Application</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="assets/css/app.v1.css" type="text/css" />
    <!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
</head>

<body class="">
    <section id="content" class="m-t-lg wrapper-md animated fadeInUp">
        <div class="container aside-xl"> <a class="navbar-brand block" href="index.html">Sign in from here</a>
            <section class="m-b-lg">

                <?php 

                    if ( isset($_POST['submit']) ) {
                        # code...
                        $euname = $_POST['euname'];
                        $pass = $_POST['pass'];

                        if ( empty($euname) || empty($pass) ) {
                            # code...
                            $mess = "<p class='alert alert-danger'>Please, fill the form properly!<button class='close' data-dismiss='alert'>&times;</button></p>";
                        } else {
                            # code...
                             $mess = $admin -> userLogin($euname, $pass);
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
                            <input name="euname" type="text" placeholder="Email / Username" class="form-control no-border"> 
                        </div>
                        <div class="list-group-item">
                            <input name="pass" type="password" placeholder="Password" class="form-control no-border"> 
                        </div>
                    </div>

                    <!-- <div class="checkbox m-b">
                        <label>
                            <input type="checkbox"> Remember Me <a href="#">for next time login</a> </label>
                    </div> -->
                    <button name="submit" type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>

                    <!-- <div class="text-center m-t m-b"><a href="reset_pass.php"><small>Forgot password?</small></a></div> -->


                    <div class="line line-dashed"></div>
                    <p class="text-muted text-center"><small>Do not have an account?</small></p> 
                    <a href="reg.php" class="btn btn-lg btn-default btn-block">Create an account</a> 
                </form>


            </section>
        </div>
    </section>
   

    <!-- / footer -->
    <!-- Bootstrap -->
    <!-- App -->
    <script src="assets/js/app.v1.js"></script>
    <script src="assets/js/app.plugin.js"></script>
</body>

</html>