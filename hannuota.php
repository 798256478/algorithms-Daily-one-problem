<?php

/*
 * 汉诺塔问题
 * 输出移动的路径
 *
 * param int $n 汉诺塔的层数
 * param char $x 第一个柱子
 * param char $y 第二个柱子
 * Param char $z 第三个柱子
 */

function move($n, $x, $y, $z)
{
	if($n == 1){
		echo $x."->".$z."<br>";
		return;
	} 

	move($n - 1, $x, $z, $y); //将n-1层的盘子，借助z柱移动到y柱
	echo $x."->".$z."<br>";  //将最后的一个盘子，移动到z柱
	move($n - 1, $y, $x, $z); //将n-1层的盘子，从y柱借助x柱子移动到z柱
}

move(3, "x", "y", "z");

?>