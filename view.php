
<!doctype html>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Stocks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5; /* Light background color */
            margin: 0;
            padding: 20px;
        }


        nav a {
            color: #fff; /* White color for the navigation links */
            margin: 0 10px;
            text-decoration: none;
            font-size: 18px;
        }

        form {
            text-align: center;
            margin-bottom: 20px;
        }

        .button {
            padding: 10px 20px;
            font-size: 16px;
            margin: 0 10px;
            cursor: pointer;
            background-color: #009933; /* Dark gray color for buttons */
            color: #fff;
            border: none;
            border-radius: 4px;
        }

        .button:hover {
            background-color: #464646; /* Darker gray on hover */
        }

        table {
            border-collapse: collapse;
            width: 70%;
            margin: 20px auto;
        }

        th {
            font-weight: bold;
            font-size: 18px;
            background-color: #333; /* Dark background color for table header */
            color: #fff;
            padding: 15px;
            text-align: center;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: left;
            font-size: 16px;
        }

        tr:nth-child(even) {
            background-color: #ddd; /* Light gray background for even rows */
        }

        tr:hover {
            background-color: #ccc; /* Slightly darker gray on hover */
        }
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

    </style>

</head>

<body>

    <nav>
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
    </nav>
    <br></br><br>
</head>
    <form name='myform' method='post'>

    <form method="post"> 
        <input type="submit" name="Cotton"
                class="button" value="Cotton" /> 
          
        <input type="submit" name="Polyster/Cotton"
                class="button" value="Polyster/Cotton" /> 
         <input type="submit" name="OpenEnd"
                class="button" value="Open End" /> 
          
        <input type="submit" name="RingSpun"
                class="button" value="Ring Spun" /> 
        <input type="submit" name="all"
                class="button" value="All" /> 
    </form> 
    <table border='1px'>
                    <thead>
                        <tr>
                            <th>S.NO</th>
                            <th>Count of Yarn</th>
                            <th>Yarn Type</th>
                            <th>General Type</th>
                            <th>No of Bags</th>
                            <th>Expected Weight</th>
                        
            
                        </tr>
                    </thead>


<html>

<?php

$wh="";
if(isset($_POST['Cotton'])){
$wh = "ctn";

}elseif(isset($_POST['Polyster/Cotton'])){
    $wh = "pc";
    
    }
    elseif(isset($_POST['OpenEnd'])){
        $wh = "oe";
        
        }
        elseif(isset($_POST['RingSpun'])){
            $wh = "sf";
            
            }
            elseif(isset($_POST['all'])){
                $wh = "";
            }

           
            
        
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yarnstock";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($wh != ""){
    $sql = "SELECT * FROM stock WHERE gtype = '$wh' ";
}elseif($wh =="" ){
    $sql = "SELECT * FROM stock";
}



$result = $conn->query($sql);
$sn=1;
$weight=0;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$sn."</td>";

        $sn+=1;
        $id=$row['id'];
        echo "<td>".$row['cnyarn']."</td>";
        echo "<td>".$row['ytype']."</td>";
        echo "<td>".$row['gtype']."</td>";
        echo "<td>".$row['nbags']."</td>";
        echo "<td>".$row['yweight']."</td>";
        
        $w=$row['yweight'];
        $weight+=$w;

        echo "</tr>";
    }
    echo "<tr>";
    echo "<td colspan='3'><td>";
    echo "<td><b>Total Weight</b></td>";
    echo "<td><b>$weight<b></td>";
    echo "<tr>";
} else {
    echo "<style>td{color:red; text-align:center;font-size:15px;}</style>";
    echo "<tr><td colspan='6'>No data found</td></tr>";
}

echo "</table>";
$conn->close();
?>