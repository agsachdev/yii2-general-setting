<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model vendor\yii2generalsetting\modules\allsettings\models\AllSettingFields */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="all-setting-fields-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 's_id')->dropDownList($allSettings) ?>

    <?= $form->field($model, 's_label')->textInput() ?>

    <?= $form->field($model, 's_type')->dropDownList([ 'text' => 'Text', 'radio' => 'Radio', 'checkbox' => 'Checkbox', 'file' => 'File', 'files' => 'Files', ], ['prompt' => '']) ?>

    <?= $form->field($model, 's_value')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
