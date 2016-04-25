<?php

    use yii\bootstrap\NavBar;
    use yii\bootstrap\Nav;

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
                    'options' => ['class'=>'navbar navbar-nav customized-nav'],
                ]);
                NavBar::end();
    ?>
