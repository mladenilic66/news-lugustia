<?php
include_once "header.php";
require_once "functions/functions.php";
?>
	<section id="main">
		<div class="wrapper">
            <div class="page">
			<?php

			    if(!isset($_SESSION['usr_id']) && isset($_GET['user']) && $_GET['user'] === "Login") {
				    include_once "forms/form_login.php";
			    } elseif(!isset($_SESSION['usr_id']) && isset($_GET['user']) && $_GET['user'] === "Register") {
					include_once "forms/form_register.php";
				} else {

			    if(isset($_GET['category'])) {
					
			        $cat_name = mysqli_real_escape_string($con,$_GET['category']);
					
		            $sql = "SELECT * FROM article WHERE cat_title = '".$cat_name."' ORDER BY `date` DESC";
		            $result = mysqli_query($con, $sql);
					$count_rows = mysqli_num_rows($result);
					
			        if($count_rows == 0) {
				?>
			        <div class="notice"><h2>There are no articles in this category!</h2></div>

			    <?php } else { ?>
			    
			    <aside class="feed_main">
				    <section class="feed_content">
				    	<article id="slideshow">
				    		<?php
		                        while($rw = mysqli_fetch_assoc($result)):
		                         	$title = $rw['title'];
		                         	$cat_title = $rw['cat_title'];
                            ?>
                        	<div class="slide_single" style="background-image: url(<?=(!empty($rw['image'])) ? 'uploads/news_images/'.$rw['image'] : 'images/default-img.png'?>);">
                        		<span class="sticker"><?=$rw['cat_title']?></span>
							    <div class="title"><a title="<?=$rw['title']?>" href="details?category=<?=$rw['cat_title']?>&article=<?=$rw['id']?>&title=<?=url_rewrite($rw['title'])?>"><h2><?=short_title($title,500)?></h2></a></div>
							    
                        	</div>
                        	<?php endwhile; ?>
                        </article>

                        <div class="articles_container">
							    <?php

								    //start pagination
				                    $per_page = 20;
				                    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
				                    $start = ($page > 1) ? ($page * $per_page) - $per_page : 0;

				                    $limit = "LIMIT ".$start.",".$per_page;
				                    $num_sql = "SELECT id FROM article WHERE cat_title='".$cat_name."'";
				                    $num_res = mysqli_query($con,$num_sql);
				                    $num_row = mysqli_num_rows($num_res);
				                    $pages = ceil($num_row/$per_page);
								    //end pagination


							        $sql = "SELECT * FROM article WHERE cat_title='".$cat_name."' ORDER BY date DESC ".$limit;
				                    $result = mysqli_query($con, $sql);
				
				                    while($rw = mysqli_fetch_assoc($result)):
				                    	$title = $rw['title'];
			                    ?>
							    <article class="articles_all">
								    <div class="articles_all_img">
									    <span class="sticker"><?=$rw['cat_title']?></span>
									    <a href="details?category=<?=$rw['cat_title']?>&article=<?=$rw['id']?>&title=<?=url_rewrite($rw['title'])?>">
									        <!--calling image swicher-->
			                                <?php img_switch($rw['image'],"uploads/news_images/","images/default-img.png","article image"); ?>
									    </a>
									   
									</div>
									<div class="article_content">
										<div class="article_title">
									        <a title="<?=$rw['title']?>" href="details?category=<?=$rw['cat_title']?>&article=<?=$rw['id']?>&title=<?=url_rewrite($rw['title'])?>"><h3><?=short_title($title,65)?></h3></a>
									    </div>
									    <div class="article_footing">
											<span title="posted" class="article_date"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;<?=date_short($rw['date'])?></span>
											<?php
											    $article_id = $rw['id'];
												$sql2 = 'SELECT count(id) FROM comments WHERE id_article="'.$article_id.'"';
												$result2 = mysqli_query($con,$sql2);
													
												while($rw2 = mysqli_fetch_row($result2)){
				                                    $total_comments = $rw2[0];
											    }
										    ?>
										    <span title="comments" class="article_comment_num"><i class="fa fa-comments" aria-hidden="true"></i><a href="details?category=<?=$rw['cat_title']?>&article=<?=$rw['id']?>&title=<?=url_rewrite($rw['title'])?>#anchor_com">&nbsp;<?=($total_comments == 0) ? "none" : $total_comments?></a></span>
									    </div>
									</div>
								</article>

			                <?php endwhile; ?>

			                </div>
                        
		                <div class="pagination clearfix">
					    	<p class="item_counter"><?=$num_row?>&nbsp;<?=($num_row != 1) ? "Articles" : "Article";?></p>

                            <div class="pages_counter">
                                <span>Pages:</span>
				    	        <?php for($i=1; $i<=$pages; $i++): ?>
	                                <a href="http://news.lenuson.com/?category=<?=$cat_title?>&page=<?=$i?>"<?php if ($page==$i) { echo "class='selected_page'"; echo "onclick='return false;'"; }?>><?=$i?></a>
	                            <?php endfor; ?>
                            </div>
					    </div>
					</section>
				</aside>

				<aside class="feed_side">
					<a href="#"><img src="http://via.placeholder.com/160x300" alt="advertisement"></a>
					<a href="#"><img src="http://via.placeholder.com/160x300" alt="advertisement"></a>
				</aside>

			    <?php } } else { ?>

			    <aside class="feed_main">
			    	<section class="feed_content">
				    	<article id="slideshow">
				    		<?php

				    		$sql = "SELECT * FROM article ORDER BY `date` DESC LIMIT 0,10";
			                $result = mysqli_query($con, $sql);

		                        while($rw = mysqli_fetch_assoc($result)):
		                         	$title = $rw['title'];
		                         	$cat_title = $rw['cat_title'];
	                        ?>
	                    	<div class="slide_single" style="background-image: url(<?=(!empty($rw['image'])) ? 'uploads/news_images/'.$rw['image'] : 'images/default-img.png'?>);">
	                    		<span class="sticker"><?=$rw['cat_title']?></span>
							    <div class="title"><a title="<?=$rw['title']?>" href="details?category=<?=$rw['cat_title']?>&article=<?=$rw['id']?>&title=<?=url_rewrite($rw['title'])?>"><h2><?=short_title($title,500)?></h2></a></div>
							    
	                    	</div>
	                    	<?php endwhile; ?>
	                    </article>

	                    <div class="articles_container">
	                    	<div class="main_categorisation articles_all">
		                    	<h3>Latest Articles</h3>
		                    </div>
						    <?php

						        $sql = "SELECT * FROM article ORDER BY `date` DESC LIMIT 0,15";
			                    $result = mysqli_query($con, $sql);
			
			                    while($rw = mysqli_fetch_assoc($result)):
			                    	$title = $rw['title'];
		                    ?>
		                    
						    <article class="articles_all">
							    <div class="articles_all_img">
								    <span class="sticker"><?=$rw['cat_title']?></span>
								    <a href="details?category=<?=$rw['cat_title']?>&article=<?=$rw['id']?>&title=<?=url_rewrite($rw['title'])?>">
								        <!--calling image swicher-->
		                                <?php img_switch($rw['image'],"uploads/news_images/","images/default-img.png","article image"); ?>
								    </a>
								   
								</div>
								<div class="article_content">
									<div class="article_title">
								        <a title="<?=$rw['title']?>" href="details?category=<?=$rw['cat_title']?>&article=<?=$rw['id']?>&title=<?=url_rewrite($rw['title'])?>"><h3><?=short_title($title,65)?></h3></a>
								    </div>
								    <div class="article_footing">
										<span title="posted" class="article_date"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;<?=date_short($rw['date'])?></span>
										<?php
										    $article_id = $rw['id'];
											$sql2 = 'SELECT count(id) FROM comments WHERE id_article="'.$article_id.'"';
											$result2 = mysqli_query($con,$sql2);
												
											while($rw2 = mysqli_fetch_row($result2)){
			                                    $total_comments = $rw2[0];
										    }
									    ?>
									    <span title="comments" class="article_comment_num"><i class="fa fa-comments" aria-hidden="true"></i><a href="details?category=<?=$rw['cat_title']?>&article=<?=$rw['id']?>&title=<?=url_rewrite($rw['title'])?>#anchor_com">&nbsp;<?=($total_comments == 0) ? "none" : $total_comments?></a></span>
								    </div>
								</div>
							</article>

		                <?php endwhile; ?>

		                </div>
				    </section>
			    </aside>

			    <aside class="feed_side">
					<a href="#"><img src="http://via.placeholder.com/160x300" alt="advertisement"></a>
					<a href="#"><img src="http://via.placeholder.com/160x300" alt="advertisement"></a>
				</aside>

			    <?php } } ?>
		    </div>
		</div>
	</section>
<?php include_once "footer.php"; ?>