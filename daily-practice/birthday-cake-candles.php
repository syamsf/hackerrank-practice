<?php declare(strict_types = 1);

function birthdayCakeCandles(array $candles) {
  $totalCandles = count($candles);
  if (!($totalCandles >= 1 && $totalCandles <= pow(10, 5)))
    throw new \Exception("total_candles is out of bonds");

  $candlesCounter = [];

  for ($i=0; $i < $totalCandles; $i++) {
    $constraint1 = $candles[$i] >= 1 && $candles[$i] <= pow(10, 7);  
    if (!$constraint1)
      throw new \Exception("contraint1 is error");
    
    if (!isset($candlesCounter[$candles[$i]])) {
      $candlesCounter[$candles[$i]] = 1;
      continue;
    }

    $candlesCounter[$candles[$i]] += 1;
  }

  $maximalValueOfCandles = max(array_values($candlesCounter));
  print_r($maximalValueOfCandles);die;
}

$candles_temp = '3 2 1 3';
$candles = array_map('intval', preg_split('/ /', $candles_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = birthdayCakeCandles($candles);