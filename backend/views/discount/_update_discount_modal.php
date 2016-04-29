<?php
use yii\widgets\ActiveForm;
?>
<div class="modal fade" id="update-discount-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Update discount</h4>
      </div>
        <?php $form = ActiveForm::begin([
            'id' => 'discount-form',
        ]); ?>
      <div class="modal-body">
        <?= $form->field($model, 'discount_name')->textInput(['value' => $model->discount_name]); ?>
        <?= $form->field($model, 'discount_percentage')->textInput(['value' => $model->discount_percentage]); ?>
        <?php $model->updated_at = date("Y-m-d H:i:s");?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Update</button>
      </div>
         <?php ActiveForm::end(); ?>
    </div>
  </div>
</div>