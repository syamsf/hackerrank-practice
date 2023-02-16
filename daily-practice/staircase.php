<?php declare(strict_types = 1);

function printStairs(int $n) {
  for ($i=0; $i < $n; $i++) { 
    for ($j=$i; $j < $n-1; $j++) { 
      echo " ";
    }

    for ($j=0; $j < $i+1; $j++) { 
      echo "#";
    }

    echo PHP_EOL;
  }
}

printStairs(6);