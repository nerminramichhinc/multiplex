<?php
use yii\widgets\ActiveForm;
?>
<div class="modal fade" id="add-discount-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Add new discount</h4>
      </div>
        <?php $form = ActiveForm::begin([
            'id' => 'discount-form',
            'action' => \yii\helpers\Url::to(['discount/save-discount']),
        ]); ?>
      <div class="modal-body">
        <?= $form->field($model, 'discount_name')->textInput(['placeholder'=>'example: VIP']); ?>
        <?= $form->field($model, 'discount_percentage')->textInput(['placeholder'=>'example: 20%']);?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
         <?php ActiveForm::end(); ?>
    </div>
  </div>
</div>