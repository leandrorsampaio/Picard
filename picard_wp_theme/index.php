<?php
//
include ('header.php');
//
// WP_Query arguments
$args = array(
	'post_type'              => array( 'Diario' ),
	'order'                  => 'ASC',
	'orderby'                => 'rand',
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {

	echo '<ul>';

	while ( $query->have_posts() ) {
		$query->the_post();

		$var_relatorio_title = get_the_title();
		$var_relatorio_valor = get_field('relatorio_valor');
		$var_relatorio_obs = get_field('relatorio_obs');
		$var_relatorio_group = get_field('relatorio_group');


		echo '<li>' .
		'<span>' . $var_relatorio_title . '</span>' .
		'<span>' . $var_relatorio_valor . '</span>' .
		'<span>' . $var_relatorio_obs . '</span>' .
		'<span>' . $var_relatorio_group . '</span>' .
		'</li>';
	}

	echo '</ul>';

} else {
	// no posts found
}

// Restore original Post Data
wp_reset_postdata();


//
include ('footer.php');
//
?>
