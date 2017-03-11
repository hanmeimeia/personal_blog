<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\controllers;
use yii\web\Controller;
use frontend\models\Country;
use yii\data\Pagination;
/**
 * Description of CountryController
 *
 * @author Administrator
 */
class CountryController extends Controller {
    //put your code here
    public function actionIndex(){
        $query = Country::find();
//        $pagination = new Pagination([
//            'defaultPageSize' => 2,
//            'totalCount' => $query->count(),
//        ]);
//        $countrys = $query->offset($pagination->offset)->limit($pagination->limit)->all();

        
        
        
//        $countrys = $query->all();
//        $countrys = $query->where(['>','population','111111111'])->all();
        
//        $countrys = Country::findBySql("select * from country")->all();
        //直接查询大量数据,会导致内存不够用
        //解决办法:过滤掉不必要的字段
        //返回的数据为标准的数组,而不是对象
        $countrys=$query->asArray()->all();
        //分段查询
        
        return $this->render('index',["countrys"=>$countrys,'pagination' => $pagination,]);
    }
}
