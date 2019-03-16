<?php /**
	<div class="container">
		<div class="row">
			<?php
			$data = file_get_contents('https://music.zijela.com/blog/wp-json/wp/v2/posts?_embed&per_page=4'); // put the contents of the file into a variable
			$posts = json_decode($data); // decode the JSON feed$characters = json_decode($data); // decode the JSON feed
			foreach ($posts as $post) :
			?>
			<div class="col-lg-2">
          		<p class="title"><?php echo $post->title->rendered; ?> </p>
          		<img src="<?php echo $post->_embedded->{'wp:featuredmedia'}[0]->source_url; ?>" alt="" >  
			</div>
			<?php
			endforeach;
			?>
		</div>
	</div>
	
	**/