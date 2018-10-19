## 【Swift4】質問

### Firebaseの同期・非同期処理について

Firebaseからのデータ取得完了後にローカルデバイスで処理させる方法について。

**現状**

Firebaseを使ったリモートPush機能の実装に置いて、FCMトークンを取得し、それをユーザーデフォルトに登録する作業をしたいのですが、上手く動作しません。

おそらく、FCMトークンが取得される前に、ユーザーデフォルトに登録される処理が実行されるためだと考えています。

```swift
let token = Messaging.messaging().fcmToken
UserDefaults.standard.set(token, forKey: "FCM_TOKEN")
```

Firebaseからのデータの取得が完了した後に、処理を実行する方法をもし知っていれば、教えていただけないでしょうか。

[https://github.com/togamin/PushNotificationSample.git](https://github.com/togamin/PushNotificationSample.git)



### CLLocationの型変換の方法





