<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Media;

/* @var $this yii\web\View */
/* @var $model common\models\Media */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Media', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="media-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'type' => [
                'attribute' => 'type',
                'value' => ($model->type == Media::TYPE_WEATHER ? Yii::t('media', 'Weather') : ($model->type == Media::TYPE_TWEET ? Yii::t('media', 'Tweet') : Yii::t('media', 'Nieuws')))
            ],
            'created:datetime',
            'updated:datetime',
        ],
    ]) ?>
    <div class="row">
        <?= Html::decode($model->value) ?>
    </div>

</div>