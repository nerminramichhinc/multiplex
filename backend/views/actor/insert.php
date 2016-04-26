<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

?>


<div class="col-lg-9">
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                               <?= $form->field($model, 'first_name')->textInput(['autofocus' => true]) ?>

                               <?= $form->field($model, 'last_name')->textInput() ?>

                               <div class="form-group">
                                   <a href="<?= Url::toRoute('actor/list', true); ?> "><input type="button" value="Cancel" class="btn btn-danger"/></a>
                                   <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                               </div>

       <?php ActiveForm::end(); ?>
          
</div>