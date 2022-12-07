<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $name="my name is ahmad";
    $age = 22;
    $age1 = 22.333;
    $bollean=true;
    $nothing=null;
    $a=2;
    $b=4;
    var_dump($name, $age,$bollean,$nothing);//var_dump() data type batati hy
    // string Methods
    echo "<br>"."<h3>"."String Methods"."</h3>"."<br>";
    echo "String length".strlen($name)."<br>";
    echo "String Word Count ".str_word_count($name)."<br>";
    echo "String Reverse ".strrev($name)."<br>";
    echo "String Position ".strpos($name, 'ahmad')."<br>";
    echo "String replace ".str_replace("ahmad","ammar",$name)."<br>";
    echo "String lower ".strtolower($name)."<br>";
    echo "String lower ".strtoupper($name)."<br>";

//Number Method
    echo "<br>"."<h3>"."Number Method"."</h3>"."<br>";
    echo "Check Integer type ".var_dump(is_int($name))."<br>";// is_int() check interger type, yes or No
    echo "Check Integer type ".var_dump(is_int($age))."<br>";
    echo "Check float type ".var_dump(is_float($age))."<br>";
    echo "Check float type ".var_dump(is_float($age1))."<br>";
    echo "Check Not Number  ".var_dump(is_nan($age))."<br>";//is_nan() Check  Not Number  
    echo "Check Integer  ".var_dump(is_numeric($age))."<br>";// check integer
//Constant
     echo "<br>"."<h3>"."Constant"."</h3>"."<br>";
     define('Software',"welcome in programmer force"); // constant only one one writting 
     echo Software;
//Operators
     echo "<br>"."<h3>"."Operators"."</h3>"."<br>";
     echo"Add".($a+$b)."<br>";
     echo"sub".($a-$b)."<br>";
     echo"multi".($a*$b)."<br>";
     echo"divid".($a/$b)."<br>";
     echo"Modulus".($a%$b)."<br>";
     echo"Modulus".($b%$a)."<br>";
     echo"Exponent".($a**$b)."<br>";
//Assignment Operator
     echo "<br>"."<h3>"."Assignment Operators"."</h3>"."<br>";
     echo"Add".($a+=$b)."<br>";
     echo"sub".($a-=$b)."<br>";
     echo"multi".($a*=$b)."<br>";
     echo"divid".($a/=$b)."<br>";
     echo"Modulus".($a%=$b)."<br>";
     echo"Modulus".($b%=$a)."<br>";
//String Operator\
     echo "<br>"."<h3>"."String Operators"."</h3>"."<br>";
     $name.=" and i am very good student";
     echo $name. "<br>";
//conditional statement
echo "<br>"."<h3>"."conditional statement"."</h3>"."<br>";
$fullname="ahmed";
if ($fullname="ahmed"){
    echo "Ahmad name is ture";
}
elseif($fullname="ammar")
{
    echo "Ahmad name is false";
}
else
{
    echo"error define";
}
// Switch
echo "<br>"."<h3>"."Switch"."</h3>"."<br>";
$x = rand(0, 3);

            switch ($x) {

                case 0:

                    echo 'Switch statement value  is equal  = 0';

                    break;

                case 1:

                    echo 'Switch statement value  is equal  = 1';

                    break;

                case 2:

                    echo 'Switch statement value  is equal  = 2';

                    break;

                case 3:

                    echo 'Switch statement value  is equal  = 3';

                    break;
            }
        
    // Array
    echo "<br>"."<h3>"."Array"."</h3>"."<br>";
    $colors=array("red",20,"blue",12);
     echo $colors[0]."<br>";
    // echo $colors[1]."<br>";
    // echo $colors[2]."<br>";
    // echo $colors[3]."<br>";
    echo"<pre>";
    print_r($colors);
    echo"</pre>";
    ?>
  
    
</body>
</html>