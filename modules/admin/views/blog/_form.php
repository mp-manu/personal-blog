<?php

use app\assets\TextEditorAssets;
use app\modules\admin\models\ModelStatus;
use dosamigos\tinymce\TinyMce;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\blog */
/* @var $form yii\widgets\ActiveForm */

TextEditorAssets::register($this);
?>

<div class="blog-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-12">
           <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
           <?= $form->field($model, 'text')->widget(TinyMce::className(), [
               'options' => ['rows' => 15],
              //'language' => 'en',
               'clientOptions' => [
                   'plugins' => [
                       "advlist autolink lists link charmap print preview anchor",
                       "searchreplace visualblocks code fullscreen",
                       "insertdatetime media table contextmenu paste"
                   ],
                   'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
               ]
           ]);
           ?>
        </div>
    </div>
    <div class="row" style="margin-bottom: 20px">
        <div class="col-md-6">
<!--                <label>Tags</label>-->
                <?= $form->field($model, 'tags')->textInput(['data-role' => 'tagsinput', 'class' => 'form-control']) ?>
<!--                <input type="text" data-role="tagsinput" class="form-control"  style="font-size: 18px">-->
        </div>
        <div class="col-md-6">
<!--            <label>Categories</label>-->
            <?= $form->field($blogCategory, 'category_id')->dropDownList(ArrayHelper::map($categories, 'id', 'name'),
                [
                    'class' => 'selectpicker form-control',
                    'id' => 'number2-multiple',
                    'title' => 'Select category ...',
                    'data-hide-disabled' => 'true',
                    'multiple' => 'true',


                ]) ?>
<!--            <select class="selectpicker form-control" id="number2-multiple" title="Select category" data-hide-disabled="true" multiple style="font-size: 20px">-->
<!--                <option>cow</option>-->
<!--                <option>ASD</option>-->
<!--                <option selected>Bla</option>-->
<!--                <option>Ble</option>-->
<!--            </select>-->
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
           <?= $form->field($model, 'photo')->fileInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
           <?= $form->field($model, 'status')->dropDownList(ModelStatus::listData()) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<style>
    .dropdown-item, .tag{
        font-size: 14px;
    }

</style>