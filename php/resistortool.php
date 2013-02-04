<?php
   
   $gain = isset($_POST['gain']) ? $_POST['gain'] : 0;  

   function cmp($a, $b) {
      if ($a[0] == $b[0]) {
         if ($a[1] == $b[1]) {
            return 0;
         }
         return ($a[1] < $b[1]) ? -1 : 1;
      }
      return ($a[0] < $b[0]) ? -1 : 1;
   }
   
   function d_cmp($a, $b) {
      $gain = isset($_POST['gain']) ? $_POST['gain'] : 0; 
      return dist_cmp($a[0], $b[0], $gain);
   }
   
   function dist_cmp($a, $b, $loc){   
      $d_a = abs($a - $loc);  
      $d_b = abs($b - $loc);
      if($d_a == $d_b) return 0;
      return ($d_a < $d_b) ? -1 : 1;   
   }

   if($gain != 0){
   
      $e192 = array(1,1.01,1.02,1.04,1.05,1.06,1.07,1.09,1.1,1.11,1.13,1.14,1.15,1.17,1.18,1.2,1.21,1.23,1.24,1.26,1.27,1.29,1.3,1.32,1.33,1.35,1.37,1.38,1.4,1.42,1.43,1.45,1.47,1.49,1.5,1.52,1.54,1.56,1.58,1.6,1.62,1.64,1.65,1.67,1.69,1.72,1.74,1.76,1.78,1.8,1.82,1.84,1.87,1.89,1.91,1.93,1.96,1.98,2,2.03,2.05,2.08,2.1,2.13,2.15,2.18,2.21,2.23,2.26,2.29,2.32,2.34,2.37,2.4,2.43,2.46,2.49,2.52,2.55,2.58,2.61,2.64,2.67,2.71,2.74,2.77,2.8,2.84,2.87,2.91,2.94,2.98,3.01,3.05,3.09,3.12,3.16,3.2,3.24,3.28,3.32,3.36,3.4,3.44,3.48,3.52,3.57,3.61,3.65,3.7,3.74,3.79,3.83,3.88,3.92,3.97,4.02,4.07,4.12,4.17,4.22,4.27,4.32,4.37,4.42,4.48,4.53,4.59,4.64,4.7,4.75,4.81,4.87,4.93,4.99,5.05,5.11,5.17,5.23,5.3,5.36,5.42,5.49,5.56,5.62,5.69,5.76,5.83,5.9,5.97,6.04,6.12,6.19,6.26,6.34,6.42,6.49,6.57,6.65,6.73,6.81,6.9,6.98,7.06,7.15,7.23,7.32,7.41,7.5,7.59,7.68,7.77,7.87,7.96,8.06,8.16,8.25,8.35,8.45,8.56,8.66,8.76,8.87,8.98,9.09,9.19,9.31,9.42,9.53,9.65,9.76,9.88);
      $e096 = array(1,1.02,1.05,1.07,1.1,1.13,1.15,1.18,1.21,1.24,1.27,1.3,1.33,1.37,1.4,1.43,1.47,1.5,1.54,1.58,1.62,1.65,1.69,1.74,1.78,1.82,1.87,1.91,1.96,2,2.05,2.1,2.15,2.21,2.26,2.32,2.37,2.43,2.49,2.55,2.61,2.67,2.74,2.8,2.87,2.94,3.01,3.09,3.16,3.24,3.32,3.4,3.48,3.57,3.65,3.74,3.83,3.92,4.02,4.12,4.22,4.32,4.42,4.53,4.64,4.75,4.87,4.99,5.11,5.23,5.36,5.49,5.62,5.76,5.9,6.04,6.19,6.34,6.49,6.65,6.81,6.98,7.15,7.32,7.5,7.68,7.87,8.06,8.25,8.45,8.66,8.87,9.09,9.31,9.53,9.76);
      $e048 = array(1,1.05,1.1,1.15,1.21,1.27,1.33,1.4,1.47,1.54,1.62,1.69,1.78,1.87,1.96,2.05,2.15,2.26,2.37,2.49,2.61,2.74,2.87,3.01,3.16,3.32,3.48,3.65,3.83,4.02,4.22,4.42,4.64,4.87,5.11,5.36,5.62,5.9,6.19,6.49,6.81,7.15,7.5,7.87,8.25,8.66,9.09,9.53);
      $e024 = array(1,1.1,1.2,1.3,1.5,1.6,1.8,2,2.2,2.4,2.7,3,3.3,3.6,3.9,4.3,4.7,5.1,5.6,6.2,6.8,7.5,8.2,9.1);
      $e012 = array(1,1.2,1.5,1.8,2.2,2.7,3.3,3.9,4.7,5.6,6.8,8.2);
      $e006 = array(1,1.5,2.2,3.3,4.7,6.8);

      $arr  = array();
      $good = array();
      $pow = 0; // keeps track of divisions so the result can be multiplied at the end
   
      while($gain >= 10) {
         $gain /= 10;
         $pow++;
      }
      $thresh = $_POST['thresh']/100*$gain;
      $tolerance = $_POST['tol'];
      $r1_low = $_POST['r1l'];
      $r1_high = $_POST['r1h'];
      switch ($tolerance){
         case 'E6':   $arr = $e006; break;
         case 'E12':  $arr = $e012; break;
         case 'E24':  $arr = $e024; break;
         case 'E48':  $arr = $e048; break;
         case 'E96':  $arr = $e096; break;
         case 'E192': $arr = $e192; break;
      }                  
      
      foreach ($arr as $i => $value_i){
         foreach ($arr as $j => $value_j) {
            if(abs($value_i/$value_j-$gain) < $thresh) {
               $r1 = $value_i*pow(10, $pow);
               $r2 = $value_j;
               $real_gain = $r1/$r2;
               array_push($good, array($real_gain, $r1, $r2));
            }
         }
      }
      if(count($good) > 0) {
         usort($good, "d_cmp");
         echo("<table class='bottomBorder'>    
                  <colgroup>
                     <col span='1' style='width: 120px;'>
                     <col span='1' style='width: 120px;'>
                     <col span='1' style='width: 80px;'>
                     <col span='1' style='width: 80px;'>
                  </colgroup>
                  <tr>
                     <th style='text-align: left'>Gain</th>
                     <th style='text-align: left'>&Delta;</th>
                     <th style='text-align: left'>R1</th>
                     <th style='text-align: left'>R2</th>
                  </tr>");          
         foreach($good as $index => $ans){
            if($r1_high >= $ans[1] && $r1_low <= $ans[1]){
               echo("<tr><td>".round($ans[0],4)."</td><td>".round(abs($gain*pow(10, $pow) - $ans[0]),4)."</td><td>".$ans[1]."</td><td>".$ans[2]."</td></tr>");
            }
         }
         
         echo("</table>");
      } else {
         echo("<br><br>No combinations meet threshold with ".$tolerance." resistors");
      }
   }
?>