<?php

    use yii\bootstrap\NavBar;
    use yii\bootstrap\Nav;

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

<div class = "container table-responsive">
            <table class = "table">

               <thead>
                          <tr class="table-header">
                            <?php
                                            echo "<th>";    
                                                echo "#";
                                            echo "</th>";   
                                            echo "<th>";     
                                                echo "Title";
                                            echo "</th>";                   
                                            echo "<th>";     
                                                echo "Duration";
                                            echo "</th>";                   
                                            echo "<th>";     
                                                echo "Synopsis";
                                            echo "</th>";                   
                                            echo "<th>";     
                                                echo "IMDB Link";
                                            echo "</th>";                   
                                            echo "<th>";     
                                                echo "Cover";
                                            echo "</th>";
                                            echo "<th>";     
                                                echo "Actions";
                                            echo "</th>";
                                            
                            ?>
                          </tr>
               </thead>
               
               <tbody>
                       
                <?php

                    foreach ($movies as $movie) {

                        echo "<tr>";
                                echo "<td>";
                                    echo "<b>";
                                        echo $movie->id;
                                    echo "</b>";
                                echo "</td>";

                                echo "<td>";
                                    echo "<b>";
                                        echo $movie->movie_title;
                                    echo "</b>";
                                echo "</td>";

                                echo "<td>";
                                    echo $movie->movie_duration;
                                echo "</td>";                      
                                
                                echo "<td>";
                                    echo "<i>";
                                            echo substr($movie->movie_synopsis, 0, 200);
                                            echo "...";
                                    echo "</i>";
                                echo "</td>";
                                
                                echo "<td>";
                                    echo $movie->imdb_link;
                                echo "</td>";                      
                                
                                echo "<td>";
                                    echo $movie->movie_cover;
                                echo "</td>";                      
                                
                                echo "<td>";                       
                                
                                 
                                 echo "<a href='/multiplexcinema/backend/web/index.php?r=movie%2Fedit&id=".$movie->id."'><i class='glyphicon glyphicon-pencil'></i></a>";
                                 echo "<a href='/multiplexcinema/backend/web/index.php?r=movie%2Fdelete&id=".$movie->id."'><i class='glyphicon glyphicon-remove'></i></a>";
                                
                                
                                echo "</td>";                      
                                         
                                
                        echo "</tr>";           

                    }

               ?>
               </tbody>
                
            </table>
</div>
