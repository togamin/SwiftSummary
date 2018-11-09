## 【Swift4】質問



## Firebaseに関する質問

#### ドキュメント指向型データベース設計の際に気をつけることどのように設計すれば良いのか。

* Reference Collection
  * フォロー、フォロワー機能の実装。
* Junction Collection
* Redundant Collection





<a href = "https://qiita.com/samuraikun/items/dfe7d1081f62359b0dcd">＞Firestore で、DB設計を考える際に参考になった情報</a>

#### フォロー・フォロワー機能の実装方法

<a href = "https://blog.firstfournotes.com/tech/firebase-follow-followered/">＞CloudFunctionsでフォロワー、フォローの数を集計する</a>





#### FireAuthのユーザーIDが現状不規則な文字列と数字で構成されている。Twitterのように`@togaminnnn`等わかりやすいIDでどうやって管理するか。

* なぜわかりやすいIDで管理したい?
  * IDによるユーザー検索をしたい。
* 同じIDでFirestoreに登録できないようにする方法。
* 以下のコードはタイプしたIDと同じユーザーIDのUser情報を取得する。すでにIDが登録されているなら、登録をブロックする処理を記述。そうでない場合は、登録する。

```swift
let docRef = db.collection("users").whereField("uniqueUsername", isEqualTo: typedID)

docRef.getDocument { (document, error) in
    if let document = document {
        // 登録処理をブロックする処理を記述。
    } else {
        print("Document does not exist")
        // 登録処理を許可
    }
}
```

<a href = "https://teratail.com/questions/99912">＞Cloud Firestoreで自前のユニークユーザーIDを作成する</a>

#### Firestorageからの画像のダウンロードと表示に関して、ユーザーにストレスを与えない仕組み。(インスタはどうなってる?)ただダウンロードして表示するだと遅すぎる。

* 起動時
  * 定期的に最新画像を読み込んで、CoreDataとかに入れる(バックグラウンドフェッチ)。
    * 起動の際はCoreDataから読み込むことによって、表示が早くなる。
    * アプリ閉じるときに、最新状態をCoreDataに保存。
    * バックグラウンドフェッチですると充電の減りが早そう。実際はどうなの？
* データのリロード時はどうする？
  * データは一括取得で表示じゃなくて、一件ずつ取得して表示。



#### Firestoreの更新をFirebase Functionじゃなくて、各端末で検知し、処理を実行する方法について

* いいね等の数字をリアルタイムで検知したい。
* データ変更イベントを受信するリスナーを設定する方法が怪しい。
* リッスン・・・通信機能を持つソフトウェアが、外部からのアクセスに備えて待機すること。
* リスナー・・・何らかのイベントが移動した時に、起動されるように対応づけられた、関数やメソッドなど。
* スナップショット・・・ある時点でのソースコードや、ファイル、ディレクトリ、データベースファイルなどの状態を抜き出したもの。
* レイテンシー補正・・・デバイスに対して、データ転送などを要求してから、その結果が返送されるまでの不顕性の高い遅延時間のこと。
* コールバック・・・コンピュータプログラム中で、ある関数などを呼び出す際に別の関数などを

<a href = "https://firebase.google.com/docs/firestore/query-data/listen?hl=ja">＞Cloud Firestore でリアルタイム アップデートを入手する</a>



#### Firestorageを使う理由は?データをFirestoreに保存する方が、いちいち参照しない分速度が早くなるのではないか?







## メモ

* ユーザがオンラインかオフラインを検知できる方法がある。

  * クライアントがオンライン、オフラインのタイミングで、Firebase Realtime Databaseのデータを更新。
  * Cloud Functionsで、Realtime Databaseトリガーを用いてデータをFirestoreにデータコピー
  * クライアントでオンライン化・オフライン化のタイミングでFirestoreのデータが更新されるようになるので、クライアントはそれを監視することによって自身や他のクライアントのオンラインステータスをリアルタイムで受け取ることができる

  <a href = "https://medium.com/google-cloud-jp/firestore-online-e885b5ce8271">＞Cloud FirestoreでiOSアプリのオンラインステータスを監視</a>

* 

