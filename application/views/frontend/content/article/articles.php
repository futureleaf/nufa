<link href='<?php echo base_url();?>backend/css/bootstrap-spacelab.css' rel='stylesheet' type='text/css' /> 
  <!--/////////////////////////BEGINNING contentWrapper///////////////////-->
	<div id="contentWrapper"><!--beginning contentWrapper-->
		<!--/////////////////// BEGINNING SECTION ITEM-CONTAINER-BLOG /////////////////-->
		<section id="item-container-blog"><!--beginning item-container-blog-->
		<h3 class="title-three-5"><span><?php echo $this->uri->segment(2) . " "; if(isset($_GET['search']))echo $_GET['search']; else echo $this->method->dateMonthYearFromDatabaseText($filter); ?></span></h3> 
		
		<!--|||||||||||||||||||||||BEGINNING ITEM-CONTENT-BLOG|||||||||||||||||||||||||||-->
		
		<article class="item-content-blog"><!--beginning item-content-blog--> 
		
		<button class="btn btn-large btn-primary">
			<i class="icon-edit icon-white"></i> Buat Artikel
		</button> <br><br>
		
			<table border='1' class='tbArticle'>
				<tr>
					<th>No</th>
					<th>Nama Artikel</th>
					<th>Comment</th>
					<th>Artikel Tipe</th>
					<th>Update Date</th>
					<th>Aksi</th>
				</tr>
				<tr>
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
					<td>2013-08-15</td>
					<td>
					<a href="#" class="btn btn-success" title="Detail"><i class="icon-zoom-in icon-white"></i></a> 
					<a href="#" class="btn btn-info" title="Edit"><i class="icon-pencil icon-white"></i></a> 
					<a href="#" class="btn btn-danger" title="Delete"><i class="icon-trash icon-white"></i></a></td>
				</tr>
			</table>
		</article>
	<!--end item-container-blog--> 
		
	<!--||||||||||||||||||||||||||||END ITEM-CONTENT-BLOG|||||||||||||||||||||||||||||||||--> 
