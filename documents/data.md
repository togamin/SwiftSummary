## 【Swift4】データの型について

<h2>はじめに</h2>



<h2>データ型とは</h2>

「データ型」とは、プログラムで使うデータの型をいくつかの種類に分類したもの。データには、「整数」や「少数」、「文字列」等の種類がありますが、そう言ったデータの種類のことです。



<h2>なぜデータの型を指定するのか</h2>

メモリの使い方。

型によってメモリの使い方を使い分ける。

効率よく、メモリを使うことができるようにするため。

<h2>Swiftで使う主な型</h2>

* 文字列型：String

* ```swift
  var mozi = "文字列"
  ```

- 整数型：Int

  - Int型で指定すると、「メモリ」の領域を8バイト(64ビット)分確保する。

  ```swift
  var suzi = 5
  ```

- 浮動小数型：Double(64ビット),Float(32ビット)

- ```swift
  var anngle:Float = 45.5
  ```

- 配列型：Array

- ```swift
  var animal:[String] = ["ペンギン","ハリネズミ","猫","コアラ","犬"]
  
  //配列の要素の番号は０から始まる。
  print(animal[0]) // 出力 => ペンギン
  ```

- ディクショナリー型：Dictionary

- ```swift
  //["キー":値]
  
  var user:[String:Any] = ["name":"Yuki","age":23,"gender":"male"]
  print(user["neme"]) //出力 => Yuki
  print(user["age"]) //出力 => 23
  ```

- 論理型：Bool

- ```swift
  var button:Bool = true
  ```

<h2>コードを書く際の注意点</h2>

* 違う型同士の計算はできない。文字と数字の計算をしようとすると以下のように、エラーが出る。

* ```swift
  var mozi = "5"
  var suzi = 5
  
  mozi + suzi
  
  =>
  "Binary operator '+' cannot be applied to operands of type 'String' and 'Int'"
  ```

  違う型同士の場合、型を統一してから計算する必要がある。

  ```swift
  //整数型(Int型)に統一
  print(Int(mozi) + suzi) //出力 => 10
  
  //文字列型(String型)に統一
  print(mozi + String(suzi)) //出力 => 55
  ```

<h2>まとめ</h2>



参考文献

<a href = "https://wp-p.info/tpl_rep.php?cat=swift-biginner&fl=r9">＞Swift 入門編：データ型とは</a>



