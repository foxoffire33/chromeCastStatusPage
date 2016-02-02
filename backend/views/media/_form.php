<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Media;

/* @var $this yii\web\View */
/* @var $model common\models\Media */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="media-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->dropDownList([
        Media::TYPE_WEATHER => Yii::t('media','Weather'),
        Media::TYPE_TWEET => Yii::t('media','Twitter'),
        Media::TYPE_NIEUWS => Yii::t('media','Nieuws')
    ]) ?>

    <?= $form->field($model, 'value')->textarea() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
