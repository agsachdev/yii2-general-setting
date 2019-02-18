<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel vendor\yii2generalsetting\modules\allsettings\models\AllSettingsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'All Settings');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="all-settings-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create All Settings'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'title',
            'icon:ntext',

            ['class' => 'yii\grid\ActionColumn','template'=>"{update}{delete}"],
        ],
    ]); ?>
</div>