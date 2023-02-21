<?php declare(strict_types = 1);

function timeConversion($s) {
  $dayOrNight = strtolower(substr($s, 8, 2));
  
  $hours = substr($s, 0, 2);
  $hours = (int)$hours;
  $minutes = substr($s, 3, 2);
  $seconds = substr($s, 6, 2);

  if ($dayOrNight == 'pm') {
    $hours = 12 + $hours;

    if ($hours == 24)
      $hours = 12;
  } else {
    if ($hours == 12)
      $hours = '00';
  }

  if ($hours < 10 && $hours != '00')
    $hours = "0{$hours}";

  $formattedTime = "{$hours}:{$minutes}:{$seconds}";

  print_r($formattedTime);die;
}

timeConversion('12:05:00AM');