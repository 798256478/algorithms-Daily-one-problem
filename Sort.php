<?php

/**
* 
*/
class Sort
{
	/* 一般的排序方法 */
	public function normalSort($array)
	{
		$n = count($array);

		for ($i = 0; $i < $n - 1; $i++) { 
			for ($j = $i; $j < $n; $j++) { 
				if($array[$i] > $array[$j]){
					$temp = $array[$j];
					$array[$j] = $array[$i];
					$array[$i] = $temp;
				}
			}
		}

		foreach ($array as $key => $value) {
			echo $value.'>';
		}
	}

	/*冒泡排序*/
	public function bubbleSort($array)
	{
		$n = count($array);

		for ($i = 0; $i < $n - 1; $i++) { 
			for ($j = $n - 1; $j > $i; $j--) { 
				if($array[$j - 1] > $array[$j]){
					$temp = $array[$j];
					$array[$j] = $array[$j - 1];
					$array[$j - 1] = $temp;
				}
			}
		}

		foreach ($array as $key => $value) {
			echo $value.'>';
		}
	}

	/*选择排序*/
	public function selectSort($array)
	{
		$n = count($array);

		for ($i = 0; $i < $n - 1; $i++) {
			$min = $i; 
			for ($j = $i; $j < $n; $j++) { 
				if($array[$min] > $array[$j]){
					$min = $j;
				}
			}
			if($min != $i){
				$temp = $array[$min];
				$array[$min] = $array[$i];
				$array[$i] = $temp;
			}	
		}

		foreach ($array as $key => $value) {
			echo $value.'>';
		}
	}

	public function insertSort($array)
	{
		$n = count($array);

		for ($i = 1; $i < $n; $i++) { 
			if($array[$i-1] > $array[$i]){
				$temp = $array[$i];
				for ($j = $i - 1; $j >=0 && $temp < $array[$j]; $j--) {
					$array[$j + 1] = $array[$j];
				}

				$array[$j + 1] = $temp;
			}
		}

		foreach ($array as $key => $value) {
			echo $value.'>';
		}
	}

	/*希尔排序*/
	public function shellSort($array)
	{
		$n = count($array);
		$gap = $n;

		do{
			$gap = floor($gap/2);

			for ($i = $gap; $i < $n; $i++) { 
				for ($j = $i - $gap; $j >=0 && $array[$j + $gap] < $array[$j]; $j-= $gap) {
					$temp = $array[$j + $gap];
					$array[$j + $gap] = $array[$j];
					$array[$j] = $temp;
				}
			}	
		} while ($gap > 1);

		foreach ($array as $key => $value) {
			echo $value.'>';
		}
	}
}

$array = [5, 1, 6, 9, 2, 7, 8, 3, 0, 4];
$sort = new Sort;
$sort->normalSort($array);
echo '<br>';
$sort->bubbleSort($array);
echo '<br>';
$sort->selectSort($array);
echo '<br>';
$sort->insertSort($array);
echo '<br>';
$sort->shellSort($array);

?>