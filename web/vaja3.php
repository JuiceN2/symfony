<html>
  <head>
  <style>
  td {
  width:30px;
  height:30px;
  text-align:center;
  border:1px solid;
  }

  table{
    border-spacing:0px;
    border:1px solid;

  }

.liha{
background-color:red;
}

.soda{
background-color:blue
}

.enaka{
background-color:green;
}
  </style>
  </head>
<body>
<?php

  $n=rand(2,8);
  echo '<table>';
echo '<caption>Tabela velikosti n x n</caption>';
for($i=0;$i<$n;$i++){
  echo '<tr>';
  for($j=0;$j<$n;$j++){


    echo '<td';

    if($i>$j) {
      $element=$n;
      echo ' class="soda"';
    }
    else if($i<$j){
      $element=0;
      echo ' class="liha"';
    }
    else{
      $element='*';
      echo ' class="enaka"';
    }
    echo '>'.$element.'</td>';


  }
  echo '</tr>';
}
  echo '</table>';

?>

  </body>
  </html>
