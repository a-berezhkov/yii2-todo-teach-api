<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="items-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Items', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'desc:ntext',

            [
                'attribute' => 'image',
                'value' => function ($model) {
                    return Html::img($model->image, ["width" => "100px"]);
                    },
                'format' => 'html'
            ],
            'is_collect',
             'price',
            'is_new',
             'is_active',
            [
                'attribute' => 'category_id',
                'value' => 'category.name',
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Category::find()->all(),'id','name')
            ],

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, \app\models\Items $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
