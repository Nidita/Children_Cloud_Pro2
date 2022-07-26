<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../customize-styles/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../customize-styles/regi-form.css">
    <script src="https://kit.fontawesome.com/bc867c7232.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;1,400&display=swap"
        rel="stylesheet">

    <title>User login form </title>
</head>

<body>

    <!-- navigation bar -->
    <div class="container mb-5">
        <nav class="navbar fixed-top navbar-expand-lg">

            <a class="link navbar-brand" href="#">Children-cloud</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="link nav-link active" aria-current="page" href="../index.html">Home</a>
                    </li>

                    <!-- <li class="nav-item">
                        <a class="link nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="link nav-link" href="#services">Services</a>
                    </li> -->
                    <li class="nav-item dropdown">
                        <a class="link nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Child-Care Categories
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <li><a class="dropdown-item" href="#">Toddler</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Pre-School</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">School-Age</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Special-Child</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Foreigner-Child</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="link nav-link" href="">Parenting-Guide</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="user-dropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-circle-user"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="user-dropdown">
                            <li><a class="dropdown-item" href="../login-page.html">Log In</a></li>
                            <hr>
                            <li><a class="dropdown-item" href="../register-page.html">Register</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
    </div>
    <!-- Ending navigation bar -->
    <div class="outer-box container mt-5 mb-5">

        <div class="row d-flex  align-items-center">
            <div class=" col-lg-6 p-3">

                <!-- <img id="form-img" src="images/form/form-todd.jpg" alt=""> -->
                <div class="container thumbnail">
                    <h1>Welcome to Children-cloud!!</h1>
                    <p>
                        Parenting Guide,user, Preschool,School-age,Special-childcare everything in one place for
                        new
                        and young parents.
                    </p>
                </div>

            </div>
            <!------------------------Showing Contents----------------->
            <!-------------------------Validation------------------------------->
            <?php
            $email=$password=$l="";
            $emailErr=$passwordErr="";
            require_once "../config.php";
            if(isset($_POST["login"]))
            {
                if(empty($_POST["email"]))
                {
                    $emailErr="Please give email!";
                    

                }
                else
                {
                    $email=$_POST["email"];
                    $emailErr="";
                    
                }
                
                if(empty($_POST["password"]))
                {
                    $passwordErr="Please give password!";
                    

                }
                else
                {
                    $password=$_POST["password"];
                    $passwordErr="";
                    
                }
                if($emailErr=="" && $passwordErr=="")
                {
                    
                    
                    $query=$mysqli->prepare("SELECT upassword FROM user_information WHERE uemail=?");
                    $query->bind_param("s",$email);
                    $query->execute();
                    $result=$query->get_result();
                    if($result->num_rows == 0)
                    {
                        $emailErr="This email is not registered!";
                    }
                    else
                    {   $row = $result->fetch_array(MYSQLI_NUM);
                        $hashed_pass=$row[0];
                        
                        if(password_verify($password, $hashed_pass))
                        {
                            
                           $l="successful!";
                            
                        }
                        else
                        {
                            $passwordErr="Password is incorrect!";
                            $l="Not Successful!";
                        }
                        $query->close();
                        
                    }
                }
            }


            ?>


            <!-----------------------Form Begin---------------------->

            <form class="user-login-form col-lg-6"action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="row d-flex">
                    <p class="h3 mb-3">Login as an user</p>
                    <div class="col-lg-12">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" id="floating-user-email"
                                placeholder="user Email Address" required>
                            <label for="floating-user-email">Email Address</label><span style="color:red;font-size:1rem ;">*<?php echo $emailErr;?></span>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-floating mb-3"><input type="password" class="form-control" name="password"
                                id="floating-user-pass" placeholder="Password" required>
                            <label for="floating-user-pass"> Password</label><span style="color:red;font-size:1rem ;">*<?php echo $passwordErr;?></span>
                               
                        </div>
                    </div>
                    <div class="col-lg-12 mt-3">
                        <input type="submit" name="login" value="Login" class="btn btn-primary w-100">
                    </div>
                    <div class="col-lg-12 mt-3" style="text-align:center">
                        <h6>Don't have an account?
                            <a href="../user-regi-login/user-regi.html"> Create One</a>
                        </h6>
                    </div>
                </div>
            </form>
        </div>
    </div>





    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>