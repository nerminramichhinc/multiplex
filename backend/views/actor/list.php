<?php
    use yii\bootstrap\NavBar;
    use yii\bootstrap\Nav;
    use yii\helpers\Url;
    use yii\helpers\Html;
    use yii\widgets\LinkPager;
    use yii\widgets\Pjax;
    use yii\grid\GridView;
    use backend\assets\ActorAsset;
    ActorAsset::register($this);
 ?>
<div class="container container-fluid"> 
</div>
<a href="#" data-url="<?= Url::to(['actor/add-actor-modal']); ?>" id="add-new-actor"><button class="btn btn-success add-new"><span class="glyphicon glyphicon-plus"></span> New actor</button></a>
<br>
<br>
<?php 
Pjax::begin(['id'=>'actorGrid']);
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
                         ],

                         [
                            'attribute' => 'Last update',
                            'value' => function($data) { return (new \DateTime($data->updated_at))->format('d F Y H:i'); },
                            'format' => 'raw',
                         ],            
                         
                         [
                            'attribute' => 'Actions',
                            'value' => function($data) {
                                $url = Url::to(['actor/update-actor-modal', 'id'=>$data->id]); 
                                $urlDelete = Url::to(['actor/delete-actor-modal', 'id'=>$data->id]); 
                                return '<a href="#" data-url="' . $url . '" class="update-actor glyphicon glyphicon-pencil"> </a>' . '<a href="#" data-url="' . $urlDelete . '" class="delete-actor glyphicon glyphicon-trash"> </a>';
                            },
                            'format' => 'raw',
                         ],                     
                        ],
                        'tableOptions' =>['class' => 'table table-striped table-bordered table-condensed table-custom'],                                    
        ]);
Pjax::end();                            
?>
