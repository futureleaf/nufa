<link href='<?php echo base_url();?>backend/css/bootstrap-spacelab.css' rel='stylesheet' type='text/css' /> 
  <!--/////////////////////////BEGINNING contentWrapper///////////////////-->
	<div id="contentWrapper"><!--beginning contentWrapper-->
		<!--/////////////////// BEGINNING SECTION ITEM-CONTAINER-BLOG /////////////////-->
		<section id="item-container-blog"><!--beginning item-container-blog-->
		<h3 class="title-three-5"><span><?php echo $this->uri->segment(2) . " "; if(isset($_GET['search']))echo $_GET['search']; else echo $this->method->dateMonthYearFromDatabaseText($filter); ?></span></h3> 
		
		<!--|||||||||||||||||||||||BEGINNING ITEM-CONTENT-BLOG|||||||||||||||||||||||||||-->
		
		<article class="item-content-blog"><!--beginning item-content-blog--> 
			<table border='1' class='tbArticle'>
				<tr>
					<th>No</th>
					<th>Nama Artikel</th>
					<th>Comment</th>
					<th>Artikel Tipe</th>
					<th>Update Date</th>
					<th>Aksi</th>
				</tr>
				<?php
					$i=0;
					foreach($articles as $article): 
						$link = "";
						if($article->id_rcontent == 1) $link = "newses";
						else if($article->id_rcontent == 2) $link = "articles";
						else if($article->id_rcontent == 3) $link = "articles";
						else if($article->id_rcontent == 4) $link = "articles";
						else if($article->id_rcontent == 5) $link = "notifications";
						else if($article->id_rcontent == 6) $link = "events";
				?>
				<tr>
<<<<<<< HEAD
					<td><?php echo ++$i; ?></td>
					<td><?php echo anchor("$controller/$link/$article->id_content", ''.$article->name_content.''); ?></td>
					<td><?php $count_comments = $this->mdl_comment->count_id_content_records($article->id_content); echo ($count_comments == 1)?$count_comments . " Comment":$count_comments . " Comments"; ?></td>
					<td><?= anchor("$controller/$link", $link)?></td>
=======
					<td>1</td>
					<td>Hello</td>
					<td>5</td>
					<td>Islami</td>
					<td>2013-08-15</td>
					<td>
					<a href="#" class="btn btn-success" title="Detail"><i class="icon-zoom-in icon-white"></i></a> 
					<a href="#" class="btn btn-info" title="Edit"><i class="icon-pencil icon-white"></i></a> 
					<a href="#" class="btn btn-danger" title="Delete"><i class="icon-trash icon-white"></i></a></td>
				</tr>
				<tr class='akt'>
					<td>1</td>
					<td>Hello</td>
					<td>5</td>
					<td>Islami</td>
>>>>>>> ed0caca763813072e0ee1399a68b20e315c3efc3
					<td>2013-08-15</td>
					<td>
					<a href="#" class="btn btn-success" title="Detail"><i class="icon-zoom-in icon-white"></i></a> 
					<a href="#" class="btn btn-info" title="Edit"><i class="icon-pencil icon-white"></i></a> 
					<a href="#" class="btn btn-danger" title="Delete"><i class="icon-trash icon-white"></i></a></td>
				</tr>
				<?php 
					endforeach; 
				?>
			</table>
		</article>
	<!--end item-container-blog--> 
		
	<!--||||||||||||||||||||||||||||END ITEM-CONTENT-BLOG|||||||||||||||||||||||||||||||||--> 
