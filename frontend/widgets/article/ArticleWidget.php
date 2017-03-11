<?php
namespace frontend\widgets\article;
use yii\base\Widget;
use frontend\models\PostsForm;
use frontend\models\Posts;
use yii\helpers\Url;
use yii\data\Pagination;
class ArticleWidget extends Widget {
    
    public $title;
    public $limit=3;
    public $page = true;
    public $more = true;
    
    
//    public function init(){
//        
//    }
    public function run(){
        //获取 当前页 默认显示第一页
        $currentPage = \Yii::$app->request->get('page',1);
        //2查询所有可见的文章
        $condition = ['=','is_valid',  Posts::IS_VALID];
        //3 由表单模型,查询符合条件文章的数据
        $res = PostsForm::getArticleList($condition,$currentPage,$this->limit);
          $result['title'] = $this->title ? :"最新文章";
        $result['more'] = Url::to(['article/index']);
        $result['body'] = $res['data']? :[];
        if($this->page) {
            $pages = new Pagination(['totalCount'=>$res['count'],'pageSize'=>$res['pageSize']]);
            $result['page'] = $pages;
        }else {
            
        }

        return $this->render('index',['data'=>$result]);
        
    }
}
