<?php
require_once IAMD_FW.'social_media.php';

require_once IAMD_FW.'google_fonts.php';

require_once IAMD_FW.'theme_features.php';

require_once IAMD_FW.'admin_utils.php';

require_once IAMD_FW.'register_admin.php';

require_once IAMD_FW.'register_public.php';

require_once IAMD_FW.'register_media_uploader.php';

require_once IAMD_FW.'utils.php';

require_once IAMD_FW.'reservation-util.php';

require_once IAMD_FW.'sociable_shortcodes.php';

##Metaboxes
require_once IAMD_FW.'theme_metaboxes/post_metabox.php';
require_once IAMD_FW.'theme_metaboxes/page_metabox.php';
require_once IAMD_FW.'theme_metaboxes/seo_metabox.php';

#TGM Plugins
require_once IAMD_FW.'class-tgm-plugin-activation.php';
require_once IAMD_FW.'register_plugins.php';

##Register Widgets
require_once IAMD_FW.'register_widgets.php';

##Register Widget Areas
require_once IAMD_FW.'register_widget_areas.php';

##Include Theme options
require_once IAMD_FW.'theme_options/menu.php';

##MegaMenu
require_once IAMD_FW.'register_custom_attributes_in_menu.php';

#Woocommerce
if(dttheme_is_plugin_active('woocommerce/woocommerce.php'))
	require_once(IAMD_FW.'woocommerce/index.php');?>