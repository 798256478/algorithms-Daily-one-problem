<?php
	/**
	 * 斐波那契数列
	 * 问题描述：数列从第三项开始，每一项都等于前两项之和
	 *
	 */
class Fibonacc
{
	/*递归*/	
	public function fib($n)
	{
		if($n == 1 || $n ==2){
			return 1;
		}

		return $this->fib($n - 1) + $this->fib($n - 2);
	}

	/*非递归*/
	public function _fib($n)
	{
		$array = array();
		$array[] = 1;
		$array[] = 1;

		for ($i=2; $i < $n; $i++) { 
			$array[] = $array[$i-1] + $array[$i-2];
		}

		print_r($array);
	}

}

$fibonacc = new Fibonacc;
echo $fibonacc->fib(10);
$fibonacc->_fib(10);

?>