<?php
/**
*  线性表的删除
*/
function delete_array_element($array, $n)
{
	$len = count($array);
	if($n <= $len){
		for ($i=$n; $i < $len - 1; $i++) { 
			$array[$i] = $array[$i + 1];
		}
		array_pop($array);
		return $array;
	} else {
		throw new Exception("超出数组长度");
	}
	return false;
}

$array = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
var_dump($array);
var_dump(delete_array_element($array, 10));