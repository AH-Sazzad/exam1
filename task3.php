<?php 
session_start();
//  default Session value for avoid error undefined array key
$_SESSION["name"]="";
    $_SESSION["amount"]="";

if(isset($_POST["add_btn"])){
    $_SESSION["name"]=$_POST["user_name"];
    $_SESSION["amount"]=$_POST["amount"];
}
if(isset($_POST["add_btn"])){
    if(isset($_POST["delete_btn"])){
    session_destroy();
    
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session and Exception handling</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="main my-4">
            <div class="form">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="user_name" id="name" placeholder="Enter Your Name">
                    </div>
                    <div class="form-group">
                        <label for="amount">Budget:</label>
                        <input type="number" name="amount" id="amount" placeholder="Enter Your Budget">
                    </div>
                    <div class="btn_group d-flex m-5">
                        <div class="add_btn">
                        <label for="add_btn"></label>
                        <input type="submit" value="Add" class="btn-outline-primary" name="add_btn">
                    </div>
                    <div class="delete_btn">
                        <label for="delete_btn"></label>
                        <input type="submit" value="Delete" class="btn-outline-danger" name="delete_btn">
                    </div>
                    </div>
                </form>
            </div>
            <div class="output">
                <div class="massage">
                    <h1>
                        <?php 
                          if(isset($_POST["add_btn"])){
                            echo 'Welcome, ' . $_SESSION["name"] . '! Your budget is ' . $_SESSION["amount"] . '.';
                          }
                        ?>
                    </h1>
                </div>
            </div>
        </div>

    </div>
    <script src="bootstrap/bootstrap.bundle.js"></script>
</body>
</html>