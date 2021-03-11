<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Images */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Изображения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="images-view">

    <h1>Изображение: <?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',

            [
                'attribute' => 'Изображение',
                'value' => "../uploads/{$model->title}",
                'format' => ['image', ['width' => '100']],

            ],
            'title',
            'created_at',
            [
                'attribute' => 'Изображение',
                'value'=>'<a href="' . Url::to(['uploads/'.$model->title, 'id'=>$model->id]) .'">Полное изображение</a>',
                'format' => 'html',
]

        ],
    ]) ?>


</div>
