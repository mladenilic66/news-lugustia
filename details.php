<?php
require_once "process.php";
require_once "functions/functions.php";
include_once "header.php";
?>
	<section id="main">
	    <div class="wrapper">
	    	<div class="details_inner">
			    <section id="feed_details">
				    <?php
				    if(isset($_GET['article']) && isset($_GET['category'])) {
							
	                $article_id = mysqli_real_escape_string($con,$_GET['article']);
					$cat_title = mysqli_real_escape_string($con,$_GET['category']);
					
					$sql = "SELECT article.*, author.firstname, author.avatar, author.lastname FROM article INNER JOIN author ON article.id_user=author.id WHERE article.id='".$article_id."' AND article.cat_title='".$cat_title."'";
		            $result = mysqli_query($con, $sql);

		            $count_rows = mysqli_num_rows($result);
					
			        if($count_rows == 0) {

			        ?>

			        <div class="notice"><h2>No article found</h2></div>

			        <?php } else {

	                while($rw = mysqli_fetch_assoc($result)) {
	                	//article
		                $id        = $rw['id'];
						$cat_title = $rw['cat_title'];
		                $title     = $rw['title'];
		                $content   = html_entity_decode($rw['content']);
		                $image     = $rw['image'];
		                $date      = $rw['date'];
		                //user
		                $avatar    = $rw['avatar'];
		                $firstname = $rw['firstname'];
		                $lastname  = $rw['lastname'];
		            ?>
				    <article class="article_detail">
					    <header class="article_head">
						    <div class="article_detail_img">
						        <!--calling image swicher-->
	                            <?php img_switch($image,"uploads/news_images/","images/default-img.png","article image"); ?>
							</div>
							<div id="article_detail_wrap">
							    <div class="author">
							        <div class="author_img">
										<!--calling image swicher-->
										<?php img_switch($avatar,"uploads/user_images/","uploads/user_images/user.png","author image"); ?>
								    </div>
									<div class="author_name">
								        <p><?=$firstname?>&nbsp;<?=$lastname?></p>
									</div>
							    </div>
							    <div class="header_cont">
								    <span class="article_d_footing"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;<?=date_short($date)?></span>&nbsp;
									<?php
									    $article_id = $_GET['article'];
										$sql = "SELECT count(id) FROM comments WHERE id_article='".$article_id."'";
										$result = mysqli_query($con,$sql);
											
										while($rw = mysqli_fetch_row($result)){
	                                        $total_comments = $rw[0];
										}
									?>
							        <span class="article_d_footing"><i class="fa fa-comments-o" aria-hidden="true"></i><a href="#anchor_com">&nbsp; <?=($total_comments == 0) ? "none" : $total_comments?></a></span>
							    </div>
							</div>
						</header>
						<div class="article_detail_cont">
							<h2><?=$title?></h2><br><br>
						    <p><?=$content?></p>
						</div>
						
						<footer>
						</footer>
					</article>
					<?php } ?>
				</section>

			    <section id="article_comments">
					<div id="comment_form">
					    <?php include_once "forms/form_comments.php"; ?>
					</div>
				</section>

			    <section id="article_comments_all">
					    <a name="anchor_com"><h3>All comments</h3></a>
					<div id="article_comments_main">
					    <?php
						    if(isset($_GET['article']) && isset($_GET['category'])){

							    $article_id = $_GET['article'];
								
						        $sql = "SELECT comments.*, author.firstname, author.avatar, author.lastname FROM comments INNER JOIN author ON comments.id_user=author.id WHERE id_article='".$article_id."' ORDER BY date DESC";

							    $result = mysqli_query($con,$sql);
							
							while($rw = mysqli_fetch_assoc($result)){
								$firstname  = $rw['firstname'];
								$lastname   = $rw['lastname'];
								$avatar     = $rw['avatar'];
								$date       = $rw['date'];

						?>
					    <div class="article_comments_single">
						    <div class="comments_img">
	                            <!--calling image swicher-->
								<?php img_switch($avatar,"uploads/user_images/","uploads/comments_images/user.png","author image"); ?>
							</div>
	                        <div class="comments_info">
								<div class="article_comments_author">
								    <span><strong><?=$firstname?>&nbsp;<?=$lastname?></strong></span>
								    <span class="com_date">&nbsp;<?=date_short($date)?></span>
								</div>
								<div class="article_comments_cont">
								    <p><?=$rw['comment']?></p>
								</div>
	                        </div>
						</div>
	                    <?php } } ?>
					</div>
					<?php } } ?>
				</section>
			</div>
		</div>
	</section>
<?php include_once "footer.php"; ?>