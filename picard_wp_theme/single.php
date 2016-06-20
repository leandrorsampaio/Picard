<?php
//
get_header();
//
?>
<h1>Lollolol</h1>
<div class="col-1">
    <ul>
        <?php
        $args = array(
            'post_type' => 'diario',
            'posts_per_page' => -1,
            'origem' => 'banco-do-brasil'
        );
        //
        global $query;
        $query = new WP_Query($args);
        while ($query->have_posts()) : $query->the_post();
            //
            echo '<li>';
            echo '<p>' . get_field('diario_data') . '</p>';
            echo '<p>' . get_the_title() . '</p>';
            echo '<p>' . get_field('diario_valor') . '</p>';

            $terms = get_the_terms($post->ID, 'categorias');
            if ($terms != null) {
                foreach ($terms as $term) {
                    print '<p>' . $term->name . '</p>';
                    unset($term);
                }
            }

            echo '</li>';
        //
        endwhile;
        wp_reset_query();
        ?>
    </ul>
</div>
<?php
//
get_footer();
//
?>