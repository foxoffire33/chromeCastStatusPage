<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Employee;

/* @var $this yii\web\View */
/* @var $model common\models\Employee */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-view">

    <h1><?= Html::img(['/site/file','path' => $model->image],['class' => 'img-circle','width' => 90]) ?> <?= Html::encode($this->title) ?></h1>

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
            'status' => [
                'attribute' => 'status',
                'value' => ($model->status == Employee::STATUS_HIDE ? Yii::t('employee','hide') : Yii::t('employee','show')),
            ],
            'created:datetime',
            'updated:datetime',
        ],
    ]) ?>

    <div class="help-block">
        <?= nl2br($model->text); ?>
    </div>

</div>
