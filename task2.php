<?php 
// Array and file handling

// 1.Create an array with categories and expenses.
$expenses=[
    "food"=>300,
    "travel"=>400,
    "rental"=>5000,
    "bill"=>750,
    "tuition_fee"=>5200,
    "clothing"=>2000,
];
// Initial Expenses
echo "<h3>1. Initial Expenses: </h3>";
echo"<pre>";
echo print_r($expenses);
echo"</pre>";

// 2. Using array function array push, array pop,....
// array push
array_push($expenses,500);
echo "<h3>2. After array_push:</h3>";
print_r($expenses);

// array pop

array_pop($expenses);
echo "<h3>2 After array_pop:</h3>";
print_r($expenses);

// new array for array_marge
$more_expenses=[
    "internet_bill"=>500,
    "gift"=>1000
];

// now marge the ner array with expenses array
$marge_array=array_merge($expenses,$more_expenses);
echo "<h3> After array_merge:</h3>";
print_r($marge_array);

// 4. string to array and back to string
// explode
$string="Hi I am Asmaul hasan sazzad";
$string_to_array=explode(" ","$string");
echo "<h3> After Explode:</h3>";
print_r($string_to_array);
// implode
$backToString = implode(" ", $string_to_array);
echo "<h3>Array to String :</h3>";
echo $backToString;

// string Function 
// upper

$string_low="hi i am asamaul hasan sazzad";
$string_to_upper=strtoupper($string_low);
echo"<h1>Strtoupper</h1>";
echo"$string_to_upper";
// lower
$string_up="HI I AM ASMAUL HASAN SAZZAD";
$string_to_lower=strtolower($string_up);
echo"<h1>strtolower</h1>";
echo"$string_to_lower";
// strlen
$strlen=strlen($string_low);
echo"<h1>strlen</h1>";
echo"$strlen";
// substr
$substr=substr($string_low,0,8);
echo"<h1>Substring (first 8)</h1>";
echo"$substr <br>";
// str_replace
echo"<h1>replace </h1>";
echo  str_replace("sazzad", "kaka", $string_low) . "<br>";
  
// file Function
// file write 
$file = "expenses.txt";


$handle = fopen($file, "w");
    $expenses_file_content = "2025-11-06 | Education | $50 | Udvas tuition fee <br>";
    $expenses_file_content .= "2025-11-06 | Food | $10 | Breakfast <br>";
    $expenses_file_content .= "2025-11-06 | Transport | $5 | Bus fare <br>";
fwrite($handle,$expenses_file_content);
fclose($handle);
// file append
$handle_append=fopen($file,"a");
$new_expenses_file_content=("2025-11-06 | Internet Bill | $70 |WIFI <br>");
fwrite($handle_append,$new_expenses_file_content);
fclose($handle_append);
// file read
$handle_read=fopen($file,"r");
$read_expenses=fread($handle_read,filesize($file));
fclose($handle_read);
// Now Echo Read Expenses

echo "<h3>$read_expenses</h3>";



?>
