<?php
    /* 
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */

    function showShrimp2($choice)               // to choose if using during action or hw6
    {
		$mv = filter_input(INPUT_GET, 'mv');
        $p = filter_input(INPUT_GET, "p");  // to see if action 4 was to repeat
        $c = filter_input(INPUT_GET, "c1");
        $m = filter_input(INPUT_GET, "m1");
        $count = 0;
        $count2 = 0;
        if ($p != 0 and $choice == false){      // action is true, hw7 is false
            if(isset($_SESSION["prev2"]))
                $sb3 = $_SESSION["prev2"];
            else
                $sb3 = $_SESSION['bSecond'];
        }
        elseif(isset($_SESSION["sb3"]))
            $sb3 = $_SESSION["sb3"];
        else{
            $sb3 = $_SESSION['bSecond'];
            
        }
        if($choice != false){
            $_SESSION["prev2"] = $sb3;      // save prev array with action tabs
        }
        else{
            // gamelog update goes here
            include_once 'gameLog.php';      // include gamelog file
            writeArrayPosRight($c);         // write position of shrimp for right board
        }
        if (is_numeric($c))
                $sb3[$c] = 'p';
        elseif (is_numeric($mv))
            $sb3[$mv] = '';
        elseif (is_numeric($m))
                $sb3[$m] = 'p';
        foreach ($sb3 as $el) 
        {
                if ($count == 7)
                {
                        $count = 0;
                        $count2++;
                }
                include_once 'shrimpBrdOne.php';
                echo "<span style='left:" . left($count) . "; top:" . top($count2). "; width:0px; height: 0px; position:absolute; z-index:502;'>". placeS($el) ."</span>" . kEOL;
                $count++;
        }
        $_SESSION["sb3"] = $sb3;

    }
?>
