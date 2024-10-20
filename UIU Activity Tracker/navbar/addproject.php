<?php
session_start();
include("db.php");
if (!isset($_SESSION['student_id'])) {
    header("location: ../index.php");
    exit;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["pro"])) {
        $_SESSION['partner'] = $_POST['addpartner'];

        header("location:projectpartnersearch.php");
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit"])) {
        $_SESSION['pname'] = $_POST['pname'];
        $_SESSION['pd'] = $_POST['pd'];
        $_SESSION['pl'] = $_POST['pl'];

        header("location:addprojectapi.php");
    }
}



?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/nevbar.css">
    <title><?php echo $_SESSION['student_name']; ?></title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span> Menu
            </button>
            <form action="#" class="searchform order-lg-last">
                <div class="form-group d-flex">
                    <input type="text" class="form-control pl-3" placeholder="Search">
                    <button type="submit" placeholder="" class="form-control search"><span class="fa fa-search"></span></button>
                </div>
            </form>
            <div class="collapse navbar-collapse" id="ftco-nav">

                <ul class="navbar-nav mr-auto">
                    <a href="studentprofile.php"><img class="rounded-circle me-lg-2" src="uploads/<?= $_SESSION['photo'] ?>" alt="" style="width: 80px; height: 80px;"></a>
                    <br>
                    <li class="nav-item "><a href="studentprofile.php" class="nav-link"><?php echo $_SESSION['student_name']; ?></a></li>
                    <li class="nav-item"><a href="studenthome.php" class="nav-link">Home</a></li>


                    <li class="nav-item"><a href="counsilling.php" class="nav-link">Counselling</a></li>
          
          
          <li class="nav-item"><a href="studentlogout.php" class="nav-link">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>






    <div class="container mt-5">

        <div class="row d-flex justify-content-center">

            <div class="col-md-7">

                <div class="card p-3 py-4">

                    <div class="text-center">
                        <img src="uploads/<?= $_SESSION['photo'] ?>" width="100" class="rounded-circle">
                    </div>

                    <div class="text-center mt-3">

                        <h2 class="mt-2 mb-0"><?php echo $_SESSION['student_name']; ?></h2>
                        <span><?php echo $_SESSION['student_id']; ?></span>




                        

                        
                        <br>


                        <form action="" method="post">
                            <div class="px-4 mt-1">
                                <label for="lname">
                                    <h3>Project Name</h3>
                                </label>
                                <br>
                                <input style="width:300px;height:50px; border:3px solid #FFA500;" type="text" id="pname" name="pname">

                                <br>
                                <label for="lname">
                                    <h3>Project Description</h3>
                                </label>
                                <br>
                                <textarea style="width:300px;height:150px; border:3px solid #FFA500;" type="text" id="pd" name="pd"></textarea>
                                <br>


                                <label for="lname">
                                    <h3>Project Link</h3>
                                </label>
                                <br>
                                <input style="width:300px;height:50px;border:3px solid #FFA500;" type="text" id="pl" name="pl">
                                <br>



                            </div>
                            <div class="buttons">

                                <button type="submit" name="submit" class="btn btn-outline-primary px-4">ADD</button>

                            </div>
                        </form>






                    </div>




                </div>

            </div>

        </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>