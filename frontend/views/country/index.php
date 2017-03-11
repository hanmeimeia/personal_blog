<?php
use yii\widgets\LinkPager;
    foreach ($countrys as $key => $value) {
    echo $value['name'].'<hr>';
}

?>
<div style="text-align: center"><?= LinkPager::widget(['pagination' => $pagination]) ?></div>
