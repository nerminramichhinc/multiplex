<?php

use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use yii\grid\GridView;
?>
<button class="btn btn-success add-new"> Add Movie </button>
<br>
<br>
<?php 
    echo GridView::widget([
        'dataProvider' => $provider,
        'columns' => [
                        [
                            'attribute' => '#',
                            'value' => function($data) {return $data->id; },
                            'format' => 'raw',
                         ],

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
                            'value' => function($data) { return $data->imdb_link; },
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
                         ]            
                    ]
        ]);
?>