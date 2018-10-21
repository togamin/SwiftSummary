## 【Swift4】Firebase Storageへの画像保存方法

<h2>はじめに</h2>





<h2>Firebase Storageとは</h2>





<h2>作成したアプリの概要</h2>





<h2>Firebase storageへの画像の保存機能実装</h2>

<h3>Firebaseとの連携</h3>

<h3>Firestoreの設定</h3>

<h3>画像のアップロード</h3>

<h3>画像の読み込み</h3>

<h3>画像の削除</h3>



<h2>GitHub</h2>

<a href = "https://github.com/togamin/FirestorageSample.git">＞https://github.com/togamin/FirestorageSample.git</a>





<h4>参考文献</h4>

<a href = "https://qiita.com/nnsnodnb/items/8464369f9c9160f49634">＞Firebase Storageに画像をアップロードをするサンプルを作ってみた！</a>



<h2>実装手順の詳細</h2>

* Firebaseとの連携
* UIの配置
* ライブラリから写真を選択するコード

```swift
//写真ライブラリのViewを表示する。
extension ViewController: UINavigationControllerDelegate {
    func pickImageFromLibrary() {
        if UIImagePickerController.isSourceTypeAvailable(UIImagePickerControllerSourceType.photoLibrary) {
            let controller = UIImagePickerController()
            controller.delegate = self
            controller.sourceType = UIImagePickerControllerSourceType.photoLibrary
            
            present(controller, animated: true, completion: nil)
        }
    }
}

//ライブラリから写真を読み込むコード
extension ViewController: UIImagePickerControllerDelegate {
    //写真を選択後に発動
    func imagePickerController(_ picker: UIImagePickerController, didFinishPickingMediaWithInfo
        info: [String : Any]) {
		if let data = UIImagePNGRepresentation(info[UIImagePickerControllerOriginalImage] as! UIImage) {
            //Firestorageにのパス指定と保存処理を記述
		}
dismiss(animated: true, completion: nil)
    }
}
```

* Firestorageにのパス指定と保存処理を記述する。

```swift
let storage = Storage.storage()
let storageRef = storage.reference(forURL:"FirestorageのURL")
let reference = storageRef.child("images/")
reference.putData(data, metadata: nil, completion: { metaData, error in
  	print("memo:metaData",metaData)
   	print("memo:error",error)
})
```

* Firebasestorageから読み込む処理を記述する

```swift
//Firestorageからデータを読み込む処理
extension ViewController{
    func getData(){
        photoList = []
        let storage = Storage.storage()
        let storageRef = storage.reference(forURL:"gs://firestoragesample.appspot.com")
        let islandRef = storageRef.child("images/test.jpg")
        islandRef.getData(maxSize: 1 * 8192 * 8192) { data, error in
            if let error = error {
                print("memo:error",error)
            } else {
                let image = UIImage(data: data!)
                self.photoList.append(image!)
                self.photoCollectionView.reloadData()
                print("memo:photoList",self.photoList)
            }
        }
    }
}
```

* CollectionViewのコード

```swift
//セルの間隔に関するコード
let margin:CGFloat = 3.0

//コレクションViewに関するコード
extension ViewController:UICollectionViewDelegate,UICollectionViewDataSource{
    
    //セルの数指定
    func collectionView(_ collectionView: UICollectionView, numberOfItemsInSection section: Int) -> Int {
        return photoList.count
    }
    //セルのインスタンス化
    func collectionView(_ collectionView: UICollectionView, cellForItemAt indexPath: IndexPath) -> UICollectionViewCell {
        let cell = collectionView.dequeueReusableCell(withReuseIdentifier: "Cell", for: indexPath)
        return cell
    }
    //セルのサイズ指定
    func collectionView(_ collectionView: UICollectionView, layout collectionViewLayout: UICollectionViewLayout, sizeForItemAt indexPath: IndexPath) -> CGSize {
        let width = photoCollectionView.frame.width//画面の横側
        let cellNum:CGFloat = 3
        let cellSize = (width - margin * (cellNum + 1))/cellNum//一個あたりのサイズ
        return CGSize(width:cellSize,height:cellSize)
    }
    //セル同士の縦の間隔を決める。
    func collectionView(_ collectionView: UICollectionView, layout collectionViewLayout: UICollectionViewLayout, minimumLineSpacingForSectionAt section: Int) -> CGFloat {
        return margin
    }
    //セル同士の横の間隔を決める。
    func collectionView(_ collectionView: UICollectionView, layout collectionViewLayout: UICollectionViewLayout, minimumInteritemSpacingForSectionAt section: Int) -> CGFloat {
        return margin
    }
}
```

* 

* セルにImageViewを追加と画像を入れるコード書く。

  * ImageViewをセルの中に。

  * セルのクラス拡張とイメージViewの紐付け。

  * ```swift
    class newCell:UICollectionViewCell{
        @IBOutlet weak var cellImageView: UIImageView!
    }
    
    let cell = collectionView.dequeueReusableCell(withReuseIdentifier: "Cell", for: indexPath) as! newCell
    cell.cellImageView.image = photoList[indexPath.row]
    ```

  * 

* 宿題

  * 1枚だけ保存し取得しているので、複数枚保存し取得する処理を書いてくる。