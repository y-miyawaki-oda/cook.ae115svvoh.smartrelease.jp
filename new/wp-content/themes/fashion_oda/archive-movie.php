<?php get_header(); ?>
<div class="box_white_under">
	<?php if(get_field("kv_movie_image", "option")): ?>
		<?php
			$overlay = "";
			if(get_field("kv_movie_overlay", "option")) {
				$kv_overlay = hex2rgb(get_field("kv_movie_overlay", "option"));
				$kv_opacity = intval(get_field("kv_movie_opacity", "option")) / 100;
				$overlay = ' style="background:rgba('.$kv_overlay[0].', '.$kv_overlay[1].', '.$kv_overlay[2].', '.$kv_opacity.');"';
			}
		?>
	<section class="page-kv">
		<div class="overlay"<?php echo $overlay; ?>></div>
		<div class="bg" style="background-image: url(<?php the_field("kv_movie_image", "option"); ?>)"></div>
	<?php else: ?>
	<section class="page-kv page-kv-noimage">
	<?php endif; ?>
		<div class="wrap w960">
	<?php if(get_field("kv_movie_image", "option")): ?>
			<img src="<?php the_field("kv_movie_image", "option"); ?>" alt="" class="cut_img contain img">
	<?php endif; ?>
			<h1 class="ttl">動画で学校を知ろう！</h1>
		</div>
	</section>
	<!-- /.page-kv -->
	<section class="sec_breadcrumb">
		<ul class="list">
			<li><a href="<?php echo esc_url(home_url('/')); ?>" class="fade">TOP</a></li>
			<li>動画で学校を知ろう！</li>
		</ul>
	</section>
    <!-- /.sec_movie -->
    <section class="sec_contents">
	<?php if(have_posts()): ?>
			<h3 class="headline-3-1"><span>教員による技術動画や<br>メッセージ動画を紹介</span></h3>
		<?php while(have_posts()): the_post(); ?>
				<div class="mt80 sp-mt8">

					<p class="tac sp_tal"><?php echo get_field("title"); ?></p>
					<div class="column-1">
						<div class="movie-area">
							<div class="movie-area-iframe">
								<?php if(strlen(get_field("movie")) < 10) : ?>
								<?php else: ?>
									<iframe src="<?php echo get_field("movie"); ?>" width="100%" height="100%" >
									</iframe>
								<?php endif; ?>
							</div>
						</div>
						<?php
							if(is_mobile()) {
								$num = 33;
							}
							else {
								$num = 35;
							}
							$numc = $num*2;
	                        $post_id = get_the_ID();
							$gettit = strip_tags(get_the_title());
							if($numc <= strlen(mb_convert_encoding($gettit, "SJIS", "UTF-8"))) {
								$title = mb_strimwidth($gettit, 0, $numc, '','UTF-8');
								if($numc < strlen(mb_convert_encoding($gettit, "SJIS", "UTF-8"))) $title .= "…";
							}else{
								$title = $gettit;
							}
						?>
						<p class="movie-area-caption"><?php echo esc_html($title); ?></p>
					</div>
				</div>
		<?php endwhile; ?>
		<?php
			if(function_exists("responsive_pagination")) {
				responsive_pagination();
			}
		?>
        <p class="tac sp_tal">技術動画や学校に関する動画、形式ばっていないフリーな動画を投稿しています。</p>
	<?php endif; ?>
	</section>
</div>
<?php get_footer(); ?>