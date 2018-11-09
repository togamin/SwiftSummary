## 【Swift4】TextFieldを用いた検索補完機能の実装について





<h2>検索バー</h2>

検索バーを使うためのデリゲートを設定し、検索候補が入る配列と、入力した文字列とマッチする候補だけを入れる配列を用意する。

```swift
//デリゲートを設定
UISearchBarDelegate

//検索候補が入る配列
var autoCompletePossibilities: [String] = []
//入力した文字にマッチした候補だけを入れる配列
var autoComplete: [String] = []

//viewDidLoad内に以下を記入
searchBar.delegate = self
```



<h2>検索補完機能</h2>





サーチバーを用いた検索補完機能も作る。