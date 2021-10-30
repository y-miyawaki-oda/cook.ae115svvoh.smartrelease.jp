<?php get_header(); ?>
<?php global $youbi_ja; ?>
<?php if(have_posts()): ?>
<?php $flag_dis = false; ?>
	<?php while(have_posts()): the_post(); ?>
<div class="box_white_under">
	<section class="page-kv">
		<div class="overlay"></div>
		<div class="bg" style="background-image: url(<?php the_post_thumbnail_url("full"); ?>)"></div>
		<div class="wrap w960">
			<?php the_post_thumbnail("full", array("class" => "cut_img cover img")); ?>
		<?php if(get_field("sub_title")): ?>
			<p class="caption"><?php the_field("sub_title"); ?></p>
		<?php endif; ?>
			<h1 class="ttl"><?php the_title(); ?></h1>
		</div>
	</section>
	<!-- /.page-kv -->
	<section class="sec_breadcrumb">
		<ul class="list">
			<li><a href="<?php echo esc_url(home_url('/')); ?>" class="fade">TOP</a></li>
			<li><a href="<?php echo esc_url(get_post_type_archive_link("report")); ?>" class="fade"> 卒業生のお店を取材！</a></li>
			<li><?php the_title(); ?></li>
		</ul>
	</section>
    
    <section class="sec_contents post-talk">
		<?php if(get_field("title")): ?>
			<h2 class="headline-4-1"><span><?php the_field("title"); ?></span></h2>
		<?php endif; ?>
		<?php if(get_field("image")): ?>
			<div class="column-1">
				<div class="img"><?php echo wp_get_attachment_image(get_field("image"), "full", 0, array("alt" => get_field("title"))); ?></div>
			</div>
		<?php endif; ?>
		<?php if(get_field("supplement_text")): ?>
			<div class="block-text-area">
				<p><?php the_field("supplement_text"); ?></p>
			</div>
		<?php endif; ?>
		<div class="post-talk-contents post-contents cf">
			<?php the_content(); ?>
		</div>

    </section>
</div>
	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>
