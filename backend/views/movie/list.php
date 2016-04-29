<?php
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use backend\assets\MovieAsset;
MovieAsset::register($this);    
?>
<a href="#" data-url="<?= Url::to(['movie/add-movie']); ?>" id="add-new-movie"><button class="btn btn-success add-new"><span class="glyphicon glyphicon-plus"></span> New movie</button></a>
<br/>
<br/>
<?php 
Pjax::begin(['id'=>'movieGrid']);
    echo GridView::widget([
        'dataProvider' => $provider,
        'columns' => [
                        [
                            'attribute' => 'Title',
                            'value' => function($data) { return $data->movie_title; },
                            'format' => 'raw',
                         ],
                        [
                            'attribute' => 'Duration',
                            'value' => function($data) { return $data->movie_duration; },
                            'format' => 'raw',
                         ],

                         [
                            'attribute' => 'Synopsis',
                            'value' => function($data) { return substr($data->movie_synopsis, 0, 20); },
                            'format' => 'raw',
                         ],

                         [
                            'attribute' => 'IMBD',
                            'value' => function($data) { return '<a href="' . $data->imdb_link . '" target="_blank">' . $data->imdb_link . '</a>'; },
                            'format' => 'raw',
                         ],
                          
                         [
                            'attribute' => 'Cover',
                            'value' => function($data) { return $data->movie_cover; },
                            'format' => 'raw',
                         ],

                         [
                            'attribute' => 'Last update',
                            'value' => function($data) { return (new \DateTime($data->updated_at))->format('d F Y H:i'); },
                            'format' => 'raw',
                         ],           
                                    
                         [
                            'attribute' => 'Actions',
                            'value' => function($data) {
                                $url = Url::to(['movie/update-movie-modal', 'id'=>$data->id]); 
                                $urlDelete = Url::to(['movie/delete-movie-modal', 'id'=>$data->id]); 
                                return '<a href="#" data-url="' . $url . '" class="update-actor glyphicon glyphicon-pencil"> </a>'
                                       . '<a href="#" data-url="' . $urlDelete . '" class="delete-actor glyphicon glyphicon-trash"> </a>';
                            },
                            'format' => 'raw',
                         ],            
                    ]
        ]);
Pjax::end();                           
?>