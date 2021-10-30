<?php get_header(); ?>
<div class="box_white_under">
	<section class="sec_ttl">
		<div class="wrap w960">
			<h1 class="ttl">キャンパスレポート</h1>
		</div>
	</section>
	<!-- /.sec_ttl -->
	<section class="breadcrumb">
		<div class="wrap w1080">
			<ul class="list">
				<li><a href="<?php echo esc_url(home_url('/')); ?>" class="fade">TOP</a></li>
				<li> キャンパスレポート</li>
			</ul>
		</div>
	</section>
	<!-- /.breadcrumb -->
	<section class="sec_report section">
	<?php if(have_posts()): ?>
		<div class="wrap w1080">
			<ul class="link_list grid2 grid2_mtx2 sp_grid1">
		<?php while(have_posts()): the_post(); ?>
				<li>
					<a href="<?php the_permalink(); ?>" class="fade">
						<div class="img"><?php the_post_thumbnail("talk_list"); ?></div>
					<?php
						$num = 33;
						$numc = $num*2;
						$gettit = strip_tags(get_the_title());
						if($numc <= strlen(mb_convert_encoding($gettit, "SJIS", "UTF-8"))) {
							$title = mb_strimwidth($gettit, 0, $numc, '','UTF-8');
							if($numc < strlen(mb_convert_encoding($gettit, "SJIS", "UTF-8"))) $title .= "…";
						}else{
							$title = $gettit;
						}
					?>
						<p class="txt"><?php echo esc_html($title); ?></p>
					</a>
				</li>
		<?php endwhile; ?>
			</ul>
		<?php
			if(function_exists("responsive_pagination")) {
				responsive_pagination();
			}
		?>
		</div>
	<?php endif; ?>
	</section>
	<!-- /.sec_about -->
</div>
<?php get_footer(); ?>
