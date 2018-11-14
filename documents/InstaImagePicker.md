## 【Swift4】Instagram風ImagePickerについて



<a href = "https://github.com/Yummypets/YPImagePicker.git">＞https://github.com/Yummypets/YPImagePicker.git</a>

<h2>Instagram風ImagePickerについて</h2>



<h2>実装手順</h2>

<h3>ライブラリのインストール</h3>

Instagram風のImagePickerを使うにあたって必要なライブラリをインストールします。

```swift
pod 'YPImagePicker'
```



<h3>バージョン違いによるエラーの修正</h3>

モジュールを追加します。

```swift
import YPImagePicker
```



`command`+ `b`を押して、一旦ビルドします。

バージョン違いによるエラーがたくさん出るので`Fix`を押して直していきます。

結構めんどくさいです。(50個ぐらいでる)



<h3>カメラ・ライブラリへのアクセス権に関する設定</h3>

`Info.plist`を右クリックし、`Open As`＞`Soure Code`の`dict`タグの中に以下を記入します。

```swift
<key>NSCameraUsageDescription</key>
<string>カメラでの撮影が必要です。</string>
<key>NSPhotoLibraryUsageDescription</key>
<string>PhotoLibrary写真の使用に必要です。</string>
```

これはカメラやライブラリの使用許可を各ユーザーに求めるためのアラートを表示します。

`<string></string>`タグの中には、使用目的を記述します。これを記述しないと、カメラやライブラリを扱うことはできません。



<h3>Instagram風ImagePickerの表示</h3>

以下のコードをインスタ風イメージピッカーを表示させたい場所に記入します。サンプルコードでは、ボタンを押した時に動作する関数の中に、以下のコードを記述しています。



画面が表示された後に、インスタグラムで使われているような、写真を撮ったり、画像を取得する画面が表示されます。

```swift
//「YPImagePicker」クラスのインスタンス化
let picker = YPImagePicker()

//Pickerが閉じられた時に動作する。
picker.didFinishPicking { [unowned picker] items, cancelled in
   	for item in items {
    	switch item {
        	case .photo(let photo):
            	print("phote",photo.image)
          	case .video(let video):
               	print("video",video)
       	}
   	}
    //「Cancel」ボタンが押された時と、「Next」ボタンが押された時の動作。
   	if cancelled {
      	//「Cancel」ボタンが押された時の処理
        picker.dismiss(animated: true, completion: nil)
   	}else{
       	//「Next」ボタンが押された時の処理
        picker.dismiss(animated: true, completion: nil)
   	}
}
//Pickerを表示するコード
present(picker, animated: true, completion: nil)
```

<h3>選択した画像を別のViewControllerに表示する</h3>

次にピッカービューで、選択した画像をViewControllerに表示するコードを書きます。

まず、選択した写真を入れるための変数を用意します。

```swift
var selectPhoto:UIImage!
```

写真を取得後、その変数の中に、取得した画像を代入します。

```swift
switch item {
   	case .photo(let photo):
       	print("phote",photo.image)
    	//以下の一文を追加
    	self.selectPhoto = photo.image
   	case .video(let video):
     	print("video",video)
}
```

次に、画像を表示するコードを書きます。

```swift
//UIImageViewを配置し、プログラムと紐ずける。
@IBOutlet weak var imageView: UIImageView!

//画面が表示される直前に呼ばれる。
override func viewWillAppear(_ animated: Bool) {
  	//selectPhotoにUIImageが入っているなら、その画像を表示。入っていないなら、デフォルト画像を表示。
  	if selectPhoto != nil{
     	imageView.image = selectPhoto
   	}else{
       	imageView.image = UIImage(named: "default.jpg")
  	}
}
```

ImagePickerを閉じた時に、`selectPhoto`に画像のデータが入っていれば、その画像を表示し、入っていなければ、デフォルトで用意していた画像を表示します。

<h2>GitHubについて</h2>

サンプルコードは以下に載せてるので、参考にしてください。

<a href = "https://github.com/togamin/InstaImagePicker.git">＞https://github.com/togamin/InstaImagePicker.git</a>



<h2>まとめ</h2>







**参考**

<a href = "https://github.com/Yummypets/YPImagePicker.git">＞https://github.com/Yummypets/YPImagePicker.git</a>














<h2>デザインの変更</h2>

インスタ風のイメージピッカービューのデザイン、色の変更方法について書いていきます。

<h3>NavigationBarのデザインの変更について</h3>



<h2>各種設定</h2>

```swift

```





<h2>NavigationBarのデザインの変更について</h2>

```swift
//NavigationBarの背景画像
let coloredImage = UIImage(named:"backImage.jpg")
UINavigationBar.appearance().setBackgroundImage(coloredImage, for: UIBarMetrics.default)

//NavigationBarの文字の色
//タイトル
UINavigationBar.appearance().titleTextAttributes = [NSAttributedStringKey.foregroundColor : UIColor.white ]

//左のボタン「Cancel」
UINavigationBar.appearance().tintColor = .white

//右のボタン「Next」
config.colors.tintColor = .white
```

<h2>画面の色の変更について</h2>

写真の背景画像`Pods`フォルダ＞`YPImagePicker`フォルダの中のファイルを変更することによって、色を変えます。

```swift
//ライブラリ画面の背景色の変更
//「YPAssetViewContainer.swift」ファイル
override func awakeFromNib() {
    self.backgroundColor = .cyan
    //...
}


//フィルター画面の背景色の変更
//「YPFiltersView.swift」ファイル
convenience init() {
    imageView.backgroundColor = .yellow
    collectionViewContainer.backgroundColor = .orange
    //...
}


//カメラで写真を撮るボタンの部分の色の変更
//「YPCameraView.swift」ファイル
convenience init(overlayView: UIView? = nil) {
  	self.init(frame: .zero)
    buttonsContainer.backgroundColor = .green
    //...
}
```

<h2>タブの色の変更について</h2>

`Library`や`Photo`タブの色の変更。`Pods`フォルダ＞`YPImagePicker`フォルダ＞`YPMenuItem.swift`

の`setup()`関数の中の`backgroundColor`を変更する。

```swift
//タブの色の変更
//「YPMenuItem.swift」ファイル
func setup() {
    //タブの色の変更。
 	backgroundColor = .blue
        
   	sv(
    	textLabel,
       	button
  	)
    //・・・
```

<h2>画面遷移について</h2>

```swift
//viewDidAppearの中に記述
//ストーリーボードを指定
let storyboard = UIStoryboard(name: "Main", bundle: nil)
// フォトライブラリーで画像が選択された時の処理
guard let photeViewController = storyboard.instantiateViewController(withIdentifier: "photoEdit") as? photeViewController else {
  	return
}


//photo.image取得後に、「photeViewControlle」のgetPhotoに写真情報を入れる。
for item in items {
 	switch item {
      	case .photo(let photo):
          	print(photo)
        	photeViewController.getPhoto = photo.image//ここ
       	case .video(let video):
          	print(video)
     }
}
```



```swift
class photeViewController: UIViewController {
    //前の画面がら画像データを受け取るための、変数。
    var getPhoto:UIImage!
    @IBOutlet weak var getPhotoView: UIImageView!
    
    override func viewDidLoad() {
        super.viewDidLoad()
        //imageViewに画像を入れる
        getPhotoView.image = getPhoto
    }
    
    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
    }
}
```



