<?php


function book_meta_install() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'bookmeta';
    $charset_collate = $wpdb->get_charset_collate();
    //$packagetable = $tableprefix . 'bookmeta';
    $sql = "CREATE TABLE " . $table_name . " (
        meta_id INT NOT NULL AUTO_INCREMENT, 
        post_id INT NOT NULL, 
        meta_key VARCHAR(255) NOT NULL, 
        meta_value TEXT NOT NULL, 
        PRIMARY KEY  (meta_id)
    ) ". $charset_collate .";";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');    
    dbDelta($sql);

    /*$install_query = "CREATE TABLE $table_name (
        meta_id bigint(20) unsigned NOT NULL auto_increment,
        post_id bigint(20) unsigned NOT NULL,
        meta_key varchar(255) default NULL,
        meta_value longtext,
        PRIMARY KEY  (meta_id),
        KEY badge (badge_id));";
    
    dbDelta( $install_query );*/
}
register_activation_hook(__FILE__,'book_meta_install');
?>