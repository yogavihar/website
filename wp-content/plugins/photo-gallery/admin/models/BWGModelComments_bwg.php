<?php

class BWGModelComments_bwg {
  ////////////////////////////////////////////////////////////////////////////////////////
  // Events                                                                             //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Constants                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Variables                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
  private $per_page = 20;
  ////////////////////////////////////////////////////////////////////////////////////////
  // Constructor & Destructor                                                           //
  ////////////////////////////////////////////////////////////////////////////////////////
  public function __construct() {
    $user = get_current_user_id();
    $screen = get_current_screen();
    $option = $screen->get_option('per_page', 'option');
    
    $this->per_page = get_user_meta($user, $option, true);
    
    if ( empty ( $this->per_page) || $this->per_page < 1 ) {
      $this->per_page = $screen->get_option( 'per_page', 'default' );
    }
  }
  ////////////////////////////////////////////////////////////////////////////////////////
  // Public Methods                                                                     //
  ////////////////////////////////////////////////////////////////////////////////////////

  public function get_option_row_data() {
    global $wpdb;
    $row = $wpdb->get_row($wpdb->prepare('SELECT * FROM ' . $wpdb->prefix . 'bwg_option WHERE id="%d"', 1));
    return $row;
  }

  public function get_rows_data() {
    if (!isset($_POST['search_value']) && !isset($_POST['search_select_gal_value']) && !isset($_POST['search_select_value'])) {
      return;
    }
    global $wpdb;
    $where = 'WHERE t1.name LIKE ' . ((isset($_POST['search_value'])) ? '"%' . esc_html($_POST['search_value']) . '%"' : '"%%"');
    $where .= ((isset($_POST['search_select_gal_value']) && ((int) $_POST['search_select_gal_value'])) ? ' AND t2.gallery_id=' . (int) $_POST['search_select_gal_value'] : '');
    $where .= ((isset($_POST['search_select_value']) && ((int) $_POST['search_select_value'])) ? ' AND t1.image_id=' . (int) $_POST['search_select_value'] : '');
    $asc_or_desc = ((isset($_POST['asc_or_desc']) && esc_html($_POST['asc_or_desc']) == 'desc') ? 'desc' : 'asc');
    $order_by_arr = array('id', 'image_id', 'name', 'comment', 'published');
    $order_by = ((isset($_POST['order_by']) && in_array(esc_html($_POST['order_by']), $order_by_arr)) ? esc_html($_POST['order_by']) : 'name');
    $order_by = ' ORDER BY t1.' . $order_by . ' ' . $asc_or_desc;
    if (isset($_POST['page_number']) && $_POST['page_number']) {
      $limit = ((int) $_POST['page_number'] - 1) * $this->per_page;
    }
    else {
      $limit = 0;
    }
    $rows = $wpdb->get_results("SELECT t1.*, t2.thumb_url, t2.alt, t2.filetype FROM " . $wpdb->prefix . "bwg_image_comment as t1 INNER JOIN " . $wpdb->prefix . "bwg_image as t2 on t1.image_id=t2.id " . $where . $order_by . " LIMIT " . $limit . ",".$this->per_page);
    return $rows;
  }

  public function get_image_for_comments_table($image_id) {
    global $wpdb;
    $preview_image = $wpdb->get_var($wpdb->prepare("SELECT thumb_url FROM " . $wpdb->prefix . "bwg_image WHERE id='%d'", $image_id));
    return $preview_image;
  }

  public function get_image_filename_for_comments_table($image_id) {
    global $wpdb;
    $preview_image_filename = $wpdb->get_var($wpdb->prepare("SELECT filename FROM " . $wpdb->prefix . "bwg_image WHERE id='%d'", $image_id));
    return $preview_image_filename;
  }

  public function get_galleries() {
    global $wpdb;
    $rows_object = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "bwg_gallery WHERE published=1");
    $rows[0] = 'Select gallery';
    if ($rows_object) {
      foreach ($rows_object as $row_object) {
        $rows[$row_object->id] = $row_object->name;
      }
    }
    return $rows;
  }

  public function get_images($gal_id) {
    global $wpdb;
    $where = ($gal_id ? ' AND gallery_id=' . $gal_id : '');
    $rows_object = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "bwg_image WHERE published=1" . $where);
    $rows[0] = 'All';
    if ($rows_object) {
      foreach ($rows_object as $row_object) {
        $rows[$row_object->id] = $row_object->filename;
      }
    }
    return $rows;
  }

  public function page_nav() {
    if (!isset($_POST['search_value']) && !isset($_POST['search_select_gal_value']) && !isset($_POST['search_select_value'])) {
      return;
    }
    global $wpdb;
    $where = 'WHERE t1.name LIKE ' . ((isset($_POST['search_value'])) ? '"%' . esc_html($_POST['search_value']) . '%"' : '"%%"');
    $where .= ((isset($_POST['search_select_gal_value']) && ((int) $_POST['search_select_gal_value'])) ? ' AND t2.gallery_id=' . (int) $_POST['search_select_gal_value'] : '');
    $where .= ((isset($_POST['search_select_value']) && ((int) $_POST['search_select_value'])) ? ' AND t1.image_id=' . (int) $_POST['search_select_value'] : '');
    $query = "SELECT COUNT(*) FROM " . $wpdb->prefix . "bwg_image_comment as t1 INNER JOIN " . $wpdb->prefix . "bwg_image as t2 on t1.image_id=t2.id " . $where;
    $total = $wpdb->get_var($query);
    $page_nav['total'] = $total;
    if (isset($_POST['page_number']) && $_POST['page_number']) {
      $limit = ((int) $_POST['page_number'] - 1) * $this->per_page;
    }
    else {
      $limit = 0;
    }
    $page_nav['limit'] = (int) ($limit / $this->per_page + 1);
    return $page_nav;
  }
  ////////////////////////////////////////////////////////////////////////////////////////
  // Getters & Setters                                                                  //
  ////////////////////////////////////////////////////////////////////////////////////////
  public function per_page(){
    return $this->per_page;

  }
  ////////////////////////////////////////////////////////////////////////////////////////
  // Private Methods                                                                    //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Listeners                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
}