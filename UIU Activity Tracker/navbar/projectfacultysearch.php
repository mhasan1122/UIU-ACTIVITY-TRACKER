<?php
session_start();

include("db.php");



?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/nevbar.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <title>Search Results</title>
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
          <li class="nav-item "><a href="" class="nav-link"><?php echo $_SESSION['student_name']; ?></a></li>
          <li class="nav-item active"><a href="studenthome.php" class="nav-link">Home</a></li>

          <li class="nav-item"><a href="counsilling.php" class="nav-link">Counselling</a></li>
          <li class="nav-item active"><a href=" Coursemet.php" class="nav-link">Participants</a></li>

          <li class="nav-item"><a href="studentlogout.php" class="nav-link">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <br>
  <h1 style="text-align:center">Search Results</h1>

  <table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Id</th>
        <th scope="col">Email</th>
        <th scope="col">Image</th>
      </tr>
    </thead>
    <?php
    $sid = $_SESSION['partner'];
    $idz = $_GET['id'];


    $s = "Select * from teacher where name like '%$sid%'";
    $result = mysqli_query($conn, $s);
    while ($row = mysqli_fetch_array($result)) {
      $id = $row['id'];
      $name = $row['name'];

    ?>
      <tbody>
        <tr>
          <th><?php echo $row['name'] ?></th>
          <td><?php echo $row['id'] ?></td>
          <td><?php echo $row['email'] ?></td>
          <td><img class="rounded-circle me-lg-2" src="uploads/<?= $row['image'] ?>" alt="" style="width: 80px; height: 80px;"></td>
          <?php echo "<td> <a href='addfaculty.php?id=$id&name=$name&proid=$idz'><button type='button' class='btn btn-primary'>ADD</button> </a></td>" ?>
        </tr>


      </tbody>
    <?php } ?>
  </table>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>