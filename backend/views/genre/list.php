<?php

use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;

use yii\widgets\LinkPager;
use yii\grid\GridView;

use yii\helpers\Url;

    
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

<a href="<?= Url::toRoute('genre/insert', true); ?> "><input type="button" value="Add Genre" class="btn btn-success add-new"/></a>
<br>
<br>
<?php 
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
                         ]            
                    ]
        ]);
?>
