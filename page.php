<?php
/**
 * Template for displaying static pages.
 *
 * @package   infopreneur
 * @copyright Copyright (c) 2016, Nose Graze Ltd.
 * @license   GPL2+
 */

// Include header.php.
get_header();

// Include left sidebar (maybe).
infopreneur_maybe_show_sidebar( 'left' );
?>

	<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) :

			while ( have_posts() ) : the_post();

				/*
				 * Page Content
				 * Pull in template-parts/content-page.php, which displays the page content.
				 */
				get_template_part( 'template-parts/content', 'page' );

				/*
				 * Comments Template
				 * Pull in the comments template if comments are open or if we have at least one comment.
				 */
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

	</main>

<?php
// Include right sidebar (maybe).
infopreneur_maybe_show_sidebar( 'right' );

// Include footer.php.
get_footer();