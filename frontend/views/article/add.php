<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

//设置面包屑导航
$this->title = \Yii::t("common", "Add Article");

$this->params['breadcrumbs'][] = ['label' => "文章", 'url' => ["artcle/index"]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-9">
        <div class="panel-title">
            <span>发布文章</span>
        </div>
        <div>
            <!--这里的model不是给数据模型用的,给表单模型用的-->
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($model, 'title')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'cat_id')->dropDownList($categorys) ?>

            <?=
            $form->field($model, 'label_img')->widget('common\widgets\file_upload\FileUpload', [
                'config' => [
                    //图片上传的一些配置，不写调用默认配置
                    //为了以后图床服务器而使用
                    'domain_url' => 'http://www.yiiblog.io',
                ]
            ])
            ?>
            <?=
            $form->field($model, 'content')->widget('common\widgets\ueditor\Ueditor', [
                'options' => [
                    'initialFrameHeight' => 800,
                ]
            ])
            ?>
                <?= $form->field($model, 'tags')->widget('common\widgets\tags\TagWidget') ?>

            <div class="form-group">
            <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

<?php ActiveForm::end(); ?>
        </div>       
    </div>
    <div class="col-lg-3">
        <div></div>
        <div></div>
    </div>

</div>





