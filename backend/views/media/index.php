<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Media;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\MediaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Media';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="media-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Media', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'type' => [
                'attribute' => 'type',
                'value' => function($data){
                    return ($data->type == Media::TYPE_WEATHER ? Yii::t('media','Weather') : ($data->type == Media::TYPE_TWEET ? Yii::t('media','Tweet') : Yii::t('media','Nieuws')));
                }
            ],
            'value' => [
                'attribute' => 'value',
                'value' => function($data){
                    return substr($data->value,0,50).'...';
                }
            ],
            'created:datetime',
            'updated:datetime',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
