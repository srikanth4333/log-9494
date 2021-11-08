<?php
    function test($b)
    {
        $input= str_split($b);
         $r[count($input)]=array();
 
        for ($i = 0; $i < count($input); $i++) 
        {
            if ($input[$i] == " ") 
            {
               $r[$i] = " ";
            }
        }
            $j = count($r);
        for ($i = 0; $i < count($input); $i++) {
 
            if ($input[$i] != " ")
             {
                if ($r[$j] ==" ") 
                {
                    $j--;
                }
                $r[$j] = $input[$i];
                $j--;
            }
        }
        echo implode("",$r);
    
    }
    $a="i am srikanth";
    test($a);
    ?>