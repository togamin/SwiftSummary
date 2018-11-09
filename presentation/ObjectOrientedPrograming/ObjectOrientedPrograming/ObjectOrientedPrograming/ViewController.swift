//
//  ViewController.swift
//  ObjectOrientedPrograming
//
//  Created by Togami Yuki on 2018/11/01.
//  Copyright © 2018 Togami Yuki. All rights reserved.
//

import UIKit
//-------------------------------------
//Viewコントローラーの設計図
//-------------------------------------
class ViewController: UIViewController {

    
    //viewが読み込まれる前に動作する関数(メソッド)
    override func viewDidLoad() {
        super.viewDidLoad()
        
        //②「とがみん」をインスタンス化する
        var togaminObject = togamin()
        
        //③「とがみん」のプロパティを取得する。命令を出す。
        print(togaminObject.occupation)
        togaminObject.wirteArticle()
        
    }

    
    //メモリに関する警告を受け取った時に動作する関数(メソッド)
    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        
    }
}



//-------------------------------------
//①「とがみん」の設計図(クラス)を作成する。
//-------------------------------------
class togamin {
    var hobby = ["ブログ","器械体操","ポケモン"]
    var occupation = "ブロガー"
    
    func wirteArticle(){
        print("記事を書いてブログに投稿します。")
    }
    func advertise(){
        print("ブログを他人に広める。")
    }
    func backflip(){
        print("バク転をする")
    }
}
