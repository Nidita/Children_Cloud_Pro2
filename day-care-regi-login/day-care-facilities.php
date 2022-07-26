<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../customize-styles/regi-form.css">
    <link rel="stylesheet" href="../customize-styles/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/bc867c7232.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;1,400&display=swap"
        rel="stylesheet">

    <title>Day-care-facilities</title>
</head>

<body>
    <header>
        <!-- navigation bar -->
        <div class="container mb-5">
            <nav class="navbar fixed-top navbar-expand-lg">

                <a class="link navbar-brand" href="../index.html">Children-cloud</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="link nav-link active" aria-current="page" href="../index.html">Home</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="link nav-link active" aria-current="page" href="#">Home</a>
                        </li>

                        <li class="nav-item">
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
                            <ul class="dropdown-menu" aria-labelledby=user-dropdown">
                                <li><a class="dropdown-item" href="../login-page.html">Log In</a></li>
                                <hr>
                                <li><a class="dropdown-item" href="../register-page.html">Register</a></li>
                            </ul>
                        </li>
                    </ul>

                </div>
        </div>
        <!-- Ending navigation bar -->
        <br>
        <div class="outer-box container mt-5 mb-5">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6">
                    <div class="container thumbnail">
                        <h1>Welcome to Children-cloud!!</h1>
                        <p>
                            Parenting Guide,Daycare, Preschool,School-age,Special-childcare everything in one place for
                            new
                            and young parents.
                        </p>
                    </div>

                </div>
                <!--------------------Showing Contents------------------->
                <!----------Validating Elements------------------------>
                <?php
               $email = "p@gmail.com";
               $food=$medication=$sanitary=$transportation=$entertainment="";
               $foodErr=$medicationErr=$sanitaryErr=$transportationErr=$entertainmentErr="";


               require_once "../config.php";
               if(isset($_POST["register"]))
               {
                if(empty($_POST["food"]))
                {
                    $foodErr="Fill this Field!";

                }
                else
                {
                    $food=$_POST["food"];
                    $foodErr=$food;
                }
                if(empty($_POST["medication"]))
                {
                    $medicationErr="Fill this Field!";

                }
                else
                {
                    $medication=$_POST["medication"];
                    $medicationErr=$medication;
                }
                if(empty($_POST["sanitary"]))
                {
                    $sanitaryErr="Fill this Field!";

                }
                else
                {
                    $sanitary=$_POST["sanitary"];
                    $sanitaryErr=$sanitary;
                }
                if(empty($_POST["transportation"]))
                {
                    $transportationErr="Fill this Field!";

                }
                else
                {
                    $transportation=$_POST["transportation"];
                    $transportationErr=$transportation;
                }
                if(empty($_POST["entertainment"]))
                {
                    $entertainmentErr="Fill this Field!";

                }
                else
                {
                    $entertainment=$_POST["entertainment"];
                    $entertainmentErr=$entertainment;
                }
                

                if($foodErr!="Fill this Field!" && $medicationErr!="Fill this Field!" && $entertainmentErr!="Fill this Field!" && $transportationErr!="Fill this Field!" && $sanitaryErr!="Fill this Field!")
                {   //update users set username='JACK' and password='123' WHERE id='1';
                    $query=$mysqli->prepare("UPDATE daycare_info SET food_nutrition=? , medication_doctor=? , sanitary_hygiene=? , transportation=? , entertainment=?  WHERE demail= ?  ");
                    
                    $query->bind_param("ssssss",$food,$medication,$entertainment,$transportation,$sanitary,$email);
                    
        if ($query->execute()) {
            echo '<p class="container" style="text-align:center"><b style="color:green">Successful!</b></p>';
            

        } else {
            echo '<p class="container" style="text-align:center" ><b style="color:red">OPPS!!!<b/>Something went wrong!</p>';
        }
                }
 

               }
               
               

  

                ?>

                <!---------------Form Start------------------>

                <form class="daycare-form col-lg-6" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="container mt-5 mb-5">
                        <div class="small-font accordion accordion-flush" id="accordionFlushExample1">
                            <h1>
                                Facilities
                            </h1>
                            <small style="color:red;font-size:12px;">*Please fillup these required fields
                                with
                                the proper
                                information about your
                                daycare which will be shown on our website</small>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-food" >
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-food-collapse" aria-expanded="false"
                                        aria-controls="flush-food-collapse">
                                        Food & Nutrition
                                    </button>

                                </h2>
                                <div id="flush-food-collapse" class="accordion-collapse collapse"
                                    aria-labelledby="flush-food" data-bs-parent="#accordionFlushExample1">
                                    <div class="accordion-body" >

                                        <textarea name="food" value="<?php echo $food;?>"id="payment-food" cols="30"
                                            rows="10"><?php echo $foodErr;?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-medi">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-medi-collapse" aria-expanded="false"
                                        aria-controls="flush-medi-collapse">
                                        Medication,Treatment & Doctor
                                    </button>

                                </h2>
                                <div id="flush-medi-collapse" class="accordion-collapse collapse"
                                    aria-labelledby="flush-medi" data-bs-parent="#accordionFlushExample1">
                                    <div class="accordion-body">

                                        <textarea name="medication" value="<?php echo $medication;?>" cols="30"
                                            rows="10"><?php echo $medicationErr;?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-hygiene">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-hygiene-collapse" aria-expanded="false"
                                        aria-controls="flush-hygiene-collapse">
                                        Sanitary Kit & Hygiene
                                    </button>

                                </h2>
                                <div id="flush-hygiene-collapse" class="accordion-collapse collapse"
                                    aria-labelledby="flush-hygiene" data-bs-parent="#accordionFlushExample1">
                                    <div class="accordion-body">

                                        <textarea name="sanitary" value="<?php echo $sanitary;?>"id="payment-sanitary" cols="30"
                                            rows="10"><?php echo $sanitaryErr;?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-transport">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-transport-collapse" aria-expanded="false"
                                        aria-controls="flush-transport-collapse">
                                        Transportation
                                    </button>

                                </h2>
                                <div id="flush-transport-collapse" class="accordion-collapse collapse"
                                    aria-labelledby="flush-transport" data-bs-parent="#accordionFlushExample1">
                                    <div class="accordion-body">

                                        <textarea name="transportation" value="<?php echo $transportation;?>"id="payment-transportation" cols="30"
                                            rows="10"><?php echo $transportationErr;?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-entertainment">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-entertainment-collapse" aria-expanded="false"
                                        aria-controls="flush-entertainment-collapse">
                                        Entertainment
                                    </button>

                                </h2>
                                <div id="flush-entertainment-collapse" class="accordion-collapse collapse"
                                    aria-labelledby="flush-entertainment" data-bs-parent="#accordionFlushExample1">
                                    <div class="accordion-body">

                                        <textarea name="entertainment" value="<?php echo $entertainment;?>"id="payment-entertainment" cols="30"
                                            rows="10"><?php echo $entertainmentErr;?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mt-3">
                            <input type="submit" name="register" value="NEXT" class="btn btn-primary w-100">
                        </div>
                    </div>

                </form>

            </div>
        </div>




        <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>