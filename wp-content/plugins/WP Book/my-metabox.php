<?php
//include 'custom-table.php';
class Book_Info_Meta_Box
{
    public function __construct()
    {
        if (is_admin()) {
            add_action('load-post.php',     array($this, 'init_metabox'));
            add_action('load-post-new.php', array($this, 'init_metabox'));
        }
    }

    public function init_metabox()
    {
        add_action('add_meta_boxes', array($this, 'add_metabox'));
        add_action('save_post',      array($this, 'save_metabox'), 10, 2);
    }

    public function add_metabox()
    {
        add_meta_box(
            'book_info',
            __('Book Info', 'text_domain'),
            array($this, 'render_metabox'),
            'book',
            'advanced',
            'default'
        );
    }
    
    

    public function render_metabox($post)
    {
        // Add nonce for security and authentication.
        wp_nonce_field('book_nonce_action', 'book_nonce');

        // Retrieve an existing value from the database.
        $book_author = get_post_meta($post->ID, 'book_author', true);
        $book_year = get_post_meta($post->ID, 'book_year', true);
        $book_price = get_post_meta($post->ID, 'book_price', true);
        $book_publisher = get_post_meta($post->ID, 'book_publisher', true);
        $book_edition = get_post_meta($post->ID, 'book_edition', true);

        // Set default values.
        if (empty($book_year)) $book_year = '';
        if (empty($book_author)) $book_author = '';
        if (empty($book_price)) $book_price = '';
        if (empty($book_publisher)) $book_publisher = '';
        if (empty($book_edition)) $book_edition = '';

        // Form fields.
        echo '<table class="form-table">';


        echo '	<tr>';
        echo '		<th><label for="book_author" class="book_author_label">' . __('Author', 'text_domain') . '</label></th>';
        echo '		<td>';
        echo '			<input type="text" id="book_author" name="book_author" class="book_author_field" placeholder="' . esc_attr__('', 'text_domain') . '" value="' . esc_attr__($book_author) . '">';
        echo '		</td>';
        echo '	</tr>';

        echo '	<tr>';
        echo '		<th><label for="book_year" class="book_year_label">' . __('Year', 'text_domain') . '</label></th>';
        echo '		<td>';
        echo '			<input type="text" id="book_year" name="book_year" class="book_year_field" placeholder="' . esc_attr__('', 'text_domain') . '" value="' . esc_attr__($book_year) . '">';
        echo '		</td>';
        echo '	</tr>';


        echo '	<tr>';
        echo '		<th><label for="book_price" class="book_price_label">' . __('Price', 'text_domain') . '</label></th>';
        echo '		<td>';
        echo '			<input type="text" id="book_price" name="book_price" class="book_price_field" value="' . $book_price . '" ' . checked($book_price, 'checked', false) . '> ' . __('', 'text_domain');

        echo '		</td>';
        echo '	</tr>';

        echo '	<tr>';
        echo '		<th><label for="book_publisher" class="book_publisher_label">' . __('Publisher', 'text_domain') . '</label></th>';
        echo '		<td>';
        echo '			<input type="text" id="book_publisher" name="book_publisher" class="book_publisher_field" value="' . $book_publisher . '" ' . checked($book_publisher, 'checked', false) . '> ' . __('', 'text_domain');

        echo '		</td>';
        echo '	</tr>';

        echo '	<tr>';
        echo '		<th><label for="book_edition" class="book_edition_label">' . __('Edition', 'text_domain') . '</label></th>';
        echo '		<td>';
        echo '			<input type="text" id="book_edition" name="book_edition" class="book_edition_field" value="' . $book_edition . '" ' . checked($book_edition, 'checked', false) . '> ' . __('', 'text_domain');

        echo '		</td>';
        echo '	</tr>';

        echo '</table>';
    }

    public function save_metabox($post_id, $post)
    {
        // Add nonce for security and authentication.
        $nonce_name   = $_POST['book_nonce'];
        $nonce_action = 'book_nonce_action';

        // Check if a nonce is set.
        if (!isset($nonce_name))
            return;

        // Check if a nonce is valid.
        if (!wp_verify_nonce($nonce_name, $nonce_action))
            return;

        // Check if the user has permissions to save data.
        if (!current_user_can('edit_post', $post_id))
            return;

        // Check if it's not an autosave.
        if (wp_is_post_autosave($post_id))
            return;

        // Check if it's not a revision.
        if (wp_is_post_revision($post_id))
            return;

        // Sanitize user input.
        $book_new_year = isset($_POST['book_year']) ? sanitize_text_field($_POST['book_year']) : '';
        $book_new_author = isset($_POST['book_author']) ? sanitize_text_field($_POST['book_author']) : '';
        $book_new_price = isset($_POST['book_price']) ? sanitize_text_field($_POST['book_price']) : '';
        $book_new_publisher = isset($_POST['book_publisher']) ? sanitize_text_field($_POST['book_publisher']) : '';
        $book_new_edition = isset($_POST['book_edition']) ? sanitize_text_field($_POST['book_edition']) : '';

        // Update the meta field in the database.
        update_post_meta($post_id, 'book_year', $book_new_year);
        update_post_meta($post_id, 'book_author', $book_new_author);
        update_post_meta($post_id, 'book_price', $book_new_price);
        update_post_meta($post_id, 'book_publisher', $book_new_publisher);
        update_post_meta($post_id, 'book_edition', $book_new_edition);
    }
}

new Book_Info_Meta_Box;
?>