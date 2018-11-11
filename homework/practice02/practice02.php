<?php
	echo "課題0<br>0から9までの数字を`for文`を使って表示してください。<br><br>";
	for($i = 0;$i < 10;$i++){
		echo $i." ";
	}

	echo "<br><br>";
?>





<?php
	echo "<br><br>課題1<br>フィボナッチ数列を10項表示してください。フィボナッチ数列が何かわからない人は検索してください。(第1項は1で)<br><br>";
	echo "フィボナッチ数列とは最初の二項が1で、第三項以降の項が全て直前の二項の和になっている数列<br><br>";

	echo "<br><br>①多分ノーマルバージョン<br><br>";
	$num1 = 1;
	$num2 = 1;
	for($i = 0;$i < 10;$i++){
		if($i == 0 || $i == 1){
			echo 1;
			echo " ";
		}else{
			$Fibonacci = $num1 + $num2;
			echo $Fibonacci." ";
			$num1 = $num2;
			$num2 = $Fibonacci;
		}
	}

	echo "<br><br>②配列を使ったバージョン(配列の中に全項を保持)<br><br>";
	$Fibonacci = array(1,1);
	for($i = 0;$i < 10;$i++){
		//配列の中に10個以上入らないようにする。
		if(count($Fibonacci) < 10){
			array_push($Fibonacci,$Fibonacci[$i] + $Fibonacci[$i + 1]);
		}
		echo $Fibonacci[$i]." ";
	}
	echo "<br><br>";
?>


<?php
	echo "<br><br>課題2<br>フィボナッチ数列の50項目の数字を表示してください。<br><br>";
	echo "<br><br>①多分ノーマルバージョン<br><br>";

	//何項目の変数を表示するかの変数を作る
	//指定した項のみの出力に変更
	$kou = 50;//何項表示するかの情報を入れる変数。
	$num1 = 1;
	$num2 = 1;
	for($i = 0;$i < $kou;$i++){
		if($i == 0 || $i == 1){
			//echo 1;
			//echo " ";
		}else{
			$Fibonacci = $num1 + $num2;
			//echo $Fibonacci." ";
			$num1 = $num2;
			$num2 = $Fibonacci;
		}
		if($i == $kou - 1){
			echo $Fibonacci;
		}
	}

	echo "<br><br>②配列を使ったバージョン<br><br>";
	$kou = 50;//何項表示するかの情報を入れる変数。
	$Fibonacci = array(1,1);
	for($i = 0;$i < $kou;$i++){
		//配列の中に10個以上入らないようにする。
		if(count($Fibonacci) < $kou){
			array_push($Fibonacci,$Fibonacci[$i] + $Fibonacci[$i + 1]);
		}
		if($i == $kou - 1){
			echo $Fibonacci[$i];
		}
	}

	echo "<br><br>";
?>




<?php
	echo "<br><br>課題3<br
	>フィボナッチ数列の1から10項目をそれぞれ2乗した数列を表示してください。<br><br>";
	echo "<br><br>①多分ノーマルバージョン<br><br>";
	$kou = 10;
	$num1 = 1;
	$num2 = 1;
	for($i = 0;$i < $kou;$i++){
		if($i == 0 || $i == 1){
			echo 1;
			echo " ";
		}else{
			$Fibonacci = $num1 + $num2;
			echo $Fibonacci*$Fibonacci." ";//ここを変更
			$num1 = $num2;
			$num2 = $Fibonacci;
		}
	}

	echo "<br><br>②配列を使ったバージョン<br><br>";
	$kou = 10;
	$Fibonacci = array(1,1);
	for($i = 0;$i < $kou;$i++){
		//配列の中に10個以上入らないようにする。
		if(count($Fibonacci) < $kou){
			array_push($Fibonacci,$Fibonacci[$i] + $Fibonacci[$i + 1]);
		}
		echo $Fibonacci[$i]*$Fibonacci[$i]." ";//ここを変更
	}



	echo "<br><br>";
?>


<?php
	echo "<br><br>課題4<br
	>課題3で表示した、「フィボナッチ数列の1から10項目をそれぞれ2乗した数列」の10項全てを足した値を表示してください。<br><br>";

	echo "<br><br>①多分ノーマルバージョン<br><br>";
	$sum = 0;//合計を代入する変数を定義

	$kou = 10;
	$num1 = 1;
	$num2 = 1;
	for($i = 0;$i < $kou;$i++){
		if($i == 0 || $i == 1){
			$sum += 1;
		}else{
			$Fibonacci = $num1 + $num2;

			//2乗した値を代入
			$sum += $Fibonacci*$Fibonacci;//ここを変更
			
			$num1 = $num2;
			$num2 = $Fibonacci;
		}
	}
	echo $sum;



	echo "<br><br>②配列を使ったバージョン<br><br>";
	$sum = 0;//合計を代入する変数を定義
	$kou = 10;
	$Fibonacci = array(1,1);
	for($i = 0;$i < $kou;$i++){
		//配列の中に10個以上入らないようにする。
		if(count($Fibonacci) < $kou){
			array_push($Fibonacci,$Fibonacci[$i] + $Fibonacci[$i + 1]);
		}
		$sum += $Fibonacci[$i]*$Fibonacci[$i];//ここを変更
	}
	echo $sum;
?>





<?php
	echo "<br><br>課題5<br
	>フィボナッチ数列の10項目と11項目を掛けた値を表示してください。<br><br>";


	echo "<br><br>①多分ノーマルバージョン<br><br>";

	$result = 0;//結果を入れる変数。

	$kou = 11;//何項表示するかの情報を入れる変数。
	$num1 = 1;
	$num2 = 1;

	$last;//数列の最後の数を入れる
	$beforeLast;//最後から一個前の数列を入れる

	for($i = 0;$i < $kou;$i++){
		if($i == 0 || $i == 1){
			//echo 1;
			//echo " ";
		}else{
			$Fibonacci = $num1 + $num2;
			//echo $Fibonacci." ";
			$num1 = $num2;
			$num2 = $Fibonacci;
		}
		if($i == $kou - 2){
			$beforeLast = $Fibonacci;
		}else if($i == $kou - 1){
			$last = $Fibonacci;
		}
	}
	echo $beforeLast*$last;

	echo "<br><br>②配列を使ったバージョン<br><br>";
	$kou = 11;//何項表示するかの情報を入れる変数。
	$Fibonacci = array(1,1);
	for($i = 0;$i < $kou;$i++){
		//配列の中に$kou個以上入らないようにする。
		if(count($Fibonacci) < $kou){
			array_push($Fibonacci,$Fibonacci[$i] + $Fibonacci[$i + 1]);
		}
	}
	echo $Fibonacci[9]*$Fibonacci[10];

	echo "<br><br>";
?>










