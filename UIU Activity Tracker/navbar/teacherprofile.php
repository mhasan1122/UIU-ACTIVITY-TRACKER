<?php
session_start();
if (!isset($_SESSION['teacher_id'])) {
    header("location: ../index.php");
    exit;
}
include("db.php");
$tid = $_SESSION['teacher_id'];
$sq = "SELECT * FROM `teacher` WHERE id='$tid'";
$result = mysqli_query($conn, $sq);
$data = $result->fetch_assoc();
if ($result) {

    $image = $data['image'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $tid = $_SESSION['teacher_id'];
    $sq = "SELECT * FROM `teacher` WHERE id='$tid'";
    $result = mysqli_query($conn, $sq);
    $data = $result->fetch_assoc();
    if ($result) {
        $uoroom = $data['room'];

        $image = $data['image'];
        $_SESSION['teacher_image']=$data['image'];
    }
    $oroom = $uoroom;


    $room = $_POST["room"];



    if ($room != "") {
        $tid = $_SESSION['teacher_id'];
        $sql = "UPDATE  teacher set room = '$room' WHERE id='$tid' ";
        $result = mysqli_query($conn, $sql);
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

    <title><?php echo $_SESSION['teacher_name']; ?></title>
    <style type="text/css">
        a {
            color: black;
        }
    </style>
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
                    <a href="teacherprofile.php"><img class="rounded-circle me-lg-2" src="uploads/<?=  $image ?>" alt="" style="width: 80px; height: 80px;"></a>
                    <br>
                    <li class="nav-item active"><a href="" class="nav-link"><?php echo $_SESSION['teacher_name'] ?></a></li>
                    <li class="nav-item"><a href="teacherhome.php" class="nav-link">Home</a></li>


                    <li class="nav-item"><a href="facultyprojetrequest.php" class="nav-link">Project</a></li>
                    <li class="nav-item"><a href="teacherlogout.php" class="nav-link">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>






    <div class="container mt-5">

        <div class="row d-flex justify-content-center">

            <div class="col-md-7">

                <div class="card p-3 py-4">

                    <div class="text-center">
                        <img src="uploads/<?= $image ?>" width="100" class="rounded-circle">
                    </div>
                    <form action="tuplod.php" method="post" enctype="multipart/form-data">

                        <input type="file" name="my_image">
                        <br>

                        <input type="submit" name="submit" value="Upload" style="color:blue">

                    </form>

                    <div class="text-center mt-3">

                        <h5 class="mt-2 mb-0"><?php echo $_SESSION['teacher_name']; ?></h5>
                        <span><?php echo $_SESSION['teacher_profession']; ?></span>
                        <form action="" method="post">
                            <div class="px-4 mt-1">
                                <?php $tid = $_SESSION['teacher_id'];

                                $sq = "SELECT * FROM `teacher` WHERE id='$tid'";
                                $result = mysqli_query($conn, $sq);
                                $data = $result->fetch_assoc();
                                if ($result) {
                                    $uroom = $data['room'];
                                } ?>
                                <input type="text" class="form-control" id="inputEmail4" style='font-size: large ;color: blue;' placeholder=" Room No: <?php echo $uroom ?> " name="room">

                                <p>Email:<?php echo $_SESSION['teacher_email'] ?></p>

                            </div>



                            <div class="buttons">

                                <button type="submit" name="submit" class="btn btn-outline-success px-4">Save</button>

                            </div>

                        </form>
                        <br>
                        <h1 style="text-align:center;">All Counselling Time</h1>
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">Day</th>
                                    <th scope="col">Start Time</th>
                                    <th scope="col">End Time</th>

                                </tr>
                            </thead>
                            <?php
                            $s = "Select * from time_schedule where tid='$tid'";
                            $result = mysqli_query($conn, $s);
                            while ($row = mysqli_fetch_array($result)) {
                                $id = $row['id'];
                            ?>
                                <tbody>


                                    <tr>

                                        <td><?php echo $row['day'] ?></td>
                                        <td><?php echo $row['start'] ?></td>
                                        <td><?php echo $row['end'] ?></td>
                                        <?php echo " <td> <a href='deletetimeschedule.php?id=$id'> <button  type='button' class='btn btn-danger'>Delete</button></td>" ?>
                                    </tr>
                                </tbody>
                            <?php } ?>
                        </table>

                        <div class="buttons">

                            <a href='addtimeschedule.php'> <button type="submit" name="submit" class="btn btn-outline-primary px-4">ADD</button></a>

                        </div>

                    </div>




                </div>

            </div>

        </div>

    </div>
    <footer style="background-color:#f98113;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <a href="teacherhome.php">
                        <img src="../img/header-logo.png">
                </div>
                <div class="col">
                    <br>
                    <a href="teacherhome.php">
                        <h3 color: green;>Designed By Team Echo</h3>

                </div>



            </div>









    </footer>


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