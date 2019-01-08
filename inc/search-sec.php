<div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
                
    <?php
    
    if(isset($_POST['submit'])){
          $search = $_POST['search'];
          $query="SELECT * FROM `posts` WHERE `post_tags` LIKE '%$search%'" ; 
$search_query=mysqli_query($connection , $query);
          
          $count = mysqli_num_rows($search_query);
          if($count == 0){
              echo "<h1>NO RESULT</h1>";
          }else {
              
          
                    
                    //$sql  = "SELECT * FROM `post`";
                    //$return_sql = mysqli_query($connection, $sql);
                    
                    while($row = mysqli_fetch_assoc($search_query)){
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_img = $row['post_img'];
                        //$post_content = $row['post_content'];
                        $post_content = substr($row['post_content'],0,150);
                        
                    ?>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?=$post_title?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?=$post_author?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?=$post_date?></p>
                <hr>
                <img class="img-responsive" src="images/<?=$post_img?>" alt="">
                <hr>
                <p><?=$post_content?> ...</p>
                <a class="btn btn-primary" href="post.php">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                

                <hr>
                
                <?php
                        }//while
              
              }//else
    }//isset
                    
                    ?>

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>