<?php

/*
 * 约瑟夫环问题：有m个人，从1开始数，数到n的人自杀，下个人继续从1开始数
 * 直到数到最后一人
 *
 */

/*递归方法*/
function yueshefu($p, $n, $current = 0, $str = '')
{
	$c = count($p);
	$num = 1;
	if($c == 1){
		$str .= $p[0];
		echo "自杀顺序为".$str;
		return;
	} else {
		while ($num++ < $n) {
			$current++;
			$current = $current % $c;
		}
		$str .= $p[$current]."->"; 
		array_splice($p, $current, 1);
		yueshefu($p, $n, $current, $str);
	}
}

$people = [1,2,3,4,5,6,7,8,9,10];
$n = 3;
yueshefu($people, $n);

echo "<br><br><br>";

/* 每个猴子出列后，剩下的猴子又组成了另一个子问题。只是他们的编号变化了。第一个出列的猴子肯定是a[1]=m(mod)n(m/n的余数)，他除去后剩下的猴子是a[1]+1,a[1]+2,…,n,1,2,…a[1]-2,a[1]-1，对应的新编号是1,2,3…n-1。设此时某个猴子的新编号是i，他原来的编号就是(i+a[1])%n。于是，这便形成了一个递归问题。假如知道了这个子问题(n-1个猴子)的解是x，那么原问题(n个猴子)的解便是：(x+m%n)%n=(x+m)%n。问题的起始条件：如果n=1,那么结果就是1。*/

function advanceYueshefu($c, $n)
{
	$r = 0;

	for($i = 2; $i <= $c; $i++){
		$r = ($r + $n) % $i;
	}

	return $r + 1;
}

echo advanceYueshefu(10, 3)."是最后剩下的";


?>