<?php
function quicksort($array, $left, $right, $field) {
  if ($left < $right) {
    $pivot_index = partition($array, $left, $right, $field);
    quicksort($array, $left, $pivot_index - 1, $field);
    quicksort($array, $pivot_index + 1, $right, $field);
  }
}

function partition($array, $left, $right, $field) {
  $pivot = $array[$right]; // Selecciona el último elemento como pivote
  $i = $left - 1;
  for ($j = $left; $j < $right; $j++) {
    if ($array[$j][$field] <= $pivot[$field]) {
      $i++;
      swap($array[$i], $array[$j]);
    }
  }
  swap($array[$i + 1], $array[$right]);
  return $i + 1;
}

function swap(&$a, &$b) {
  $temp = $a;
  $a = $b;
  $b = $temp;
}
