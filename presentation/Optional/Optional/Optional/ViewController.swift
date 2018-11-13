//
//  ViewController.swift
//  Optional
//
//  Created by Togami Yuki on 2018/11/13.
//  Copyright © 2018 Togami Yuki. All rights reserved.
//

import UIKit

class ViewController: UIViewController {

    override func viewDidLoad() {
        super.viewDidLoad()
        
        //オプショナル型はデフォルトで「nil」が入っている。
        var nickName:String?// = togaminnnn
    
        if nickName != nil{
            print(nickName)
        }else{
            print("値が設定されていません",nickName)
        }
        
        
    }


}

