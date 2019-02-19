<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel vendor\yii2generalsetting\modules\allsettings\models\AllSettingFieldsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Setting Fields');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="all-setting-fields-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Setting Fields'), ['create?sid='.$_GET['sid']], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Bulk Create Setting Fields'), ['bulkcreate?sid='.$_GET['sid']], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            's_label',
            's_type',
            's_value:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
