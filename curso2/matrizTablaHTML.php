<?php
    $max = 20;
    $min = 0;
    
    $array = array(
                    array(rand($min, $max),rand($min, $max),rand($min, $max),rand($min, $max)),
                    array(rand($min, $max),rand($min, $max),rand($min, $max),rand($min, $max)),
                    array(rand($min, $max),rand($min, $max),rand($min, $max),rand($min, $max)),
                    array(rand($min, $max),rand($min, $max),rand($min, $max),rand($min, $max)),
                    array(rand($min, $max),rand($min, $max),rand($min, $max),rand($min, $max)),
                    array(rand($min, $max),rand($min, $max),rand($min, $max),rand($min, $max))
                );
    
    $tabla ="<table border = 1>";
    for($i = 0; $i<sizeof($array);$i++){
        $tabla .="<tr>";
        for($j = 0; $j < sizeof($array[$i]);$j++){
            $tabla .="<td>".$array[$i][$j]."</td>";
        }
        $tabla .="</tr>";
    }
    $tabla .="</table>";
    
    echo $tabla;
    
    echo "------------------------------------------------------------------------------------";
?>




<table border="1">
    <?php
        $array = array(
                    array(rand($min, $max),rand($min, $max),rand($min, $max),rand($min, $max)),
                    array(rand($min, $max),rand($min, $max),rand($min, $max),rand($min, $max)),
                    array(rand($min, $max),rand($min, $max),rand($min, $max),rand($min, $max)),
                    array(rand($min, $max),rand($min, $max),rand($min, $max),rand($min, $max)),
                    array(rand($min, $max),rand($min, $max),rand($min, $max),rand($min, $max)),
                    array(rand($min, $max),rand($min, $max),rand($min, $max),rand($min, $max))
                );
                
        for($i = 0; $i<sizeof($array);$i++){
            ?><tr>
            <?php
            for($j = 0; $j < sizeof($array[$i]);$j++){
            ?>
                <td><?php echo $array[$i][$j] ?></td>
            <?php }
            ?><tr>
        <?php
        }
     ?>
</table>