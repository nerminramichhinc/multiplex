<?php
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use yii\widgets\LinkPager;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
use backend\assets\GenreAsset;
GenreAsset::register($this);    
?>

<a href="#" data-url="<?= Url::to(['genre/add-genre-modal']); ?>" id="add-new-genre"><button class="btn btn-success add-new"><span class="glyphicon glyphicon-plus"></span> New genre</button></a>
<br>
<br>
<?php 
Pjax::begin(['id'=>'genreGrid']);
    echo GridView::widget([
        'dataProvider' => $provider,
        'columns' => [   
                        [
                            'attribute' => 'Genre name',
                            'value' => function($data) { return $data->genre_name; },
                            'format' => 'raw',
                         ],
                        
                         [
                            'attribute' => 'Last update',
                            'value' => function($data) { return (new \DateTime($data->created_at))->format('d F Y H:i'); },
                            'format' => 'raw',
                         ],
                        [
                            'attribute' => '',
                            'value' => function($data) {
                                $url = Url::to(['genre/update-genre-modal', 'id'=>$data->id]); 
                                return '<a href="#" data-url="' . $url . '" class="update-genre glyphicon glyphicon-pencil"> </a>';
                            },
                            'format' => 'raw',
                         ],                     
                        [
                            'attribute' => '',
                            'value' => function($data) {
                                $url = Url::to(['genre/delete-genre-modal', 'id'=>$data->id]); 
                                return '<a href="#" data-url="' . $url . '" class="delete-genre glyphicon glyphicon-trash"> </a>';
                            },
                            'format' => 'raw',
                         ],                     
                    ],
        'tableOptions' =>['class' => 'table table-striped table-bordered table-condensed table-custom'],                                    
        ]);
Pjax::end();    
?>
