<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "post_extends".
 *
 * @property integer $id
 * @property integer $post_id
 * @property integer $browser
 * @property integer $collect
 * @property integer $praise
 * @property integer $comment
 */
class PostExtends extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'post_extends';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['post_id', 'browser', 'collect', 'praise', 'comment'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('common', 'ID'),
            'post_id' => Yii::t('common', 'Post ID'),
            'browser' => Yii::t('common', 'Browser'),
            'collect' => Yii::t('common', 'Collect'),
            'praise' => Yii::t('common', 'Praise'),
            'comment' => Yii::t('common', 'Comment'),
        ];
    }

    //根据条件找到某个文章
    //让文章的哪个属性自增
    //字自增的值为多少,默认为1
    //目的:让该函数具备通用性,可以让评论,点赞,收藏,浏览量都能+1
    public function upCounter($condition,$attribute,$num=1) {
        //查询扩展表post_extends
        // 条件一般 id
        $article = $this->findOne($condition);
        //文章已经存在,让浏览量原先基础+1
        if($article){
            //属性名 browser
            //值 目的让基础上+1;
            $data[$attribute] = $num;
            $article->updateCounters($data);
        }
        //文章没存储过,让浏览量默认为1
        else{
            $this->setAttributes($condition);
            $this->$attribute = 1;
            $this->save();
        }
        //评论数+1,点赞+1,收藏+1,
    }

}
