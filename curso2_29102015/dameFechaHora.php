<?php
  echo "Ahora son: ".date('d/m/Y H:i:s')."<br />";
  
 echo "El actual tiene: <b>".date("t",mktime(0,0,0,date('m'),1,date('y')))."</b> dias";

?>