<?php 
// total Expense

function total_expense(){
    if(isset($_POST['food'])){
        $food=$_POST['food'];
    }else{
        $food=0;
    }
    if(isset($_POST['transport'])){
        $transport=$_POST['transport'];
    }else{
        $transport=0;
    }
    if(isset($_POST['bill'])){
       $bill=$_POST['bill'];
    }else{
        $bill=0;
    }
    if(isset($_POST['tuition_fee'])){
         $tuition_fee=$_POST['tuition_fee'];
    }else{
        $tuition_fee=0;
    }
    if(isset($_POST["clothing"])){
        $clothing=$_POST['clothing'];
    }else{
        $clothing=0;
    }
    if(isset($_POST['rental'])){
        $rental=$_POST['rental'];
    }else{
        $rental=0;
    }
    
    
    
    

    $sum= $food+ $transport+ $bill+ $tuition_fee+ $clothing+ $rental;
   

    
    return $sum;
}

// function for average


function average($total) {
    
    $count = count($_POST);
//  add btn and radio btn remove from $_POST
    $final_count=$count-2;

    
    $divisor = $final_count ?: 1; 
   
    $average = $total / $divisor;

    return $average;
}
function check_budget($total) {
    if ($total > 1000) {
        return "Budget Exceeded";
    } else {
        return "Within Budget";
    }
}

?>