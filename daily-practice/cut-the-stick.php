<?php declare(strict_types = 1);

function cutTheStick(array $arr) {
  $minimalValue = 0;
  $totalLength  = count($arr);
  $result       = [];

  while ($totalLength > 0) {
    $totalLength  = count($arr);

    if (!empty($arr)) {
      $minimalValue = min($arr);
    }

    if (!empty($totalLength)) {
      $result[] = $totalLength;
      echo "TOTAL ELEMENTS: " . $totalLength;
      echo PHP_EOL;
    }

    for ($i=0; $i < $totalLength; $i++) { 
      if ($arr[$i] <= 0) {
        unset($arr[$i]);
        continue;
      }

      $currentValue = $arr[$i] - $minimalValue;
      $arr[$i] = $currentValue;

      if ($currentValue <= 0)
        unset($arr[$i]);
    }

    $arr = array_values($arr);
  }

  
  print_r($result);die;
  return $result;
}

$arr = [1,2,3,4,3,3,2,1];
$arr = [5, 4, 4, 2, 2, 8];
$arr = [
  23,74,26,23,92,92,44,13,34,23,69,4,19,94,94,38,14,9,51,98,72,46,17,25,21,87,99,50,59,53,82,24,93,16,88,52,14,38,27,7,18,81,13,75,80,11,29,39,37,78,55,17,78,12,77,84,63,29,68,32,17,55,31,30,3,17,99,6,45,81,75,31,50,93,66,98,94,59,68,30,98,57,83,75,68,85,98,76,91,23,53,42,72,77
];

cutTheStick($arr);