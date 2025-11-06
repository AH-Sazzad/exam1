<?php 
// setcookie();
include_once ( __DIR__."/src/functions.php");

define("APP_Name","Expense Calculator");
define("Author","Asmaul Hasan Sazzad");

//total Expense
    
    // default Currency
   
    $currency=$_POST['currency']??'USD';
    $total=total_expense(
        // currency: $currency
    );
    $total_format=number_format($total,2);

// average Expense

    $average=average($total);
    $average_format=number_format($average,2);
    












?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <title>Expense Calculator</title>
</head>
<body>
    <div class="container">
        <div class="main">
            <div class="app_name d-flex justify-content-center">
               <h1><?php echo APP_Name;?></h1>
            </div>
            <div class="expense border border-danger p-3 justify-content-center  " >
                <div class="d-flex justify-content-center flex-column ">
                    <h2>Add Your Expense</h2>
                    <p>No Expense in any filed use 00</p>
                    <hr>
                </div>
               <form action="" method="post" class="d-flex flex-column justify-content-center">   
                <div class="form-row">
                    <div class="form-group col-md-5 px-3">
                            <h3>Select Currency:</h3>
                            <input type="radio" id="usd" name="currency" value="USD" checked>
                            <label for="usd">USD</label>

                            <input type="radio" id="eur" name="currency" value="EUR">
                            <label for="eur">EUR</label>
                            <input type="radio" id="bdt" name="currency" value="BDT">
                            <label for="bdt">BDT</label>
                        </div>
                    <div class="d-flex">
                        <div class="form-group col-md-5 px-3">
                            <label for="food">Food</label>
                            <input type="number" class="form-control" name="food" id="food" placeholder="Food"required>
                        </div>
                        <div class="form-group col-md-5 px-3">
                            <label for="transport">Transport</label>
                            <input type="number" name="transport" class="form-control" id="transport" placeholder="Transport" required>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="form-group col-md-5 px-3">
                            <label for="bill">Bill</label>
                            <input type="number" name="bill" class="form-control" id="bill" placeholder="Bill">
                        </div>
                        <div class="form-group col-md-5 px-3">
                            <label for="tuition_fee">Tuition fee</label>
                            <input type="number" class="form-control" name="tuition_fee" id="tuition_fee" placeholder="Tuition fee"required>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="form-group col-md-5 px-3">
                            <label for="clothing">Clothing</label>
                            <input type="number" name="clothing" class="form-control" id="clothing" placeholder="Clothing"required>
                        </div>
                        <div class="form-group col-md-5 px-3">
                            <label for="">Rental</label>
                            <input type="number" class="form-control" name="rental" id="rental" placeholder="Rental"required>
                        </div>
                    </div>
                    <div class="col-md-12 border-0">
                        <input type="submit" name="add_expense_btn" class="btn btn-outline-success py-1 px-5 rounded fs-3 my-3 mx-3" value="Add">
                    </div>
                    

                </div>
               </form>
            </div>
            <div class="result my-4">
                <div class=" d-flex flex-column justify-content-center align-items-center ">
                    <h2>total Expense: <?php echo $total_format." ".$_POST['currency'];?></h2>
                    <h2>Average Expense: <?php echo $average_format." ".$_POST['currency'];?></h2>
                </div>
                <div class=" align-items-center d-flex flex-column justify-content-center">
                    <div>
                        <?php 
                    if ($total > 1000) {
                        echo "<p><strong>Budget Exceeded</strong></p>";
                    } else {
                        echo "<p><strong>Within Budget</strong></p>";
                    }
                    ?>
                    </div>
                    <div>
                        <?php 
                        // Ternary operator
                            $expenseMessage = ($total > 1000) ? "Over Budget" : "Budget Okay";
                            echo "<p>Ternary Check: $expenseMessage</p>";
                        ?>
                    </div>
                    <div>
                        <?php 
                        // Switch case
                            switch (true) {
                                case ($total < 500):
                                    $rangeMessage = "Low Expense";
                                    break;
                                case ($total >= 500 && $total <= 1000):
                                    $rangeMessage = "Moderate Expense";
                                    break;
                                default:
                                    $rangeMessage = "High Expense";
                            }
                            echo "<p>Switch Case Result: $rangeMessage</p>";
                        ?>
                    </div>
                    <div>
                        <?php 
                        // Check Budget
                        echo "Budget Function: ";
                        echo check_budget($total);
                        ?>
                    </div>
                </div>
            </div>
            <div class="author d-flex justify-content-center my-3">
                <h4><?php echo Author;?></h4>
            </div>
           
        </div>
        
    </div>
    <script src="bootstrap/bootstrap.bundle.js"></script>
</body>
</html>