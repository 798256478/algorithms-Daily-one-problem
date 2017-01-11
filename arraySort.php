 <?php
 /**
 * 写一个二维数组排序算法函数，能够具有通用性，可以调用php内置函数
 * params $arr 需要排序的数组
 * params $keys 排序的键值
 * params $order 排序规则 0|1 降序|升序
 */
 function array_sort($arr, $keys, $order)
 {
 	if(!is_array($arr)){
 		return false;
 	}

 	$keysvalue = array();

 	foreach ($arr as $key => $value) {
 		$keysvalue[$key] = $value[$keys];
 	}

 	if($order == 0){
 		asort($keysvalue);//asort()函数对数组进行排序并保持索引关系
 	} else {
 		arsort($keysvalue);//arsort()函数对数组进行逆向排序并保持索引关系
 	}

 	reset($keysvalue);//reset()函数把数组的内部指针指向第一个元素，并返回这个元素的值。

 	foreach ($keysvalue as $key => $value) {
 		$keysort[$key] = $key;
 	}

 	$new_array = array();

 	foreach ($keysort as $key => $value) {
 		$new_array[$key] = $arr[$value];
 	}

 	return $new_array;
 }

 $person = array(
 		array('id' => 2, 'name' => 'zhangsan', 'age' => 23),
 		array('id' => 5, 'name' => 'lisi', 'age' => 28),
 		array('id' => 3, 'name' => 'apple', 'age' => 17)
 	);

 $result = array_sort($person, 'age', 1);
 print_r($result);
 ?>