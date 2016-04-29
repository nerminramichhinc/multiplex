<?php
use yii\widgets\ActiveForm;
?>
<div class="modal fade" id="delete-movie-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Delete movie</h4>
      </div>
        <?php $form = ActiveForm::begin([
            'id' => 'movie-delete',
            'action' => \yii\helpers\Url::to(['movie/delete', 'id'=>$id]),
        ]); ?>
      <div class="modal-body">
          <b> Are you sure you want to delete this item? </b>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
         <?php ActiveForm::end(); ?>
    </div>
  </div>
</div>