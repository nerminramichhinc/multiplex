<?php

    use yii\bootstrap\NavBar;
    use yii\bootstrap\Nav;
    use yii\widgets\LinkPager;

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

<div class = "container table-responsive">
            <table class = "table">

               <thead>
                          <tr class="table-header">
                            <?php
                                            echo "<th>";    
                                                echo "#";
                                            echo "</th>";   
                                            
                                            echo "<th>";     
                                                echo "First name";
                                            echo "</th>";      
                                            
                                            echo "<th>";     
                                                echo "Last name";
                                            echo "</th>";     
                                            
                                            echo "<th>";     
                                                echo "Created";
                                            echo "</th>";    
                                            
                                            echo "<th>";     
                                                echo "Updated";
                                            echo "</th>";                     
                                            
                                            echo "<th>";     
                                                echo "Actions";
                                            echo "</th>";                     
                                    
                            ?>
                          </tr>
               </thead>
               
               <tbody>
                       
                <?php

                    foreach ($actors as $actor) {

                        echo "<tr>";
                                echo "<td>";
                                    echo "<b>";
                                        echo $actor->id;
                                    echo "</b>";
                                echo "</td>";

                                echo "<td>";
                                    echo "<b>";
                                        echo $actor->first_name;
                                    echo "</b>";
                                echo "</td>";

                                echo "<td>";
                                    echo $actor->last_name;
                                echo "</td>";                      
                                
                                echo "<td>";
                                    echo $actor->created_at;
                                echo "</td>";                      
                                
                                echo "<td>";
                                    echo $actor->updated_at;
                                echo "</td>";                      
                                                                                     
                                echo "<td>";
                                
                                 echo "<a href='/multiplexcinema/backend/web/index.php?r=actor%2Fedit&id=".$actor->id."'><i class='glyphicon glyphicon-pencil'></i></a>";
                                 echo "<a href='/multiplexcinema/backend/web/index.php?r=actor%2Fdelete&id=".$actor->id."'><i class='glyphicon glyphicon-remove'></i></a>";
                                
                                
                                echo "</td>";                      
                                         
                                
                        echo "</tr>";           

                    }

               ?>
               </tbody>
                
            </table>
    <?= LinkPager::widget(['pagination'=>$pagination]);?>
</div>
