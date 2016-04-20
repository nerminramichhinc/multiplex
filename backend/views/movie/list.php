<?php

    use yii\bootstrap\NavBar;
    use yii\bootstrap\Nav;
    use yii\grid\GridView;

                NavBar::begin();
                    echo Nav::widget([
                        'items' => [
                            ['label' => 'Actors', 'url' => ['/actor/list']],
                            ['label' => 'Movies', 'url' => ['/movie/list']], //CONTROLLER-ACTION
                            ['label' => 'Genres', 'url' => ['/site/about']],
                            ['label' => 'Discounts', 'url' => ['/site/about']],
                            ['label' => 'Projections', 'url' => ['/site/about']],
                            ['label' => 'Tickets', 'url' => ['/site/about']],
                        ],
                        'options' => ['class' => 'navbar navbar-nav customized-nav'],
                    ]);
                NavBar::end();
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
                            'attribute' => 'Created',
                            'value' => function($data) { return $data->created_at; },
                            'format' => 'raw',
                         ],

                         [
                            'attribute' => 'Last update',
                            'value' => function($data) { return $data->updated_at; },
                            'format' => 'raw',
                         ]            
                    ]
        ]);
?>