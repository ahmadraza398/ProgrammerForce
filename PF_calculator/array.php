<?php
$school=[
    "ali" => [
    "students"=>['ahmad','ammar','ashfq','zain'],
    "employes"=>['techers','officeboy','guide',],
    "subject"=>['urdu',"english",'math','science'],
    'teacher'=>['SIR.ali','SIR.ahmad','SIR.umar']
     ],

    
     'ammarerror' => [
    
            "HR" => [ "aliya", "jannat", "iqra"],
    
            "accountants" => ["ali", "sam", ],
    
    
     ],
    
        'ahmad' => [
    
            "kitchen" => ["ashfq", "subhan"],
            "class"=> ['10','2','4','6']
    
        ]
    
];

// push method

echo "<pre>";
array_push($school,["office"=>['class','office','guideroom'],"office1"=>['class1','office1','guideroom1']]);
print_r($school);

// merge array 

// $new_array=array_merge()



foreach($school as $key=>$v){
    foreach($v as $key=>$v1){
        // echo $v1;
        foreach($v1 as $key=>$v2){
            echo $v2 . " ";
        }
        echo "<br>";
    }
    echo "<br>";
}

 ?>