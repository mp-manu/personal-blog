<?php

use app\modules\admin\models\ModelStatus;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\FrontMenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Menu Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="front-menu-index">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
    <?= ModelStatus::getNotify() ?>
    <p>
        <?= Html::a('Add new Menu item for Users', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nodeid',
            'parentnodeid',
            'nodeshortname',
            'nodename',
            'nodeurl',
            //'userstatus',
            //'nodeaccess',
            //'nodestatus',
            //'nodeorder',
            //'nodefile',
            //'nodeicon',
            //'ishasdivider',
            //'hasnotify',
            //'notifyscript',
            //'isforguest',
            //'arrow_tag',
            //'position',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>