<?php
    use yii\bootstrap\NavBar;
    use yii\bootstrap\Nav;
    use yii\helpers\Url;
    use yii\widgets\LinkPager;
    use yii\widgets\Pjax;
    use yii\grid\GridView;
    use backend\assets\DiscountAsset;
    DiscountAsset::register($this);
?>

<a href="#" data-url="<?= Url::to(['discount/add-discount-modal']); ?>" id="add-new-discount"><button class="btn btn-success add-new"><span class="glyphicon glyphicon-plus"></span> New discount</button></a>
<br>
<br>
<?php 
Pjax::begin(['id'=>'discountGrid']);
    echo GridView::widget([
        'dataProvider' => $provider,
        'columns' => [
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
                            'attribute' => 'Last update',
                            'value' => function($data) { return (new \DateTime($data->updated_at))->format('d F Y H:i'); },
                            'format' => 'raw',
                         ],            
                        
                         [
                            'attribute' => 'Actions',
                            'value' => function($data) {
                                $url = Url::to(['discount/update-discount-modal', 'id'=>$data->id]); 
                                $urlDelete = Url::to(['discount/delete-discount-modal', 'id'=>$data->id]); 
                                return '<a href="#" data-url="' . $url . '" class="update-discount glyphicon glyphicon-pencil"> </a>' . 
                                       '<a href="#" data-url="' . $urlDelete . '" class="delete-discount glyphicon glyphicon-trash"> </a>';
                            },
                            'format' => 'raw',
                         ],                     
                    ],
        'tableOptions' =>['class' => 'table table-striped table-bordered table-condensed table-custom'],                                    
        ]);
Pjax::end();                            
?>
