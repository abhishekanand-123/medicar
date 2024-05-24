<?php /*Template Name: custom_default_post */ ?>
<?php  get_header();?>
<?php
// form sumbittion after data is showing on  admin post

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $post_title = sanitize_text_field($_POST['post_title']);
    $post_content = ($_POST['post_content']);

    $new_post = array(
        'post_title'    => $post_title,
        'post_content'  => $post_content,
        'post_status'   => 'publish',
        'post_type'     => 'post'
    );

    $post_id = wp_insert_post($new_post);

    if ($post_id) {
        echo "Post submitted successfully!";
    } else {
        echo "Error submitting post. Please try again.";
    }
}
?>




<style>
    /* Style for the form container */
    .form-container {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    /* Style for form labels */
    label {
        font-weight: bold;
    }

    /* Style for form inputs */
    input[type="text"],
    textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
    }

    /* Style for submit button */
    input[type="submit"] {
        background-color: #4caf50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    /* Hover effect for submit button */
    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>

<!-- Form -->
<div class="form-container">
    <form method="post" action="">
        <label for="post_title">Title:</label><br>
        <input type="text" id="post_title" name="post_title"><br>
        <label for="post_content">Content:</label><br>
        <textarea id="post_content" name="post_content"></textarea><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</div>

<!-- Display the form -->




<?php get_footer(); ?>
