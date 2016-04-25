<?php

    use yii\bootstrap\NavBar;
    use yii\bootstrap\Nav;

    use yii\widgets\LinkPager;
    use yii\grid\GridView;

                NavBar::begin();
                    echo Nav::widget([
                        'items' => [
                            ['label' => 'Actors', 'url' => ['/actor/list']],
                            ['label' => 'Movies', 'url' => ['/movie/list']], //CONTROLLER-ACTION
                            ['label' => 'Genres', 'url' => ['/genre/list']],
                            ['label' => 'Discounts', 'url' => ['/discount/list']],
                            ['label' => 'Projections', 'url' => ['/projection/list']],
                            ['label' => 'Tickets', 'url' => ['/tickets/list']],
                        ],
                        'options' => ['class' => 'navbar navbar-nav customized-nav'],
                    ]);
                NavBar::end();
?>

<button class="btn btn-success add-new"> Add Actor </button>
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
                            'attribute' => 'First name',
                            'value' => function($data) { return $data->first_name; },
                            'format' => 'raw',
                         ],
                        [
                            'attribute' => 'Last name',
                            'value' => function($data) { return $data->last_name; },
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
