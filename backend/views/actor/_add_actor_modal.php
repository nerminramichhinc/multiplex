<?php
use yii\widgets\ActiveForm;
?>
<div class="modal fade" id="add-actor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Add new actor</h4>
      </div>
        <?php $form = ActiveForm::begin([
            'id' => 'actor-form',
            'enableAjaxValidation' => true,
            'action' => \yii\helpers\Url::to(['actor/add-actor']),
        ]); ?>
      <div class="modal-body">
        <?= $form->field($model, 'first_name')->textInput(); ?>
        <?= $form->field($model, 'last_name')->textInput(); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
         <?php ActiveForm::end(); ?>
    </div>
  </div>
</div>