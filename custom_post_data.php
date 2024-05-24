<?php /*Template Name: custom post data */ ?>


<?php get_header(); ?>

<?php
// URL of the WordPress site from which you want to fetch posts
$source_url = 'http://localhost/versae-studio/wp-json/wp/v2/posts';

// Authentication credentials of the source WordPress site
$source_username = 'Abhishek';
$source_password = 'Abhishek@123';

// URL of your local WordPress site where you want to import the posts
$destination_url = 'http://localhost/medicar/wp-json/wp/v2/posts';

// Authentication credentials of your local WordPress site
$destination_username = 'medicar';
$destination_password = 'medicar@123';

// Fetch posts from the source WordPress site
$response = wp_remote_get($source_url, array(
    'headers' => array(
        'Authorization' => 'Basic ' . base64_encode($source_username . ':' . $source_password)
    )
));

if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
    $posts = json_decode(wp_remote_retrieve_body($response), true);
    
    // Import fetched posts into your local WordPress site
    foreach ($posts as $post) {
        $post_data = array(
            'title' => $post['title']['rendered'],
            'content' => $post['content']['rendered'],
            'status' => 'publish'
        );
        
        $import_response = wp_remote_post($destination_url, array(
            'headers' => array(
                'Authorization' => 'Basic ' . base64_encode($destination_username . ':' . $destination_password),
                'Content-Type' => 'application/json'
            ),
            'body' => json_encode($post_data)
        ));
        
        if (!is_wp_error($import_response) && wp_remote_retrieve_response_code($import_response) === 201) {
            echo "Post '{$post['title']['rendered']}' imported successfully!<br>";
        } else {
            echo "Failed to import post '{$post['title']['rendered']}'. Status code: " . wp_remote_retrieve_response_code($import_response) . "<br>";
            echo "Response: " . wp_remote_retrieve_body($import_response) . "<br>";
            // Log more details about the error
            error_log("Failed to import post '{$post['title']['rendered']}'. Error: " . print_r($import_response, true));
        }
    }
} else {
    echo "Failed to fetch posts from the source WordPress site. Error: " . wp_remote_retrieve_response_message($response) . "<br>";
    // Log more details about the error
    error_log("Failed to fetch posts from the source WordPress site. Error: " . wp_remote_retrieve_response_message($response));
}
?>




<?php get_footer(); ?>