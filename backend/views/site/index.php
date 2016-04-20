<?php

    use yii\bootstrap\NavBar;
    use yii\bootstrap\Nav;

        NavBar::begin();
                echo Nav::widget([
                    'items' => [
                        ['label' => 'Actors', 'url' => ['/site/index']],
                        ['label' => 'Movies', 'url' => ['/movie/list']], //CONTROLLER-ACTION
                        ['label' => 'Genres', 'url' => ['/site/about']],
                        ['label' => 'Discounts', 'url' => ['/site/about']],
                        ['label' => 'Projections', 'url' => ['/site/about']],
                        ['label' => 'Tickets', 'url' => ['/site/about']],
                    ],
                    'options' => ['class'=>'navbar navbar-nav customized-nav'],
                ]);
                NavBar::end();
    ?>


<!--
<div class="site-index">

    <nav class="navbar navbar-inverse">
        <ul class="nav navbar-nav ">
                <li role="presentation" class="active"><a href="/site/test">Movies</a></li>
                <li role="presentation"><a href="">Actors</a></li>
                <li role="presentation"><a href="#">Genres</a></li>
                <li role="presentation"><a href="#">Projections</a></li>
                <li role="presentation"><a href="#">Tickets</a></li>
        </ul>
    </nav>

    
</div>
