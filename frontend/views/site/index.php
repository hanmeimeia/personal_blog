<?php
use frontend\widgets\banner\BannerWidget;
/* @var $this yii\web\View */
use frontend\widgets\hot\HotWidget;
use frontend\widgets\tag\TagWidget;
use frontend\widgets\article\ArticleWidget;
use frontend\widgets\chat\ChatWidget;
$this->title = 'My Yii Application';
?>

<!--方便代码移植 界面清新 减少代码量 -->


<div class="row">
    <div class="col-lg-9">
        <?= BannerWidget::widget()?>
        <?= ArticleWidget::widget()?>
    </div>
    <div class="col-lg-3">
        <?= ChatWidget::widget()?>
        <?= HotWidget::widget()?>
        <?= TagWidget::widget()?>
        
    </div>
</div>

