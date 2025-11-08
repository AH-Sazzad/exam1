<?php 
session_start();

include_once ( __DIR__."/src/functions.php");
// for session 
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
// for recursive function
 $int_of_recursive_string=[];
if(isset($_POST["add_recursive"])){
    $recursive_string=trim($_POST['recursive_string']);
    $array_of_recursive_string=preg_split("/[\s,.| ]+/", $recursive_string);
    // this is string but i need int for sum 
    $int_of_recursive_string=array_map("intval",$array_of_recursive_string);


}

// for discount function
 $int_of_add_prices=[];
if(isset($_POST["add_prices"])){
    $add_prices=trim($_POST['all_prices']);
    $array_of_add_prices=preg_split("/[\s,.| ]+/", $add_prices);
    // this is string but i need int for sum 
    $int_of_add_prices=array_map("intval",$array_of_add_prices);


}
// for total
$total_price=recursive_sum($int_of_add_prices);
 if (isset($_POST['discount_amount'])) {
        // Store sessional discount in session
        if (isset($_POST['sessional_discount']) && !empty($_POST['sessional_discount'])) {
            $_SESSION['sessional_discount'] = floatval($_POST['sessional_discount']);
        }
        
        // Store event discount in session
        if (isset($_POST['event_discount']) && !empty($_POST['event_discount'])) {
            $_SESSION['event_discount'] = floatval($_POST['event_discount']);
        }}
        // discount mode
            $selected_discount = $_POST['discount'] ?? '10% Discount';
            // call function

        $total_discount=apply_discount($total_price,$selected_discount);
        $total_after_discount=$total_price-$total_discount;

        // Divide tow number
         
       if(isset($_POST["divide"])){
        if(isset($_POST["number"]) && !empty($_POST["number"])){
            $_SESSION['number']=floatval($_POST["number"]);
        }
        if(isset($_POST["divider"]) && !empty($_POST["divider"])){
            $_SESSION['divider']=floatval($_POST["divider"]);
        }
        $division_result=divide_tow_number( $_SESSION['number'],$_SESSION['divider']);
        $division_result_format=number_format($division_result,2);
       }

    //    Use function for division
    



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
            <div class="form">
                <form action="" method="POST">
                    <div class="form-group col-md-8">
                        <label for="recursive_array">Recursive array Input:</label>
                        <input type="text" name="recursive_string" placeholder="Enter Your Numbers" id="recursive_array" class="w-75">
                    </div>
                    <div class="btn_recursive">
                        <input type="submit" name="add_recursive"  value="Add Numbers" class="btn btn-outline-warning">
                    </div>
                </form>

            </div>
            <div class="recursive_sum">
                <h1>Sum of Array: <?php echo recursive_sum($int_of_recursive_string);?></h1>
            </div>
            <div class="discount">
                <form action="" method="post" class="d-flex flex-column justify-content-center">   
                <div class="form-row">
                    <div class="form-group col-md-5 px-3">
                            <h3>Select Discount:</h3>
                            <input type="radio" id="ten_percent" name="discount" value="10% Discount" checked>
                            <label for="ten_percent">10% Discount</label>

                            <input type="radio" id="sessional" name="discount" value="Sessional">
                            <label for="sessional">Sessional</label>
                            <input type="radio" id="event" name="discount" value="Event">
                            <label for="event">Event</label>
                        </div>
                    <div class="d-flex">
                        <div class="form-group col-md-4 px-3">
                            <label for="prices">Enter All Prices</label>
                            <input type="text" class="form-control" name="all_prices" id="prices" placeholder="All Prices">
                        </div>
                        <div class="form-group col-md-4 px-3">
                            <label for="sessional_discount_amount">Enter Your Sessional Discount Amount</label>
                            <input type="number" name="sessional_discount" class="form-control" id="transport" placeholder="Example:25 " >
                        </div>
                        <div class="form-group col-md-4 px-3">
                            <label for="event_discount_amount">Enter Your Event Discount Amount</label>
                            <input type="number" name="event_discount" class="form-control" id="transport" placeholder="Example:25" >
                        </div>
                    </div>
                    
                    </div>
                    <div class="d-flex">
                        <div class="col-md-6 border-0">
                        <input type="submit" name="add_prices" class="btn btn-outline-success py-1 px-5 rounded fs-3 my-3 mx-3" value="Add Prices">
                    </div>
                        <div class="col-md-6 border-0">
                        <input type="submit" name="discount_amount" class="btn btn-outline-success py-1 px-5 rounded fs-3 my-3 mx-3" value="Add Discount Amount">
                    </div>
                    
                    </div>
                    

                </div>
               </form>
                <div class="total_discount">
                    <h1> Total Price: <?php echo $total_price;?></h1>
                    <h1>Total Discount:<?php echo $total_discount;?> </h1>
                    <h1>Total After Discount:<?php echo $total_after_discount;?> </h1>
                </div>
                <div class="error form">
                    <hr>
                    <h1>Divide Tow Numbers</h1>
                    <form action="" method="post">
                        <div class="number form-group my-2">
                            <input type="number" name="number" id="number" placeholder="Enter Your Number" required>
                        </div>
                        <div class="divider form-group my-1">
                            <input type="number" name="divider" id="divider" placeholder="Enter Your divider" required>
                        </div>
                        <div class="divide_answer_btn m-1">
                            <input type="submit" value="Divide" name="divide" class="btn btn-outline-info">
                        </div>
                    </form>
                    <div class="result_division">
                        <hr>
                        <h2><?php 
                        if(isset($_POST['divide'])){
                            echo "Answer: {$_SESSION['number']}/{$_SESSION['divider']}= $division_result_format";
                        }
                        ?> </h2>
                    </div>
                </div>
            </div>
        </div>

    
    <script src="bootstrap/bootstrap.bundle.js"></script>
</body>
</html>