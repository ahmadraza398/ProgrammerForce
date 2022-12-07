<?php
class Calculator{                      //class
    public $number1;                       //variable1
    public $number2;                       //variable2
    public $operator;                   //variable3
    //constructor  and parameter 2 integer and 1 operator
    public function __construct($number1, $number2, $operator)
    {
        $this->number1 = $number1;
        $this->number2 = $number2;
        $this->operator = $operator;
    }
    public function calculator_result()        // calculate function 
    {
        switch ($this->operator) {
            case '+':
                echo $this->number1 + $this->number2;
            break;
            case '-':
                echo $this->number1 - $this->number2;
            break;
            case '*':
                echo $this->number1 * $this->number2;
            break;
            case '/':
                if($this->number2==0){
                    echo -1;
                }
                else{
                    echo $this->number1 / $this->number2;
                }
            break;
        default:
            echo 0;
        }
            
    }
}
$calculate=new calculator(5,25,'/');
$calculate->calculator_result();

?>