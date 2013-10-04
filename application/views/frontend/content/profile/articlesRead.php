 
  <!--/////////////////////////BEGINNING contentWrapper///////////////////-->
  
  <div id="contentWrapper"><!--beginning contentWrapper-->
  
		<h3 class="title-three-5"><span><?php echo $this->uri->segment(2) . " "; if(isset($_GET['search']))echo $_GET['search']; else echo $this->method->dateMonthYearFromDatabaseText($filter); ?></span></h3> 
    
	<!--|||||||||||||||||||||||BEGINNING ITEM-CONTENT-BLOG|||||||||||||||||||||||||||-->
	
	<article class="item-content-blog">
		<?php
			foreach($articles as $article): 
			$link = "";
			if($article->id_rcontent == 1) $link = "newses";
			else if($article->id_rcontent == 2) $link = "articles";
			else if($article->id_rcontent == 3) $link = "achievements";
			else if($article->id_rcontent == 4) $link = "articles";
			else if($article->id_rcontent == 5) $link = "articles";
			else if($article->id_rcontent == 6) $link = "articles";
		?>
		<div class="photos-blog"><!--beginning photos-blog--> 
			<?php echo anchor("$controller/$link/$article->id_content", '<span class="roll-img-blog"></span><img src="'. $dir_uploads.$article->picture_content .'"class="img-content" alt="">'); ?>
		</div>
		<div class="intro-text-blog-single"><!--beginning intro-text-blog-->
			<?php echo anchor("$controller/$link/$article->id_content", '<h3 class="title-three-4"><span>'.$article->name_content.' </span></h3>', array("style"=>"text-decoration:none;")); ?>
			
			<p class="doc-post"> 
				<span class="time-post"><img src="<?=$dir_images?>calendar_alt_fill_16x16.png" alt=""> <?php echo anchor("$controller/$link/$article->id_content", $this->method->dateFromDatabaseText($article->ud_content)); ?></span> 
				<span class="admin-post">
					<?php echo ($article->gender != 0 || $article->gender == null)? '<img src="'.$dir_images.'user_12x16_grey.png" alt="">' : '<img src="'.$dir_images.'user-woman_12x14_grey.png" alt="">';?> 
					<?php echo anchor("$controller/$link/$article->id_content", ($article->id_user ==null)?"Admin":$article->full_name); ?>
				</span> 
				<span class="comment-post"><img src="<?=$dir_images?>comment_stroke_16x14.png" alt=""> <?php $count_comments = $this->mdl_comment->count_id_content_records($article->id_content); echo anchor("$controller/$link/$article->id_content", ($count_comments == 1)?$count_comments . " Comment":$count_comments . " Comments"); ?></span> 
				<span class="category-post"><img src="<?=$dir_images?>tag_fill_16x16.png" alt=""> 
				<?= anchor("$controller/$link", $link)?>
				</span> 
			</p>
			<p><?php echo $article->desc_content;?></p>
							
		</div>
		<!--end intro-text-blog-->
		<div class="separator-post"></div>
		<!--end tiny-tips-->
		<?php endforeach; ?>
	  
		<h2 class="comments"><?php echo ($count_comments == 1)?$count_comments . " Comment":$count_comments . " Comments"; ?></h2>
		<div class="comment-container"><!--BEGINNING COMMENT-CONTAINER-->
			<ol class="comment-content">
				<?php foreach($comments as $comment): ?>
				<li class="comment-one"><!--beginning comment-one-->
					<?php if($comment->parent_comment != 0) { ?>
					<ol class="comment-content-reply">
						<li class="comment-one-reply"><!--beginning comment-one-reply-->
					<?php } ?>
					<div class="avatar"><img src="<?php echo $thumb_image . $this->method->getImage($comment->picture_user); ?>" alt="<?php echo $comment->full_name; ?>" width="60px" height="60px" /></div>
				  
					<div class="content-comment-one<?=($comment->parent_comment != 0)? "-reply":""?>"><!--beginning content-comment-one-->
						<div class="line-one">
							<div class="name-comment"><b><a><?php echo $comment->author_comment; ?></b></a></div>
							<div class="pos-reply"><img src="<?=$dir_images?>curved_arrow_24x18.png" alt="">
								<a href="<?php echo base_url() . "$controller/articles/$id_content/$comment->id_comment" . $url_suffix; ?>#comment" title="Reply">Reply</a>
							</div>
						</div>
				  
						<div class="line-two">
							<div class="time"><img src="<?=$dir_images?>clock_16x16.png" alt=""><?php echo $this->method->dateFromDatabaseText($comment->cd_comment); ?></div>
						</div>
				    
						<div class="line-three<?=($comment->parent_comment != 0)? "-reply":""?>">
							
								<?php 
									$parent_comments = $this->mdl_comment->record($comment->parent_comment)->result();
									foreach($parent_comments as $parent_comment):
								?>
										<div class="content-reply">
											Posted by : <?php echo $parent_comment->author_comment; ?> <span class="avatardateorange" style="float:right;"><?php echo $this->method->dateFromDatabaseText($parent_comment->cd_comment); ?></span><br />
											<i><?php echo $parent_comment->desc_comment; ?></i>
										</div>
								<?php
									endforeach;
								?>
							<p><?php echo $comment->desc_comment; ?></p>
						</div>
				    
						<div class="separator-post"></div>
				    
					</div>
					<!--end content-comment-one-->
				  
				  
					<?php if($comment->parent_comment != 0) { ?>
						</li>
					  <!--end-comment-one-reply-->
					</ol>
					<?php } ?>
				</li>
				<!--END COMMENT-ONE-->
				<?php endforeach; ?>
			</ol>
			<!--end comment-content-->
			  
			<!--END COMMENT-TWO-->
          
			<div id="comment" />
		</div><!--end comment-container-->
        
        <!--//////////////////////////END COMMENT-CONTAINER////////////////////////////////////////-->
        
		<div id="respond-comment" >
			<h4 class="title-post">Leave a Reply</h4>
			<form class="form" method="post">
				<input name="id_content" type="hidden" value="<?php echo $id_content; ?>" />
				<?php
					if($this->session->userdata('is_login_front') == TRUE) {
						echo "<input type=\"hidden\" name=\"author_comment\" value=\"" . $this->session->userdata('full_name_front') . "\"/>";
						echo "<input type=\"hidden\" name=\"email_comment\" value=\"" . $this->session->userdata('email_front') . "\"/>";
						echo "<input type=\"hidden\" name=\"id_user\" value=\"" . $this->session->userdata('id_user_front'). "\"/>";
					}
					else {
				?>
				<input type="hidden" name="id_user" value="0" />
				<p>
					<input name="author_comment" type="text" required id="name" placeholder="your name" value="<?php echo (set_value('author_comment'))?set_value('author_comment'):""; ?>" />
					<?php if(form_error('author_comment') != null) echo "<span class=\"help-inline\"> " . form_error('author_comment') . " </span>"; ?>
				</p>
				<p>
					<input type="email" name="email_comment" id="email" required placeholder="your mail" value="<?php echo (set_value('email_comment'))?set_value('email_comment'):""; ?>"/>
					<?php if(form_error('email_comment') != null) echo "<span class=\"help-inline\"> " . form_error('email_comment') . " </span>"; ?>
				</p>
				<?php } ?>
				<p class="text">
					<textarea name="desc_comment" required placeholder="your comment" rows="8"><?php echo (set_value('desc_comment'))?set_value('desc_comment'):""; ?></textarea>
					<?php if(form_error('desc_comment') != null) echo "<span class=\"help-inline\"> " . form_error('desc_comment') . " </span>"; ?>
				</p>
				<p class="submit">
					<input type="submit" name="do" value="Post Comment" id="btn-comment"/>
				</p>
			</form>
		</div>
		<div class="separator-post"></div>
		<div class="new-page">
			<?php
				$prvs = "";
				$crnt = "";
				$next = "";
				$i = 0;
				foreach($articles_nps as $articles_np):
					$crnt = $articles_np->id_content;
					$next = $articles_np->id_content;
					if($i!=0 && (!defined("next"))) {define("next", $next);};
					if($crnt == $this->uri->segment(3) && (!defined("prvs"))) {
						define("prvs", $prvs);
						define("crnt", $crnt);
						$i++;
					}
					$prvs = $articles_np->id_content;
				endforeach;
				$prvs = prvs;
				$crnt = crnt;
				((defined("next")))?$next=next:$next=null;
			?>
			<div class="new-link-two"> <?php echo($next!=null)?anchor($controller."/".$this->uri->segment(2)."/".$next, "&gt;", array("class"=>"last-page")):""; ?> </div>
			<div class="new-link-three"> <?php echo($prvs!=null)?anchor($controller."/".$this->uri->segment(2)."/".$prvs, "&lt;", array("class"=>"last-page")):""; ?> </div>
		</div>
        
	</article>
  
  <!--////////////////////////END contentWrapper//////////////////--> 
