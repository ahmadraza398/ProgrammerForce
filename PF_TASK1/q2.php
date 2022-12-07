<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>QUESTION NO2</h1>
    
<?php

function question2($n){      //function

   for($i=1;$i<=$n;$i++){    //loop

        for($j=1;$j<=6;$j++){

            echo $j*$i ."  ";

        }
                
    echo "<br>";              // SPACE

    }

}

question2(10);               //Function Call
?>
</body>
</html>
