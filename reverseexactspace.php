<?php
    function test($a)
    {
        $b=strrev($a);
        $x="";
        $j=0;
        //comparing positions of normal and reverse strings 
        for($i=0;$i<strlen($a);$i++)
        {
            //first check it a letter or space if letter than executes the conditions
            if($a[$i]!=" ")
            {
                //both strings not equal to space
                if($b[$j]!=" ")
                {
                     $x.=$b[$j];
                
                } 
                else
                {
                    $j++;
                $x.=$b[$j]; 
                } 
                $j++;
            }
            else
            {
                $x.=$a[$i];
            }
        }
        echo $x;
    }
    $b="i am srikanth";
    test($b);
    ?>