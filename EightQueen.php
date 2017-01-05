<?php

/**
 * 八皇后问题
 * 问题：
 * 满足上述条件的八个皇后，棋盘上任意一行、任意一列、任意一条斜线上都不能有两个皇后。
 */

class Queen{
    var $chess; //皇后位置
    var $queens; //皇后数
    var $result = array();//正解
    function Queen($queens){
        $this -> queens = $queens; //棋盘大小 $queens x $queens
        $this -> place(); //开始放置第0个皇后
    }
    //在第$n行放置皇后
    function place($n=0){
        if($n == $this -> queens){ //得到一个解
            for($i = 0 ; $i < $this -> queens ; $i++) {
                $re[] = $this -> chess[$i]; //保存皇后位置
            }
            $this -> result[] = $re;
            return;
        }
        for($i = 1 ; $i <= $this -> queens ; $i++){
            $this -> chess[$n] = $i;
            if($this -> isOK($n)) {
                $this -> place($n + 1);
            } 
        }
    }
    //判断位置是否有效：判断第$n行放置位置$chess[$n] = $i 是否和前面的行冲突(同行，同列冲突，对角线冲突)
    function isOK($n){
        for($i = 0 ; $i < $n ; $i++){
            if($this -> chess[$i] == $this -> chess[$n] || abs($this -> chess[$i] - $this -> chess[$n]) == ($n - $i)) 
                return 0;
        }
        return 1;
    }

    function getResult(){
        return $this -> result; 
    }
}
//测试:
$queen = new Queen(8);
$re = $queen->getResult();

//输出
$k=0;
foreach($re as $v) {
    echo "输出第".++$k."个结果:<br>";
    echo "<table border=0 cellspacing=1 cellpadding=0 bgcolor=#000000 style='padding:5px;'>";
        foreach($v as $row){
            echo "<tr align='center'>";
            for($i=1;$i<=count($v);$i++) {
                if($row == $i) echo "<td bgcolor=#ffffff width='20' style='color:red;font-weight:bold;'>Q</td>";
                else echo "<td bgcolor=#ffffff width='20'>&nbsp;</td>";
            }
            echo "</tr>";
        }    
        echo "</table><br>";
}