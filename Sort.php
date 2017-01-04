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

	/* 冒泡排序
     *
     * 思路：在要排序的数组中，对当前还未拍好的序列，从前往后对相邻的
     * 两个数依次进行比较和调整，较小的数向上冒
	 */
	public function bubbleSort($array)
	{
		$n = count($array);
		//该循环控制需要冒泡的轮数
		for ($i = 0; $i < $n - 1; $i++) { 
			//该循环用来控制每轮循坏的比较次数
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

	/* 选择排序
	 *
	 * 思路：在一次循环中找出最小的那个数，如果这个最小的数不是
	 * 当前外层循环到的元素，就把它们交换
	 *
	 */
	public function selectSort($array)
	{
		$n = count($array);
		//依次遍历每个元素
		for ($i = 0; $i < $n - 1; $i++) {
			$min = $i; 
			//查找最小的元素
			for ($j = $i; $j < $n; $j++) { 
				if($array[$min] > $array[$j]){
					$min = $j;
				}
			}
			//如果最小元素不是当前元素，就交换
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

	/*
     * 直接插入排序
	 *
     * 思路：依次将数组每两个数进行比较，如果后面的数比较小，就把这个数记录下，
     * 并将它前面的数依次向后移动一位，将这个数插到前面
     *
	 */
	public function insertSort($array)
	{
		$n = count($array);
		//遍历数组中的数字
		for ($i = 1; $i < $n; $i++) { 
			//如果后面的数比较小
			if($array[$i-1] > $array[$i]){
				$temp = $array[$i];//将后面的数字记录下
				for ($j = $i - 1; $j >=0 && $temp < $array[$j]; $j--) {
					//将之前的数字依次后移一位
					$array[$j + 1] = $array[$j];
				}
				//把之前记录的数字放到前面
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

	/*
	 * 快速排序
	 * 思路：选择一个基准元素，通常选择第一个元素或者最后一个元素。通过一趟扫描，将待排序
	 * 列分成两部分，一部分比基准元素小，一部分大于等于基准元素。此时基准元素在其排好序后
	 * 的正确位置，然后再用同样的方法递归地排序划分的两部分。
	 *
	 */

	public function quickSort($array)
	{
		$n = count($array);
		if($n < 2){
			return $array;
		}
		//小于基准点的元素
		$left_array = array();
		//大于基准点的元素
		$right_array = array();
		//记录第一个元素作为基准点
		$base_num = $array[0];
		for ($i = 1; $i < $n; $i++) { 
			if($base_num > $array[$i]){
				$left_array[] = $array[$i];
			} else {
				$right_array[] = $array[$i];
			}
		}
		//在将左右数组的元素做相同的处理
		$left_array = $this->quickSort($left_array);
		$left_array[] = $base_num; //将基准点元素放到左边数组的最后面
		$right_array = $this->quickSort($right_array);
		return array_merge($left_array, $right_array);
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
echo '<br>';
foreach ($sort->quickSort($array) as $key => $value) {
	echo $value.'>';
}
?>