<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TextBlock */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Text Blocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="text-block-view">

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

    <div class="text"><?= nl2br($model->text) ?></div>

    <div class="cal col-sm-12">
        <h3><?= Yii::t('textBlock', 'Images') ?></h3>
        <div class="row">
            <?php if(!empty($model->images)): ?>
                <?php foreach($model->images as $image): ?>
                        <?= Html::img(['/site/file','path' => $image->path],['class' => 'col-sm-3']); ?>
                <?php endforeach; ?>
            <?php endif; ?>
            </div>
        <div class="row">
            <h4><?= Yii::t('textBlock','upload') ?></h4>
            <div class="text-block-iamge-form">

                <?php $form = ActiveForm::begin([
                    'action' => '/text-block/upload-images',
                    'options' =>
                        ['enctype' => 'multipart/form-data']
                ]); ?>

                <?= $form->field($imageUpload, 'text_block_id')->hiddenInput(['value' => $model->id])->label(false) ?>

                <?= $form->field($imageUpload, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

                <div class="form-group">
            <?= Html::submitButton( 'Create' , ['class' => 'btn btn-success']) ?>
        </div>

                <?php ActiveForm::end(); ?>

            </div>
        </h4>
    </div>

</div>
