<!doctype html>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Stocks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>

</head>
<style>
nav {
    background-color: #333; /* Dark background color for the navigation bar */
    padding: 10px;
    margin-bottom: 20px;
    position: fixed; /* Fixed position to stick at the top */
    width: 100%; /* Take the full width of the screen */
    top: 0; /* Stick to the top */
    left: 0;
    bottom:20;
    z-index: 1000; /* Set a high z-index to make sure it appears above other elements */
}
nav a {
            color: #fff; /* White color for the navigation links */
            margin: 0 10px;
            text-decoration: none;
            font-size: 18px;
        }

    </style>

</head>

<body>

    <nav>
        <a href="admin-view.php">Dashboard</a>
        <a href="view.php">Public View</a>
        <a href="#">Edit</a>
    </nav>
    <br></br><br>
  <body>

  <div class="container mt-5">

    <div class="row">
        <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <h4>Add Stock
                <a href="#" class="btn btn-danger float-end">Back</a>
</h4>
</div>
<div class="card-body">
    <form  method="POST" enctype="multipart/form-data" method='POST' name='addform'>
        <div class="md-3">
            <label for="">Count of Yarn</label>
            <input type="text" name="yarn" class="form-control" required>
        <br>
        </div>
        <div class="md-3">
        <label >Yarn Type</label>
        <input type="text" name="ytype"  class="form-control"  required>
        <br>
</div>
<div class="md-3">
<label >General Type</label>
<select class="form-select" aria-label="Default select example" name='gtype'>
  <option selected>Select the Type:</option>
  <option value="ctn">Cotton</option>
  <option value="pc">Polyster/Cotton</option>
  <option value="sf">Ring Spun</option>
  <option value="oe">Open end</option>
  
  

</select>
<br>
</div>
        <div class="md-3">
        <label >No of Bags</label>
        <input type="text" name="no-of-bags" class="form-control"  required>
        <br>
</div>
        <div class="md-3">
        <label for="price">Expected Weight:</label>
        <input type="text" name="weight" class="form-control" required>
        <br>
     <!--  <div class="md-3">
        <label for="phone">Phone:</label>
        <input type="tel" name="phone" id="phone" class="form-control"  required>
        <br>
</div>-->

        

        <div class="md-3">
        <input type="submit" value="submit" name="submit" class="form-control btn btn-success" >
    </form>
</div>
        </div>
        </div>
    </div>
  </div>
  </body>
</html>


<?php
// Adding stock's in the database using mysql
;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yarnstock";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



if(isset($_POST['submit']))
{
$cnyarn=$_POST['yarn'];
$ytype=$_POST['ytype'];
$gtype=$_POST['gtype'];
$nbag=$_POST['no-of-bags'];
$weight=$_POST['weight'];




            $insertQuery = "INSERT INTO stock (cnyarn,ytype,gtype,nbags,yweight) VALUES ('$cnyarn','$ytype','$gtype','$nbag',$weight)";

            if ($conn->query($insertQuery) === TRUE) {
                echo "<script> alert('Record inserted successfully');</script>";
            } else {
                echo "Error: " . $insertQuery . "<br>" . $conn->error;
            }

}

// Close connection
$conn->close();
?>



