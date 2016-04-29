<?php
use yii\widgets\ActiveForm;
?>
<div class="modal fade" id="update-actor-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Update actor</h4>
      </div>
        <?php $form = ActiveForm::begin([
            'id' => 'actor-form',
        ]); ?>
      <div class="modal-body">
        <?= $form->field($model, 'first_name')->textInput(['value' => $model->first_name]); ?>
        <?= $form->field($model, 'last_name')->textInput(['value' => $model->last_name]); ?>
        <?php $model->updated_at = date("Y-m-d H:i:s");?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
         <?php ActiveForm::end(); ?>
    </div>
  </div>
</div>