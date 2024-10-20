<?php
include("db.php");






session_start() ;
if(!isset($_SESSION['student_id'])){
  header("location: ../index.php");
  exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $searchteacher = $_POST["searchteacher"];
  $_SESSION['searchteacher']=$searchteacher;
  
header("location: searchteacher.php");
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $searchteacher = $_POST["teacher"];
    $_SESSION['searchteacher']=$courses;
    header("location: searchteacher.php");
    }


?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Student</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/nevbar.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	</head>
	<body style="background-color:burlywood;">
	<!--<section class="ftco-section"> !-->
		
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	    
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
				<form action="" method="post" class="searchform order-lg-last">
          <div class="form-group d-flex">
            <input type="text" class="form-control pl-3" placeholder="Search" name="searchteacher" >
            <button type="submit" placeholder="" class="form-control search"><span class="fa fa-search" style="color:orange"></span></button>
          </div>
        </form>
	      <div class="collapse navbar-collapse" id="ftco-nav">
			
	        <ul class="navbar-nav mr-auto">
		<a href="studentprofile.php"><img class="rounded-circle me-lg-2" src="uploads/<?=$_SESSION['photo']?>" alt="" style="width: 80px; height: 80px;" ></a>
			<br>
			<li class="nav-item "><a href="studentprofile.php" class="nav-link"><?php echo $_SESSION['student_name']; ?></a></li>
	        	<li class="nav-item "><a href="studenthome.php" class="nav-link">Home</a></li>
	        	
	        	
            <li class="nav-item"><a href="counsilling.php" class="nav-link">Counselling</a></li>
          <li class="nav-item"><a href="Coursemet.php" class="nav-link">Participants</a></li>
            <li class="nav-item"><a href="studentlogout.php" class="nav-link">Logout</a></li>
            
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
	<br>

	</section>
    <div>
    <form action="" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4"><b> Search Teacher </b></label>
      <input style="width:300px;" type="text" class="form-control" id="inputEmail4" placeholder="Teacher Name" name ="teacher">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Go</button>
</form>
    </div>
    <div>
    
    <h1 style="text-align:center">All Teacher</h1>
    <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Teacher Name</th>
      
      <th scope="col">Designation</th>
      <th scope="col">Department</th>
      <th scope="col">Official Email</th>
      <th scope="col">Image</th>

      
    </tr>
  </thead>
  <?php
  
  $searchteacher=$_SESSION['searchteacher'];

  $s="Select * from teacher where name like'%$searchteacher%' ";

  $result = mysqli_query($conn,$s);
  $id;

  

  
  while($row = mysqli_fetch_array($result)){
    $id=$row['id'];

  ?>
  
  <tbody>
    <tr>
    
      <th><?php echo $row['name']?></th>
      <td><?php echo $row['profession']?></td>
      
      
      <td><?php echo $row['department']?></td>
      <td> <?php echo $row['email']?></td>
      <td><img class="rounded-circle me-lg-2"  src="uploads/<?php echo $row['image']?>" alt="" style="width: 80px; height: 80px;"></td>

      <?php echo"<td> <a href='show_teacher_profile.php?id=$id'> <button type='button' class='btn btn-success'>ADD</button></td>"?>
    </tr>
    <?php }  ?>
    
  </tbody>
</table>

  
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
      <a href="studenthome.php">
    <h3 color: green;>Designed By Team Echo</h3>
 
    </div>

    

  </div>



  


  

  
  </footer>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

