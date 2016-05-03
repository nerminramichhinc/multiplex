<?php
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use kartik\widgets\Select2;
use kartik\widgets\TimePicker;
use yii\helpers\Html;
use backend\assets\MovieAsset;
MovieAsset::register($this);    
?>
<div class="login-container movie-form">
    <div class="col-lg-10">
        <h1> Add new movie </h1>
        <hr>
        <h3><i> Title </i></h3>
        <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data'],
        ]); ?>
        <?= $form->field($model, 'movie_title')->textInput(); ?>
        <h3><i> Movie genre </i></h3>
        <?=  $form->field($model_genre, 'genre[]')
                ->widget(Select2::classname(), [
                    'data' => $data_genre,
                    'options' => ['placeholder' => 'Select movie genre(s) ...',
                                  'multiple' => true
                        ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
        ?>
        <h3><i> Duration </i></h3>
        <div class="row">
            <div class="col-lg-3">
            <?= $form->field($model, 'movie_duration')->widget(TimePicker::classname(), [
            'name' => 't2',
            'size' => 'lg',
            'addonOptions' => [
            'asButton' => true,
            'buttonOptions' => ['class' => 'btn btn-time'],
                ],
            'pluginOptions' => [
                'showSeconds' => true,
                'showMeridian' => false,
                'minuteStep' => 1,
                'secondStep' => 5,
                ]
             ]); ?>
            </div>
        </div>
        <h3><i> Cast </i></h3>
        <?=  $form->field($model_actor, 'actor[]')
                ->widget(Select2::classname(), [
                    'data' => $data_actor,
                    'options' => ['placeholder' => 'Select actors ...',
                                  'multiple' => true
                        ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
        ?>
        <h3><i> Plot synopsis </i></h3>
        <?= $form->field($model, 'movie_synopsis')->textArea(['style'=>'resize:none; height:200px; word-wrap:break-word;']); ?>
        <h3><i> IMDb </i></h3>
        <?= $form->field($model, 'imdb_link')->textInput(); ?>
        <h3><i> Movie cover </i></h3>
        <?= $form->field($model, 'movie_cover')->widget(FileInput::classname(), [
                        'name' => 'attachment_53',
                        'pluginOptions' => [
                        'showCaption' => false,
                        'showRemove' => true,
                        'showUpload' => false,
                        'browseClass' => 'btn btn-success upload',
                        'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                        'browseLabel' =>  'Select cover image'
                        ],
                        'options' => ['accept' => 'image/*']
                    ]); ?>
        <hr>
        <h3><i> Image gallery </i></h3>
        <?=  $form->field($model_image, 'imageFiles[]')->widget(FileInput::classname(), [
                     'options' => ['multiple' => true, 'accept' => 'image/*'],
                     'pluginOptions' => [
                         'previewFileType' => 'image',
                         'showUpload' => false
                         ]
               ]); 
        ?>
        <div class="row pull-right"> 
        <?= Html::a('Cancel', ['/movie/list'], ['class'=>'btn btn-primary']) ?>
         <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
       <?php ActiveForm::end(); ?>
    </div>
</div>