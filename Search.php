<?php
/**
* 描述顺序查找和二分查找算法，顺序查找必须考虑效率，对象可以是一个有序数组
*/


/**
* 顺序查找
* @param $arr 数组
* @param $k   要查找的元素
* @return mixed 成功返回数组下表，失败返回-1
*/
function seq_sch($arr, $k)
{
	for ($i=0, $n = count($arr); $i < $n; $i++) { 
		if($arr[$i] == $k){
			break;
		}
	}
	if($i < $n){
		return $i;
	} else {
		return -1;
	}
}

$arr1 = array(9, 15, 34, 76, 25, 5, 47, 55);
echo seq_sch($arr1, 47);

echo "<br>";
/**
* 二分查找，要求数组已经排好顺序
* @param $array 数组
* @param $low   数组起始元素下标
* @param $high  数组末尾元素下标
* @param $k     要查找的元素
* @return mixed 成功返回数组元素下标，失败返回-1
*/
function bin_sch($array, $low, $high, $k)
{
	if($low <= $high){
		$mid = intval(($low + $high) / 2);
	}
	if($array[$mid] == $k){
		return $mid;
	} elseif ($k < $array[$mid]){
		return bin_sch($array, $low, $mid - 1, $k);
	} else {
		return bin_sch($array, $mid + 1, $high, $k);
	}

	return -1;
}

$arr2 = array(5, 9, 15, 25, 34, 47, 55, 76);
echo bin_sch($arr2, 0, 7, 47);

?>