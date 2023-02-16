<?php declare(strict_types = 1);

function miniMaxSum($arr) {
  $listOfSum = [];
  $totalElement = count($arr);

  for ($i=0; $i < $totalElement; $i++) {
    $constraint1 = $arr[$i] >= 1 && $arr[$i] <= pow(10, 9);
    if (!$constraint1)
      continue;
    
    $tempValue = 0;
    
    for ($j=0; $j < $totalElement; $j++) { 
      if ($j == $i)
        continue;

      $tempValue += $arr[$j];
    }

    $listOfSum[] = $tempValue;
    $tempValue = 0;
  }
  
  $maxValue = max($listOfSum);
  $minValue = min($listOfSum);

  print("{$minValue} {$maxValue}");
}

$arr_temp = '1 2 3 4 5';
$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

miniMaxSum($arr);