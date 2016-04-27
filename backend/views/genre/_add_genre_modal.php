<?php
use yii\widgets\ActiveForm;
?>
<div class="modal fade" id="add-genre-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Add new genre</h4>
      </div>
        <?php $form = ActiveForm::begin([
            'id' => 'actor-form',
            'action' => \yii\helpers\Url::to(['genre/save-genre']),
        ]); ?>
      <div class="modal-body">
        <?= $form->field($model, 'genre_name')->textInput(); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
         <?php ActiveForm::end(); ?>
    </div>
  </div>
</div>