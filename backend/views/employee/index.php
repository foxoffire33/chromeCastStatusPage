<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Employee;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\EmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Employee', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'iamge' =>[
                'attribute' => 'image',
                    'format' => 'html',
                'value' => function ($data) {return Html::img(['/site/file','path' => $data->image],['width' => '70px']);},
            ],
            'name',
            'status' => [
                'attribute' => 'status',
                'value' => function($data){
                    return ($data->status == Employee::STATUS_HIDE ? Yii::t('employee','hide') : Yii::t('employee','show'));
                }
            ],
             'created:datetime',
             'updated:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
