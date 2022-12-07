      <?php

  //Question no 1
  echo " QUESTION NO 1:";
      echo"<br>";
   
    $buidings = array(25, 19, 23, 45, 18, 26, 24, 16);   //METHOD 2
          $lengh= count($buidings);                       // length in it
          echo"Given Array :";                           //Given array print
          for($i=0;$i<$lengh;$i++){                      // loop
            echo $buidings[$i]." ";   
            
          }
          echo"<br>";
          echo"Sorted Array  :";
          rsort($buidings);                              //Arrangnment sorted array
          for($i=0;$i<$lengh;$i++){                      // loop
            echo $buidings[$i]." "; 
          }
          echo"<br>";
          echo"TOP 3 Buildings  :";              
             for($i=0;$i<3;$i++){                          // loop
            echo $buidings[$i];                            //print                         
          }
          echo"<br>"; 

        
          echo " QUESTION NO 2:";                          //Question no 2
            echo"<br>"; 
           function question2($num){                      //function

            for($i=1;$i<=$num;$i++){                     //loop
         
                 for($j=1;$j<=6;$j++){
         
                     echo $j*$i ."  ";
         
                 }
                         
             echo "<br>";              // SPACE
         
             }
         
         }
         
         echo question2(5);              

          

    ?>


    