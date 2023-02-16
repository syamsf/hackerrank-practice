<?php declare(strict_types = 1);

function hourglassSum($arr) {
  $totalElement = count($arr);
  $sumResult = [];

  for ($i=0; $i < $totalElement; $i++) {
    $totalSubElement = count($arr[$i]);

    for ($j=0; $j < $totalSubElement; $j++) {
      if ($i >= $totalSubElement || $i+1 >= $totalSubElement || $i+2 >= $totalSubElement)
        continue;
      
      if ($j >= $totalSubElement || $j+1 >= $totalSubElement || $j+2 >= $totalSubElement)
        continue;

      $sumResult[] = ($arr[$i][$j]) + ($arr[$i][$j+1]) + ($arr[$i][$j+2])
        + ($arr[$i+1][$j+1]) + ($arr[$i+2][$j]) + ($arr[$i+2][$j+1]) + ($arr[$i+2][$j+2]);
    }
  }

  $maxValue = max($sumResult);
  print_r($maxValue);die;
}

$arr = [
  [1, 1, 1, 0, 0, 0],
  [0, 1, 0, 0, 0, 0],
  [1, 1, 1, 0, 0, 0],
  [0, 0, 2, 4, 4, 0],
  [0, 0, 0, 2, 0, 0],
  [0, 0, 1, 2, 4, 0]
];

hourglassSum($arr);