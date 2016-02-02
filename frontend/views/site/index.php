<?php
use common\models\Media;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <ss
    ="col-sm-12">
    <div class="row">
        <?php if (!empty($textBlocks)): ?>
            <?php foreach ($textBlocks as $textBlock): ?>
                <div class="row" style="height:100px;">
                    <div class="col-sm-4">
                            <?= nl2br($textBlock->text) ?>
                        </div>
                    <div class="col-sm-8">
                        <div id="myCarousel-<?= $textBlock->id ?>" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <?php if (!empty($textBlock->images)): ?>
                                <?php $count = 0 ?>
                                <ol class="carousel-indicators">
                                <?php foreach ($textBlock->images as $image): ?>
                                        <li data-target="#myCarousel-<?= $textBlock->id ?>"
                                            data-slide-to="<?= $count ?>"
                                            class="<?= ($count == 0 ? 'active' : '') ?>"></li>
                                    <?php $count++ ?>
                                <?php endforeach; ?>
                                </ol>
                                <?php $count = 0 ?>
                                <div class="carousel-inner" role="listbox">
                                    <?php foreach ($textBlock->images as $image): ?>
                                        <div class="item <?= ($count == 0 ? 'active' : '') ?>">
                                            <?= Html::img(['/site/file','path' => $image->path]) ?>
                                        </div>
                                        <?php $count++ ?>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>


                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel-<?= $textBlock->id ?>" role="button"
                               data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel-<?= $textBlock->id ?>" role="button"
                               data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <?php if (!empty($employees)): ?>
                <?php foreach ($employees as $employee): ?>
                    <div class="col-sm-3">
                        <div class="row">
                            <?= Html::img(['/site/file', 'path' => $employee->image], ['class' => 'col-sm-12']) ?>
                            <br/>
                            <div class="help-block">
                        <?= $employee->name; ?>
                        </div>
                            <div class="col-sm-6">
                                <?= nl2br($employee->text); ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="col-sm-4">
            <iframe width="550" height="309" src="http://nos.nl/embed/?id=e:605787&autoplay=0" frameborder="0"
                    scrolling="no" allowfullscreen="" id="player-605787"></iframe>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
           <?php if(($widget= Media::find()->where(['type' => 0])->one()) != null): ?>
            <?= Html::decode($widget->value); ?>
           <?php endif; ?>
        </div>
        <div class="col-sm-4">
            <?php if(($widget= Media::find()->where(['type' => 2])->one()) != null): ?>
            <?= Html::decode($widget->value); ?>
           <?php endif; ?>
        </div>
        <div class="col-sm-4">
            <?php if(($widget= Media::find()->where(['type' => 1])->one()) != null): ?>
            <?= Html::decode($widget->value); ?>
           <?php endif; ?>
        </div>
    </div>
</div>
</div>
</div>