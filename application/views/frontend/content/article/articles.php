<link href='<?php echo base_url();?>backend/css/bootstrap-spacelab.css' rel='stylesheet' type='text/css' /> 
  <!--/////////////////////////BEGINNING contentWrapper///////////////////-->
	<div id="contentWrapper"><!--beginning contentWrapper-->
		<!--/////////////////// BEGINNING SECTION ITEM-CONTAINER-BLOG /////////////////-->
		<section id="item-container-blog"><!--beginning item-container-blog-->
		<h3 class="title-three-5"><span><?php echo /*$this->uri->segment(2) . */"Buat Artikel "; if(isset($_GET['search']))echo $_GET['search']; else echo $this->method->dateMonthYearFromDatabaseText($filter); ?></span></h3> 
		
		<!--|||||||||||||||||||||||BEGINNING ITEM-CONTENT-BLOG|||||||||||||||||||||||||||-->
		
		<article class="item-content-blog"><!--beginning item-content-blog--> 
			
			<a href="<?php echo site_url('front/createPosting/create')?>" title="Buat Baru">
				<button class="btn btn-large btn-primary">
					<i class="icon-edit icon-white"></i> Buat Artikel
				</button> <br><br>
			</a>

			<table border='1' class='tbArticle'>
				<tr>
					<th>No</th>
					<th>Nama Artikel</th>
					<th>Comment</th>
					<th>Kategori Posting</th>
					<th>Disetujui</th>
					<th>Aksi</th>
				</tr>
				<?php
					$i=0;
					foreach($articles as $article): 
						$link = "";
						if($article->id_rcontent == 1) $link = "newses";
						else if($article->id_rcontent == 2) $link = "articles";
						else if($article->id_rcontent == 3) $link = "achievements";
						else if($article->id_rcontent == 4) $link = "newses";
						else if($article->id_rcontent == 5) $link = "notifications";
						else if($article->id_rcontent == 6) $link = "events";
				?>
				<tr <?php echo($i%2==0)?"":"class='akt'"; ?>>
					<td><?php echo ++$i; ?></td>
					<td><?php echo anchor("$controller/$link/$article->id_content", ''.$article->name_content.''); ?></td>
					<td><?php $count_comments = $this->mdl_comment->count_id_content_records($article->id_content); echo ($count_comments == 1)?$count_comments . " Comment":$count_comments . " Comments"; ?></td>
					<td><?= anchor("$controller/$link", $link)?></td>
					<td align="center"><?php echo ($article->is_acontent==1)?"Ya":"Tidak";?></td>
					<td>
						<!--<a href="<?php echo site_url("$controller/createPosting/view/$article->id_content");?>" class="btn btn-success" title="Detail"><i class="icon-zoom-in icon-white"></i></a> -->
						<a href="<?php echo site_url("$controller/$link/$article->id_content");?>" class="btn btn-success" title="Detail"><i class="icon-zoom-in icon-white"></i></a>
						<a href="<?php echo site_url("$controller/createPosting/update/$article->id_content");?>" class="btn btn-info" title="Edit"><i class="icon-pencil icon-white"></i></a> 
						<a href="<?php echo site_url("$controller/createPosting/delete/$article->id_content");?>" class="btn btn-danger" title="Delete"><i class="icon-trash icon-white"></i></a>
					</td>
				</tr>
				<?php 
					endforeach; 
				?>
			</table>
		</article>
	<!--end item-container-blog--> 
		
	<!--||||||||||||||||||||||||||||END ITEM-CONTENT-BLOG|||||||||||||||||||||||||||||||||--> 
