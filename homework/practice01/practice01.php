<?php


//########################
 echo "<br><br>課題1<br><br>";
//########################
$value1 = 20;
if($value1 >= 0){
	echo "0以上の数です";
}else{
	echo "負数です";
}



//########################
 echo "<br><br>課題2<br><br>";
//########################

$value2 = 9;
if(0 < $value2 && $value2 <= 100){
	echo $value2;
}else{
	echo "範囲外です";
}


//########################
 echo "<br><br>課題3<br><br>";
//########################
 $value3 = 9;
if($value3 % 2 == 0){
	echo "偶数です";
}else{
	echo "奇数です";
}


//########################
 echo "<br><br>課題4<br><br>";
//########################
$x = 3;
$y = 9;
if($x < $y){
	echo $y;
}elseif($y < $x){
	echo $x;
}elseif($y == $x){
	echo "同じです";
}

//########################
 echo "<br><br>課題5<br><br>";
//########################
$math = 60;
$english = 90;

if($math >= 60 && $english >= 60 && $math + $english >=140){
	echo "合格!";
}else{
	echo "残念!";
}

//########################
 echo "<br><br>課題6<br><br>";
//########################
$man = false;//女性
$age = 8;//8歳
if($man == false){
	echo "入れます";
}else{
	if($age < 10){
		echo "入れます";
	}else{
		echo "入れません";
	}
}


//########################
 echo "<br><br>課題7<br><br>";
//########################
for($i = 0;$i <=100;$i++){
	echo $i."<br>";
}

//########################
 echo "<br><br>課題8<br><br>";
//########################
for($i = 1;$i <= 9;$i++){
	echo "<br>";
	for($j = 1;$j <= 9;$j++){
		echo $i*$j." ";
	}
}

//########################
 echo "<br><br>課題9<br><br>";
//########################
for($i = 1;$i < 10;$i++){
	if($i < 3){
		echo $i."杯:余裕<br>";
	}elseif($i < 9){
		echo $i."杯:まだいける<br>";
	}else{
		echo $i."杯:寝る<br>";
	}
}



//########################
 echo "<br><br>課題10<br><br>";
//########################
for($i = 1;$i <= 100;$i++){
	if($i%3 == 0 && $i%5 == 0){
		echo "FizzBuzz"." ";
	}elseif($i%3 == 0){
		echo "Fizz"." ";
	}elseif($i%5 == 0){
		echo "Buzz"." ";
	}else{
		echo $i." ";
	}
}












