<?php get_header(); ?>

	<section>
		<?php the_post() ?>
			<div class="mh-post">
				<h3 class="mh-entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<span class="mh-entry-author"><?php the_author_posts_link(); ?></span>
				<span class="mh-entry-date"><?php the_date(); ?></span>
				<div class="mh-entry-content">
					<?php the_content(); ?>
				</div><!-- ends mh-entry-content -->
				<div class="mh-comment-form"><?php comment_form(); ?><?php comments_template(); ?></div>
			</div><!-- ends mh-post -->
	</section>
	

<?php get_footer(); ?>