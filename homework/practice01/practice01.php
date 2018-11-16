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
		echo "FizzBuzz"."<br>";
	}elseif($i%3 == 0){
		echo "Fizz"."<br>";
	}elseif($i%5 == 0){
		echo "Buzz"."<br>";
	}else{
		echo $i."<br>";
	}
}

//########################
 echo "<br><br>課題10<br><br>";
//########################
echo "素数：1とその数以外の数では割り切れない数字<br><br>";

//-------------------
//解答1:1からnまで順々に素数かどうかを判定する。
//-------------------
echo "<hr>1から1000まで順々に素数かどうかを判定する。<br><br>";
$start = microtime(true);//処理時間計測用
$max = 1000;
echo "2 ";
//2から1000までの数字それぞれに対して、素数かどうかの判定をする。
for($i = 2;$i <= $max;$i++){
	//「2」から判定する素数「$i」より1小さい値まで、割る。
	for($j = 2;$j < $i;$j++){
		//割り切れた時点でfor文を抜ける。
		if($i%$j == 0){
			break;
		//判定する数「$i」より1小さい数まで割り切れなかったら素数なので表示。
		}elseif($j == $i - 1){
			echo $i." ";
		}
	}
}
$end = microtime(true);
echo "<br><br>処理時間：" . ($end - $start) . "秒<br><br>";

//-------------------
//       解答2
//エラトステネスのふるい
//①2からnまでの整数を並べる
//②並べた整数の最小のものが素数(pとする)
//③pの倍数は素数ではないので、並べた整数から除去する。
//④pがnの平方根を超えるまで②と③を続ける。
//-------------------
echo "<hr>エラトステネスのふるい①<br><br>";
$start = microtime(true);
$max = 1000;
//素数かどうか判定する値を全て入れる
for ($i = 2; $i <= $max; $i++) {
	//$i番目の配列に「$i」の値を入れる
	$numArray[$i] = $i;
}
//「0」番目と「1番目」は空なので飛ばす。
for ($i=2; $numArray[$i]*$numArray[$i]<=$max; $i++) {
	//$numArray[$i]が空じゃなかったら(消去されてなかったら)実行
	if(isset($numArray[$i])){
		for ($j=$i*$i; $j<=$max; $j+=$i) {
			//$j番目の値を削除
			unset($numArray[$j]);
		}
	}
}
//配列に残っている値をとり出す。
foreach ($numArray as $num){
	echo $num." ";
}
$end = microtime(true);
echo "<br><br>処理時間：" . ($end - $start) . "秒<br>";


//-------------------
//       解答3
//-------------------

echo "<hr>エラトステネスのふるい②<br><br>";
$start = microtime(true);
$max = 1000;
//$maxの平方根をとって、小数点を切り捨て
$sqrt = floor(sqrt($max));
//素数かどうか判定する値を全て入れる
for ($i = 2; $i <= $max; $i++) {
	//$i番目の配列に「$i」の値を入れる
	$numArray[$i] = $i;
}
//「0」番目と「1番目」は空なので飛ばす。
for ($i=2; $numArray[$i]<=$sqrt; $i++) {
	//$numArray[$i]が空じゃなかったら(消去されてなかったら)実行
	if(isset($numArray[$i])){
		for ($j=$i*$i; $j<=$max; $j+=$i) {
			//$j番目の値を削除
			unset($numArray[$j]);
		}
	}
}
//配列に残っている値をとり出す。
foreach ($numArray as $num) {
	echo $num." ";
}
$end = microtime(true);
echo "<br><br>処理時間：" . ($end - $start) . "秒<br>";


/*
echo "<pre>";
var_dump($numArray);
echo "<pre>";
*/
?>







