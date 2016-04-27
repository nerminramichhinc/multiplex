<?php

    use yii\bootstrap\NavBar;
    use yii\bootstrap\Nav;

    use yii\widgets\LinkPager;
    use yii\grid\GridView;

?>
<button class="btn btn-success add-new"> Add Discount </button>
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
                            'attribute' => 'Discount type',
                            'value' => function($data) { return $data->discount_name; },
                            'format' => 'raw',
                         ],

                         [
                            'attribute' => 'Discount percentage',
                            'value' => function($data) { return $data->discount_percentage; },
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
