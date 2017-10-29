<?php

class WDW_BWG_Update {

  protected $update_path = 'http://api.web-dorado.com/v1/_id_/version';
  protected $updates = array();
	protected $plugins = array();
	protected $main_plugin_id = 55;
	protected $prefix = 'bwg';
	protected $plugin_name = 'photo-gallery';
	protected $plugin_url = WD_BWG_URL;
	protected $parent_menu_slug = 'galleries_bwg';

  public function __construct() {}

  private function get_plugin_data($name) {
		$plugins = array(
			$this->plugin_name . '/' . $this->plugin_name . '.php' => array(
				'id'          => $this->main_plugin_id,
				'url'         => 'https://web-dorado.com/products/wordpress-photo-gallery-plugin.html',
				'description' => __('Advanced  plugin to create unlimited galleries and albums with all modern gallery view options.', $this->prefix),
				'icon'        => '',
				'image'       => $this->plugin_url . '/update/images/main_plugin.png'
			),
      'photo-gallery-export/photo-gallery-export.php' => array(
				'id'          => '',
				'url'         => '',
				'description' => ''/*__('', $this->prefix)*/,
				'icon'        => '',
				'image'       => ''
			),
		);

		return $plugins[$name];
	}

  public function check_for_update() {
    global $menu;
    $update_bubble = '';
    $plugins = array();
    $request_ids   = array();
    if (!function_exists('get_plugins')) {
      require_once ABSPATH . 'wp-admin/includes/plugin.php';
    }
    $all_plugins = get_plugins();
    foreach ($all_plugins as $name => $plugin) {
      if (strpos($name, $this->plugin_name) !== FALSE) {
        $data = $this->get_plugin_data($name);
        if ($data['id'] > 0) {
          $request_ids[] = $data['id'];
          $plugins[$data['id']] = $plugin;
          $plugins[$data['id']]['data'] = $data;
        }
      }
    }
    $this->plugins = $plugins;
    if (false === $updates_available = get_transient($this->prefix . '_update_check')) {
      $updates_available = array();
      if (count($request_ids) > 0) {
        $remote_version = $this->get_remote_version(implode('_', $request_ids));
        if (isset($remote_version['body'])) {
          foreach ($remote_version['body'] as $updated_plugin) {
            if (isset($updated_plugin['version'] ) && version_compare($plugins[$updated_plugin['id']]['Version'], $updated_plugin['version'], '<')) {
              $updates_available[$updated_plugin['id']] = $updated_plugin;
            }
          }
        }
      }
      set_transient($this->prefix . '_update_check', $updates_available, 12 * 60 * 60);
    }
    $this->updates = $updates_available;
    $updates_count = is_array($updates_available) ? count($updates_available) : 0;
    $update_count_cont = ' <span class="update-plugins count-' . $updates_count . '" title="title"><span class="update-count">' . $updates_count . '</span></span>';
    $update_page = add_submenu_page($this->parent_menu_slug, __('Updates', $this->prefix), __('Updates', $this->prefix) . $update_count_cont, 'manage_options', $this->prefix . '_updates', array($this, 'display_updates_page'));
    add_action('admin_print_styles-' . $update_page, array($this, 'update_styles'));
    if ($updates_count > 0) {
      foreach ($menu as $key => $value) {
        if ($menu[$key][2] == $this->parent_menu_slug) {
          $menu[$key][0] .= $update_count_cont;
          return;
        }
      }
    }
  }

  public function get_remote_version($id) {
		$request = wp_remote_get((str_replace('_id_', $id, $this->update_path)));
		if (!is_wp_error($request) || wp_remote_retrieve_response_code($request) === 200) {
			return json_decode($request['body'], TRUE);
		}
		return false;
	}

