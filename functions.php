<?php


function oceanwp_child_enqueue_parent_style() {
    $theme = wp_get_theme('OceanWP');
    $version = $theme->get('Version');

    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', ['oceanwp-style'], $version);
}
add_action('wp_enqueue_scripts', 'oceanwp_child_enqueue_parent_style');  






function enqueue_custom_scripts() {
    wp_enqueue_script('custom-jquery', get_stylesheet_directory_uri() . '/js/jQuery_custom.js', array('jquery'), null, true);
    wp_localize_script('custom-jquery', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');


add_action('wp_ajax_validate_certificate', 'handle_certificate_validation');
add_action('wp_ajax_nopriv_validate_certificate', 'handle_certificate_validation');

function handle_certificate_validation() {
    $certificate_id = sanitize_text_field($_POST['certificate_id']);
    $student_name = sanitize_text_field($_POST['student_name']);

    $query = new WP_Query(array(
        'post_type' => 'student_certificate',
        'posts_per_page' => 1,
        'meta_query' => array(
            array(
                'key' => 'certificate_no',
                'value' => $certificate_id,
                'compare' => '='
            ),
            array(
                'key' => 'name',
                'value' => $student_name,
                'compare' => '='
            )
        )
    ));

    if ($query->have_posts()) {
        $query->the_post();
        wp_send_json_success(array(
            'redirect_url' => get_permalink(), 
        ));
    } else {
        wp_send_json_error('No matching certificate found.');
    }

    wp_die();
}



