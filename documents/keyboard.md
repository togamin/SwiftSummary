## 【Swift4】キーボード表示時、画面をスクロールさせる方法について

* Swift キーボード スクロール



<h2>作成するサンプルアプリ</h2>

画面の下の方に、`TextField`を配置した場合、そこに文字を入力しようとした際に`TextField`が隠れてしまいます。また、キーボードを戻すことができません。

<Twitter動画>

これらの問題を解決するために、以下の機能を実装していく事にします。

* キーボードを戻す機能
  * Doneボタンを追加し、それを押すとキーボードをしまう機能
  * キーボード以外をタッチする事で、キーボードをしまう機能
  * エンターキーを押す事で、キーボードをしまう機能
* キーボードが表示された時に、`TextField`の位置を移動する機能

全て実装させたものが以下です。

<Twitter動画完成系>

このサンプルアプリの実装方法について紹介していきます。

<h2>実装方法</h2>

<h3>キーボードを戻す機能</h3>

まずキーボードを戻す機能についてです。以下の3つについて紹介していきます。

<ol><li>Doneボタンを追加し、それを押すとキーボードをしまう機能</li><li>キーボード以外をタッチする事で、キーボードをしまう機能</li><li>エンターキーを押す事で、キーボードをしまう機能</li></ol>

<h4>Doneボタンを追加し、それを押すとキーボードをしまう機能</h4>

`extension`を活用して、キーボードの処理をまとめていきます。以下のコードを`ViewContoroller`クラスの外側に記述します。

```swift
extension ViewController{
	func keyBoardDone(){
		let kbToolBar = UIToolbar(frame: CGRect(x: 0, y: 0, width: 320, height: 40))
        kbToolBar.barStyle = UIBarStyle.default  // スタイルを設定
        kbToolBar.sizeToFit()  // 画面幅に合わせてサイズを変更
        let spacer = UIBarButtonItem(barButtonSystemItem: UIBarButtonItem.SystemItem.flexibleSpace, target: self, action: nil)
        // Doneボタン。押された時に「closeKeybord」関数が呼ばれる。
        let commitButton = UIBarButtonItem(barButtonSystemItem:UIBarButtonItem.SystemItem.done, target: self, action:#selector(self.closeKeybord(_:)))
        kbToolBar.items = [spacer, commitButton]
       	self.textField.inputAccessoryView = kbToolBar
    }
    @objc func closeKeybord(_ sender:Any){
        self.view.endEditing(true)
    }
}
```

これを記述後、`viewDidLoad`内に`keyBoardDone()`を記入します。

実行すると、キーボードに「Done」ボタンが追加され、押すとキーボードが閉じます。



<h3>キーボードが表示された時に、TextFieldの位置を移動する方法</h3>

キーボードが表示された時に、`TextField`の位置を移動させるためにする事は以下の3つです。

<ol><li>スクロールビューの配置</li><li>キーボードが表示される時にスクロールビューを動かす</li><li>キーボードが閉じる時にスクロールビューを元に戻す処理</li></ol>

<h4>スクロールビューの配置</h4>

スクロールビューのデータを入れるための変数を`ViewController`クラスの中に宣言します。

```swift
var scrollView:UIScrollView!
```

そして、`viewDidLoad()`でインスタンス化します。

```swift
// UIScrollViewをインスタンス化
scrollView = UIScrollView()
```

`scrollView`のサイズ指定のため、デバイスの画面サイズを取得します。

```swift
//スクリーンのサイズを入れる変数を宣言
var screenWidth:CGFloat!
var screenHeight:CGFloat!

//スクリーンのサイズ取得
screenWidth = UIScreen.main.bounds.size.width
screenHeight = UIScreen.main.bounds.size.height
```

`scrollView`のサイズと位置を指定します。デバイスのサイズと同じサイズにしています。

```swift
// UIScrollViewのサイズと位置を設定
scrollView.frame = CGRect(x:0,y:0,width: screenWidth, height: screenHeight)
```

このスクロールビューに`TextField`を乗せる処理を記述します。

```swift
//スクロールビューにtextFieldを追加する処理
//表示位置とTextFieldのサイズを指定
textField.frame = CGRect(x: 20, y: screenHeight - 100, width: screenWidth - 40, height: 40)

//TextFieldをスクロールビューに追加
scrollView.addSubview(textField)
```

次に、スクロールビューの中に入れるコンテンツの大きさを指定し、`view`に追加します。高さはとりあえずデバイスの高さの2倍にしています。

```swift
// UIScrollViewのコンテンツのサイズを指定
scrollView.contentSize = CGSize(width: screenWidth, height: screenHeight*2)
        
// ビューに追加
self.view.addSubview(scrollView)
```

これで実行すると、`TextField`の乗ったViewをスクロールする事ができるようになっています。

<h4>キーボードが表示される時にスクロールビューを動かす処理について</h4>



















<h3>??</h3>

`viewWillAppear`に下記のコードを追加

```swift
override func viewWillAppear(_ animated: Bool) {
        super.viewWillAppear(animated)
        tag = 0
        print("memo:test")
        NotificationCenter.default.addObserver(self,selector: #selector(self.keyboardWillShow(notification:)),name: NSNotification.Name.UIKeyboardWillShow,object: nil)
        NotificationCenter.default.addObserver(self,selector: #selector(self.keyboardWillHide(notification:)),name: NSNotification.Name.UIKeyboardWillHide,object: nil)
    }
    override func viewWillDisappear(_ animated: Bool) {
        super.viewWillDisappear(animated)
        NotificationCenter.default.removeObserver(self,name:NSNotification.Name.UIKeyboardWillShow,object: nil)
        NotificationCenter.default.removeObserver(self,name:NSNotification.Name.UIKeyboardWillHide,object: nil)
    }
```

`viewWillDisappear`に下記のコードを追加

```swift
override func viewWillDisappear(_ animated: Bool) {
	super.viewWillDisappear(animated)
    	NotificationCenter.default.removeObserver(self,name:NSNotification.Name.UIKeyboardWillShow,object: nil)
 NotificationCenter.default.removeObserver(self,name:NSNotification.Name.UIKeyboardWillHide,object: nil)
    }
```





<h2>GitHub</h2>





<h2>まとめ</h2>





