<?php declare(strict_types = 1);

$counter = [];
$totalData = count($customers);

foreach ($customers as $customer) {
  $lowercaseCustomer = strtolower($customer);
  $lowercaseCustomer = str_replace(' ', '', $lowercaseCustomer);

  if (strlen($lowercaseCustomer) < 1)
    continue;

  if (strlen($lowercaseCustomer) > 20)
    continue;

  if (!isset($counter[$lowercaseCustomer])) {
    $counter[$lowercaseCustomer] = 1;
    continue;
  }

  $counter[$lowercaseCustomer] += 1;
}

$qualifiedCompany = [];
foreach ($counter as $key => $value) {
  // is qualified for percentage?
  $percentage = $value / $totalData * 100;
  if ($percentage >= 5) {
    $qualifiedCompany[] = ucfirst($key);
  }
}

// Bubble sort
for ($i=0; $i < count($qualifiedCompany); $i++) { 
  for ($j=0; $j < count($qualifiedCompany) - $i - 1; $j++) { 
    // bigger than?
    if (strcmp(strtolower($qualifiedCompany[$j]), strtolower($qualifiedCompany[$j+1])) > 0) {
      // swap
      $temp = $qualifiedCompany[$j];
      $qualifiedCompany[$j] = $qualifiedCompany[$j+1];
      $qualifiedCompany[$j+1] = $temp;
    }
  }
}

print_r($qualifiedCompany);die;