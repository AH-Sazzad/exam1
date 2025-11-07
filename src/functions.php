<?php 
// ============================
// task 01 function start from here
// ============================
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
// ====================================
// task 02 have no function for make
// =================================

// ==================================
// task 03 functions are here 
// ================================

function recursive_sum($recursive_array,$index=0){
    if($index>=count($recursive_array)){
        return 0;
    }
   return $recursive_array[$index] + recursive_sum($recursive_array, $index + 1);

}

// discount call back function

// function for discount
function ten_percent($price){
    return $price*.1;
}
function sessional_discount($price){
    $discount_amount=$_SESSION["sessional_discount"];
    $in_percent=$discount_amount/100;
    return $price*$in_percent;
}
function event_discount($price){
    $discount_amount=$_SESSION["event_discount"];
    $in_percent=$discount_amount/100;
    return $price*$in_percent;

}
// Calculate Discount and give result by using call back

function apply_discount($price,$discount_mood){
     switch ($discount_mood) {
            case '10% Discount':
                $discountedPrices = number_format(ten_percent($price), 2);
                break;
            case 'Sessional':
                $discountedPrices= number_format(sessional_discount($price), 2);
                break;
            case 'Event':
                $discountedPrices = number_format(event_discount($price), 2);
                break;
            default:
                $discountedPrices = number_format($price, 2);
        }
         return $discountedPrices;
    }
    
   



?>