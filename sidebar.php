<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package cosmo0
 * @subpackage astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$sidebar = apply_filters( 'astra_get_sidebar', 'sidebar-1' );

echo '<div ';
	echo astra_attr(
		'sidebar',
		array(
			'id'    => 'secondary',
			'class' => join( ' ', astra_get_secondary_class() ),
			'role'  => 'complementary',
		)
	);
	echo '>';
	?>

	<div class="sidebar-main" <?php echo apply_filters( 'astra_sidebar_data_attrs', '', $sidebar ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>

		<?php astra_sidebars_before(); ?>
		
		<?php if( is_single() && (get_field('moment_twitter') || get_field('nintendofr') || get_field('amazon') || get_field('fnac')) ): ?>
			<!-- custom fields -->
			<aside class="widget external-links">
				<ul>
					<?php if( get_field('guide') ): ?>
					<li class="guide">
						<a href="<?php the_field('guide'); ?>">Guide et astuces</a>
					</li>
					<?php endif; ?>

					<?php if( get_field('moment_twitter') ): ?>
					<li class="captures">
						<a href="<?php the_field('moment_twitter'); ?>" target="_blank" rel="external">Toutes mes captures</a>
					</li>
					<?php endif; ?>

					<!-- consoles -->
					<?php if( get_field('nintendofr') ): ?>
					<li class="nintendo">
						<a href="<?php the_field('nintendofr'); ?>" target="_blank" rel="external">Acheter sur Nintendo.fr</a>
					</li>
					<?php endif; ?>
					<?php if( get_field('xboxcom') ): ?>
					<li class="xbox">
						<a href="<?php the_field('xboxcom'); ?>" target="_blank" rel="external">Acheter sur Xbox.com</a>
					</li>
					<?php endif; ?>
					<?php if( get_field('playstationcom') ): ?>
					<li class="playstation">
						<a href="<?php the_field('playstationcom'); ?>" target="_blank" rel="external">Acheter sur Playstation.com</a>
					</li>
					<?php endif; ?>

					<!-- PC -->
					<?php if( get_field('steam') ): ?>
					<li class="steam">
						<a href="<?php the_field('steam'); ?>" target="_blank" rel="external">Acheter sur Steam</a>
					</li>
					<?php endif; ?>
					<?php if( get_field('gog') ): ?>
					<li class="gog">
						<a href="<?php the_field('gog'); ?>" target="_blank" rel="external">Acheter sur GOG</a>
					</li>
					<?php endif; ?>
					<?php if( get_field('epic') ): ?>
					<li class="epic">
						<a href="<?php the_field('epic'); ?>" target="_blank" rel="external">Acheter sur Epic Store</a>
					</li>
					<?php endif; ?>
					<?php if( get_field('itchio') ): ?>
					<li class="itchio">
						<a href="<?php the_field('itchio'); ?>" target="_blank" rel="external">Acheter sur Itch.io</a>
					</li>
					<?php endif; ?>

					<!-- PC -->
					<?php if( get_field('android') ): ?>
					<li class="android">
						<a href="<?php the_field('android'); ?>" target="_blank" rel="external">Acheter sur Android</a>
					</li>
					<?php endif; ?>
					<?php if( get_field('ios') ): ?>
					<li class="ios">
						<a href="<?php the_field('ios'); ?>" target="_blank" rel="external">Acheter sur iPhone</a>
					</li>
					<?php endif; ?>
					
					<!-- stores -->
					<?php if( get_field('amazon') ): ?>
					<li class="amazon">
						<a href="<?php the_field('amazon'); ?>" target="_blank" rel="external">Acheter sur Amazon.fr</a>
					</li>
					<?php endif; ?>
					<?php if( get_field('fnac') ): ?>
					<li class="fnac">
						<a href="<?php the_field('fnac'); ?>" target="_blank" rel="external">Acheter sur Fnac.com</a>
					</li>
					<?php endif; ?>
				</ul>
			</aside> <!-- /custom fields -->
		<?php endif; ?>

		<?php if ( is_active_sidebar( $sidebar ) ) : ?>

			<?php dynamic_sidebar( $sidebar ); ?>

		<?php endif; ?>

		<?php astra_sidebars_after(); ?>

	</div><!-- .sidebar-main -->
</div><!-- #secondary -->
