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
                            ['label' => 'Genres', 'url' => ['/site/about']],
                            ['label' => 'Discounts', 'url' => ['/site/about']],
                            ['label' => 'Projections', 'url' => ['/site/about']],
                            ['label' => 'Tickets', 'url' => ['/site/about']],
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
                'attribute' => 'First name',
                'value' => function($data) { return $data->first_name; },
                'format' => 'raw',
             ],
            [
                'attribute' => 'Last name',
                'value' => function($data) { return $data->last_name; },
                'format' => 'raw',
             ]
                      
    ]
    ]);

?>