  public function display_updates_page($id) {
    $plugins = $this->plugins;
		$updates = $this->updates;
		$id = $this->main_plugin_id;
    ?>
    <div class="wrap">
      <?php settings_errors(); ?>
      <div id="settings">
        <div id="settings-content">
          <h2 id="add_on_title"><?php echo esc_html(get_admin_page_title()); ?></h2>
          <div class="main-plugin_desc-cont">
            <?php echo sprintf( __('You can download the latest version of your plugins from your %s account.
            After deactivate and delete the current version.
            Install the downloaded latest version of the plugin.', $this->prefix), '<a href="https://web-dorado.com" target="_blank"> Web-Dorado.com</a>'); ?>
          </div>
          <br/><br/>
          <?php
          if ($plugins) {
            $update = 0;
            if (isset($plugins[$id])) {
              $project = $plugins[$id];
              unset($plugins[$id]);
              if (isset($updates[$id])) {
                $update = 1;
              }
              ?>
					<div class="main-plugin">
						<div class="add-on">
              <?php
              if ($project['data']['image']) {
                ?>
                <div class="figure-img">
                  <a href="<?php echo $project['data']['url'] ?>" target="_blank">
                    <img src="<?php echo $project['data']['image'] ?>"/>
                  </a>
                </div>
                <?php
              }
              ?>
						</div>
						<div class="main-plugin-info">
							<h2>
								<a href="<?php echo $project['data']['url'] ?>" target="_blank"><?php echo $project['Title'] ?></a>
							</h2>
							<div class="main-plugin_desc-cont">
								<div class="main-plugin-desc"><?php echo $project['data']['description'] ?></div>
								<div class="main-plugin-desc main-plugin-desc-info">
									<p><strong><?php echo sprintf( __('Current version %s', $this->prefix), $project['Version']); ?></strong></p>
								</div>
								<?php
                if (isset($updates[$id])) {
                  ?>
                  <a class="update-info-a" href="<?php echo $project['data']['url'] ?>" target="_blank">
                    <span class="update-info"><?php echo sprintf( __('There is a new %s version', $this->prefix), $updates[$id]['version']); ?></span>
									</a>
                  <p><span><?php _e("What's new:", $this->prefix); ?></span></p>
									<p><?php echo $updates[$id]['note']; ?></p>
                  <?php
                }
                else {
                  echo sprintf( __('%s is up to date.', $this->prefix), $project['Title']);
                }
                ?>
							</div>
						</div>
					</div>
            <?php
          }
          ?>
          <div class="addons_updates">
            <?php
            foreach ($plugins as $id => $project) {
              ?>
              <div class="add-on">
                <figure class="figure">
                  <div  class="figure-img">
                    <a href="<?php echo $project['data']['url'] ?>" target="_blank">
                      <?php
                      if ($project['data']['image']) {
                        ?>
                        <img src="<?php echo $project['data']['image'] ?>" />
                        <?php
                      }
                      ?>
                    </a>
                  </div>
                  <figcaption class="addon-descr figcaption">
                    <?php
                    if (isset($updates[$id])) {
                      ?>
                      <p><?php _e("What's new:", $this->prefix); ?></p>
                      <?php echo $updates[ $id ]['note'] ?>
                      <?php
                    }
                    else {
                      echo sprintf( __('%s is up to date.', $this->prefix), $project['Title']);
                    }
                    ?>
                  </figcaption>
                </figure>
                <h2><?php echo $project['Title'] ?></h2>
                <div class="main-plugin-desc-info">
                  <p><a href="<?php echo $project['data']['url'] ?>" target="_blank"><?php echo $project['Version']?></a> | Web-Dorado</p>
                </div>
                <?php
                if (isset($updates[$id])) {
                  ?>
                  <div class="addon-descr-update">
                    <span class="update-info"><?php echo sprintf( __('There is a new %s version', $this->prefix), $updates[$id]['version']); ?></span><br/>
                  </div>
                <?php
                }
                ?>
              </div>
              <?php
            }
            ?>
          </div>
            <?php
          }
          ?>
        </div>
      </div>
    </div>
    <?php
  }

  public function update_styles() {
    $version = get_option("wd_" . $this->prefix . "_version");
    wp_enqueue_style($this->prefix . '_updates', $this->plugin_url . '/update/style.css', array(), $version);
  }
}