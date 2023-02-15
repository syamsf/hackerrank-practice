<?php declare(strict_types = 1);

function findSum(array $numbers, array $queries) {
  $totalData   = count($numbers);
  $totalQuery  = count(array_keys($queries));
  $constraint1 = $totalData >= 1 && $totalData <= pow(10, 5);
  $constraint2 = $totalQuery >= 1 && $totalQuery <= pow(10, 5);

  if (!$constraint1)
    throw new \Exception("Constraint1 error");

  if (!$constraint2) {
    throw new \Exception("Contraint2 error");
  }

  $result = [];
  $requiredQueryParam = 3;
  $zeroCounter = 0;

  for ($i=0; $i < $totalQuery; $i++) {
    if (count($queries[$i]) != $requiredQueryParam) {
      $message = json_encode($queries[$i]);
      $length  = count($totalQuery[$i]);
      
      throw new \Exception("query_params for {$message} has {$length} param; required is 3 param");
    }

    $startIndex = $queries[$i][0];
    $endIndex   = $queries[$i][1];
    $multiplier = $queries[$i][2];

    $constraintQuery1 = ($startIndex >= 1) && ($endIndex >= $startIndex);
    if (!$constraintQuery1)
      throw new \Exception("constraint_query1 error");

    $constraintQuery2 = ($multiplier >= pow(-10, 9)) && ($multiplier <= pow(10, 9));
    if (!$constraintQuery2)
      throw new \Exception("constraint_query2 error");

    // number iteration
    for ($j=$startIndex; $j <= $endIndex; $j++) { 
      $constraintNumber1 = ($numbers[$j] >= pow(-10, 9)) && ($numbers[$j] <= pow(10, 9));
      if (!$constraintNumber1)
        throw new \Exception("number is out of bound");

      if ($numbers[$j] == 0)
        $zeroCounter++;

      if (!isset($result[$i])) {
        $result[$i] = $numbers[$j];
        continue;
      }

      $result[$i] += $numbers[$j];
    }

    $result[$i]  = $result[$i] + ($zeroCounter * $multiplier);
    $zeroCounter = 0; 
  }

  print_r($result);die;
}

$numbersDataSource = [
  2,
  -5,
  0,
  2,
  3,
];
$queriesDataSource = [
  [2, 2, 20],
  [1, 2, 10]
];

try {
  findSum($numbersDataSource, $queriesDataSource);
} catch (\Exception $e) {
  print_r($e->getMessage());die;
}