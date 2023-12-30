<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="login.css">
</head>
<style>
    body {
        background-image: url('images/land1.jpg');
    
        
        background-size: cover;
        /* Adjust how the image is displayed */
        background-repeat: no-repeat;
        /* Prevent image from repeating */
        display: flex;
        justify-content: center;
        align-items: center;
        /* Center the content horizontally and vertically */
        min-height: 100vh;
        /* Ensure the content takes up the full viewport height */
        margin: 0;
        /* Remove default margin */
    }

    .container {
        width: 100%;
        border-radius: 20px;
        opacity: 90%;

    }
</style>

<body>
    <div class="container">
        <h2>Login Form</h2>
        <form method="post" name="myform" target="_self">
            <label for="username">Username:</label>
            <input type="text" id="username" name="user" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="pass" required>




            <button type="submit" name="submit">Login</button>
        </form>
        
    </div>
</body>

</html>

<style>

body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 400px;
    margin: 50px auto;
    background-color: #ffffff;
    
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 5px;
}

input {
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

button {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

a {
    text-decoration: none;
    color: #007bff;
}

a:hover {
    text-decoration: underline;
}

</style>

<?php
session_start();
if(isset($_POST['submit'])){

    $name=$_POST['user'];
    $pass=$_POST['pass'];
    if($name=='Admin' && $pass=='test'){
        header('Location: admin-view.php');
        $_SESSION['val']="PASS";


    }
    else{
        echo '<script>alert("Invalid username and password");</script>';
    }
}
?>