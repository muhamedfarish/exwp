<?php

namespace MetForm;

use MetForm\Core\Integrations\Onboard\Attr;
use MetForm\Core\Integrations\Onboard\Onboard;

defined('ABSPATH') || exit;

final class Plugin {

    private static $instance;

    private $entries;
    private $global_settings;

    public function __construct()
    {
        Autoloader::run();
    }

    public function version()
    {
        return '2.1.3';
    }

    public function package_type()
    {
        return apply_filters( 'metform/core/package_type', 'free' );
    }

    public function plugin_url()
    {
        return trailingslashit(plugin_dir_url(__FILE__));
    }

    public function plugin_dir()
    {
        return trailingslashit(plugin_dir_path(__FILE__));
    }

    public function core_url()
    {
        return $this->plugin_url() . 'core/';
    }

    public function core_dir()
    {
        return $this->plugin_dir() . 'core/';
    }

    public function base_url()
    {
        return $this->plugin_url() . 'base/';
    }

    public function base_dir()
    {
        return $this->plugin_dir() . 'base/';
    }

    public function utils_url()
    {
        return $this->plugin_url() . 'utils/';
    }

    public function utils_dir()
    {
        return $this->plugin_dir() . 'utils/';
    }

    public function widgets_url()
    {
        return $this->plugin_url() . 'widgets/';
    }

    public function widgets_dir()
    {
        return $this->plugin_dir() . 'widgets/';
    }

    public function public_url()
    {
        return $this->plugin_url() . 'public/';
    }

    public function public_dir()
    {
        return $this->plugin_dir() . 'public/';
    }

    public function account_url(){
		return 'https://account.wpmet.com';
	}

    public function i18n()
    {
        load_plugin_textdomain('metform', false, dirname(plugin_basename(__FILE__)) . '/languages/');
    }

    public function init()
    {
        /**
         * ----------------------------------------
         *  Ask for rating ⭐⭐⭐⭐⭐
         *  A rating notice will appear depends on
         *  @set_first_appear_day methods
         * ----------------------------------------
         */
        Onboard::instance()->init();

        if(isset($_GET['met-onboard-steps'])) {
            Attr::instance();
		}

        \Wpmet\Libs\Rating::instance('metform')
            ->set_plugin_logo('https://ps.w.org/metform/assets/icon-128x128.png')
            ->set_plugin('Metform', 'https://wpmet.com/wordpress.org/rating/metform')
            ->set_allowed_screens('edit-metform-entry')
            ->set_allowed_screens('edit-metform-form')
            ->set_allowed_screens('metform_page_metform_get_help')
            ->set_priority(30)
            ->set_first_appear_day(7)
            ->set_condition(true)
            ->call();


        $filter_string = ''; // elementskit,metform-pro
        $filter_string .= ((!in_array('elementskit/elementskit.php', apply_filters('active_plugins', get_option('active_plugins')))) ? '' : ',elementskit');
        $filter_string .= (!class_exists('\MetForm\Plugin') ? '' : ',metform');
        $filter_string .= (!class_exists('\MetForm_Pro\Plugin') ? '' : ',metform-pro');

        // banner
        \Wpmet\Libs\Banner::instance('metform')
            ->set_filter(ltrim($filter_string, ','))
            ->set_api_url('https://api.wpmet.com/public/jhanda')
            ->set_plugin_screens('edit-metform-form')
            ->set_plugin_screens('edit-metform-entry')
            ->set_plugin_screens('metform_page_metform-menu-settings')
            ->call();



        /**
         * Show WPMET stories widget in dashboard
         */
        \Wpmet\Libs\Stories::instance('metform')

            ->set_filter($filter_string)
            ->set_plugin('Metform', 'https://wpmet.com/plugin/metform/')
            ->set_api_url('https://api.wpmet.com/public/stories/')
            ->call();

        /**
         * Pro awareness feature;
         */

        $is_pro_active = '';

        if (!in_array('metform-pro/metform-pro.php', apply_filters('active_plugins', get_option('active_plugins')))) {
            $is_pro_active = 'Go Premium';
        }

        \Wpmet\Libs\Pro_Awareness::instance('metform')
            ->set_parent_menu_slug('metform-menu')
            ->set_pro_link(
                (in_array('metform-pro/metform-pro.php', apply_filters('active_plugins', get_option('active_plugins')))) ? '' :
                    'https://wpmet.com/metform-pricing'
            )
            ->set_plugin_file('metform/metform.php')
            ->set_default_grid_thumbnail($this->utils_url() . '/pro-awareness/assets/support.png')
            ->set_page_grid([
                'url' => 'https://wpmet.com/fb-group',
                'title' => 'Join the Community',
                'thumbnail' => $this->utils_url() . '/pro-awareness/assets/community.png',
            ])
            ->set_page_grid([
                'url' => 'https://www.youtube.com/playlist?list=PL3t2OjZ6gY8NoB_48DwWKUDRtBEuBOxSc',
                'title' => 'Video Tutorials',
                'thumbnail' => $this->utils_url() . '/pro-awareness/assets/videos.png',
            ])
            ->set_page_grid([
                'url' => 'https://wpmet.com/plugin/metform/roadmaps#ideas',
                'title' => 'Request a feature',
                'thumbnail' => $this->utils_url() . '/pro-awareness/assets/request.png',
            ])
            ->set_plugin_row_meta('Documentation', 'https://help.wpmet.com/docs-cat/metform/', ['target' => '_blank'])
            ->set_plugin_row_meta('Facebook Community', 'https://wpmet.com/fb-group', ['target' => '_blank'])
            ->set_plugin_row_meta('Rate the plugin ★★★★★', 'https://wordpress.org/support/plugin/metform/reviews/#new-post', ['target' => '_blank'])
            ->set_plugin_action_link('Settings', admin_url() . 'admin.php?page=metform-menu-settings')
            ->set_plugin_action_link($is_pro_active, 'https://wpmet.com/plugin/metform', ['target' => '_blank', 'style' => 'color: #FCB214; font-weight: bold;'])
            ->call();



        // Check if Elementor installed and activated.
        if (!did_action('elementor/loaded')) {
            $this->missing_elementor();
            return;
        }
        // Check for required Elementor version.
        if (!version_compare(ELEMENTOR_VERSION, '3.0.1', '>=')) {
            $this->failed_elementor_version();
            // add_action('admin_notices', array($this, 'failed_elementor_version'));
            return;
        }

        // pro available notice
        if (!file_exists(WP_PLUGIN_DIR . '/metform-pro/metform-pro.php')) {
            $this->available_metform_pro();
            // add_action('admin_notices', [$this, 'available_metform_pro']);
        }

        if (current_user_can('manage_options')) {
            add_action('admin_menu', [$this, 'admin_menu']);
        }

        add_action('elementor/editor/before_enqueue_scripts', [$this, 'edit_view_scripts']);

        add_action('init', [$this, 'i18n']);

        add_action('admin_enqueue_scripts', [$this, 'js_css_admin']);
        add_action('wp_enqueue_scripts', [$this, 'js_css_public']);
        add_action('elementor/frontend/before_enqueue_scripts', [$this, 'elementor_js']);

        add_action('elementor/editor/before_enqueue_styles', [$this, 'elementor_css']);

        add_action('admin_footer', [$this, 'footer_data']);

        Core\Forms\Base::instance()->init();
        Controls\Base::instance()->init();
        $this->entries = Core\Entries\Base::instance();

        Widgets\Manifest::instance()->init();

        // settings page
        Core\Admin\Base::instance()->init();
    }

    function js_css_public()
    {
        $this->global_settings = \MetForm\Core\Admin\Base::instance()->get_settings_option();
        $is_form_cpt = ('metform-form' === get_post_type());

        wp_register_style('metform-ui', $this->public_url() . 'assets/css/metform-ui.css', false, $this->version());

        wp_register_style('metform-style', $this->public_url() . 'assets/css/style.css', false, $this->version());

        wp_register_script('htm', $this->public_url() . 'assets/js/htm.js', null, $this->version(), true);

        wp_register_script('metform-app', $this->public_url() . 'assets/js/app.js', ['htm', 'jquery', 'wp-element'], $this->version(), true);

        wp_localize_script('metform-app', 'mf', [
            'postType' => get_post_type(),
            'restURI' => get_rest_url(null, 'metform/v1/forms/views/'),
        ]);

        // Recaptcha Support Script.
        wp_register_script( 'recaptcha-support', $this->public_url() . 'assets/js/recaptcha-support.js', ['jquery'], $this->version(), true );


        // begins pro feature
        // begins for mf-simple-repeater
        wp_register_style('asRange', $this->public_url() . 'assets/css/asRange.min.css', false, $this->version());
        wp_register_script('asRange', $this->public_url() . 'assets/js/jquery-asRange.min.js', [], $this->version(), true);

        wp_register_style('mf-select2', $this->public_url() . 'assets/css/select2.min.css', false, $this->version());
        wp_register_script('mf-select2', $this->public_url() . 'assets/js/select2.min.js', [], $this->version(), true);
        // ends for mf-simple-repeater

        wp_register_script('recaptcha-v2', 'https://google.com/recaptcha/api.js?render=explicit', [], null, true);

        if (isset($this->global_settings['mf_recaptcha_version']) && ($this->global_settings['mf_recaptcha_version'] == 'recaptcha-v3') && isset($this->global_settings['mf_recaptcha_site_key_v3']) && ($this->global_settings['mf_recaptcha_site_key_v3'] != '')) {
            wp_register_script('recaptcha-v3', 'https://www.google.com/recaptcha/api.js?render=' . $this->global_settings['mf_recaptcha_site_key_v3'], [], $this->version(), false);
        }

        if (isset($this->global_settings['mf_google_map_api_key']) && ($this->global_settings['mf_google_map_api_key'] != '')) {
            wp_register_script('maps-api', 'https://maps.googleapis.com/maps/api/js?key=' . $this->global_settings['mf_google_map_api_key'] . '&libraries=places&&callback=mfMapLocation', [], '', true);
        }

        // for date, time, simple repeater
        wp_deregister_style('flatpickr'); // flatpickr stylesheet
        wp_register_style('flatpickr', $this->public_url() . 'assets/css/flatpickr.min.css', false, $this->version()); // flatpickr stylesheet
        // ends pro feature


        if($is_form_cpt){
            wp_enqueue_style('metform-ui');
            wp_enqueue_style('metform-style');
            wp_enqueue_script('htm');
            wp_enqueue_script('metform-app');
        }

        do_action('metform/onload/enqueue_scripts');
    }

    public function edit_view_scripts()
    {
        wp_enqueue_style('metform-ui', $this->public_url() . 'assets/css/metform-ui.css', false, $this->version());
        wp_enqueue_style('metform-admin-style', $this->public_url() . 'assets/css/admin-style.css', false, null);


        wp_enqueue_script('metform-ui', $this->public_url() . 'assets/js/ui.min.js', [], $this->version(), true);
        wp_enqueue_script('metform-admin-script', $this->public_url() . 'assets/js/admin-script.js', [], null, true);

        wp_add_inline_script('metform-admin-script', "
            var metform_api = {
                resturl: '" . get_rest_url() . "'
            }
        ");
    }

    public function elementor_js()
    {
    }

    public function elementor_css()
    {
        if ('metform-form' == get_post_type()) {
            wp_enqueue_style('metform-category-top', $this->public_url() . 'assets/css/category-top.css', false, $this->version());
        }
    }

    function js_css_admin()
    {
        wp_enqueue_style( 'mf-wp-dashboard', $this->core_url() . 'admin/css/mf-wp-dashboard.css', [], $this->version() );

        $screen = get_current_screen();

        if (in_array($screen->id, ['edit-metform-form', 'metform_page_mt-form-settings', 'metform-entry', 'metform_page_metform-menu-settings'])) {
            wp_enqueue_style('metform-admin-fonts', $this->public_url() . 'assets/admin-fonts.css', false, $this->version());
            wp_enqueue_style('metform-ui', $this->public_url() . 'assets/css/metform-ui.css', false, $this->version());
            wp_enqueue_style('metform-admin-style', $this->public_url() . 'assets/css/admin-style.css', false, null);

            wp_enqueue_script('metform-ui', $this->public_url() . 'assets/js/ui.min.js', [], $this->version(), true);
            wp_enqueue_script('metform-admin-script', $this->public_url() . 'assets/js/admin-script.js', [], null, true);
            wp_localize_script('metform-admin-script', 'metform_api', ['resturl' => get_rest_url(), 'admin_url' => get_admin_url()]);
        }

        if ($screen->id == 'edit-metform-entry' || $screen->id == 'metform-entry') {
            wp_enqueue_style('metform-ui', $this->public_url() . 'assets/css/metform-ui.css', false, $this->version());
            wp_enqueue_script('metform-entry-script', $this->public_url() . 'assets/js/admin-entry-script.js', [], $this->version(), true);
        }
    }

    public function footer_data()
    {

        $screen = get_current_screen();

        if ($screen->id == 'edit-metform-entry') {
            $args = [
                'post_type'   => 'metform-form',
                'post_status' => 'publish',
            ];

            $forms = get_posts($args);

            $get_form_id = isset($_GET['form_id']) ? sanitize_key($_GET['form_id']) : '';
?>
            <div id='metform-formlist' style='display:none;'><select name='mf_form_id' id='metform-form_id'>
                    <option value='all' <?php echo esc_attr(((($get_form_id == 'all') || ($get_form_id == '')) ? 'selected=selected' : '')); ?>>All</option>
                    <?php

                    foreach ($forms as $form) {
                        $form_list[$form->ID] = $form->post_title;
                    ?>
                        <option value="<?php echo esc_attr($form->ID); ?>" <?php echo esc_attr(($get_form_id == $form->ID) ? 'selected=selected' : ''); ?>><?php echo esc_html($form->post_title); ?></option>
        <?php
                    }
                    echo "</select></div>";
                }
            }

            function admin_menu()
            {
                add_menu_page(
                    esc_html__('MetForm', 'metform'),
                    esc_html__('MetForm', 'metform'),
                    'read',
                    'metform-menu',
                    '',
                    $this->core_url() . 'admin/images/icon-menu.png',
                    5
                );
            }

            public function missing_elementor()
            {
                if (isset($_GET['activate'])) {
                    unset($_GET['activate']);
                }

                if (file_exists(WP_PLUGIN_DIR . '/elementor/elementor.php')) {
                    $btn['text'] = esc_html__('Activate Elementor', 'metform');
                    $btn['id'] = 'unsupported-elementor-version';
                    $btn['class'] = 'button-primary';
                    $btn['url'] = wp_nonce_url('plugins.php?action=activate&plugin=elementor/elementor.php&plugin_status=all&paged=1', 'activate-plugin_elementor/elementor.php');
                } else {
                    $btn['id'] = 'unsupported-elementor-version';
                    $btn['class'] = 'button-primary';
                    $btn['text'] = esc_html__('Install Elementor', 'metform');
                    $btn['url'] = wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=elementor'), 'install-plugin_elementor');
                }

                $message = sprintf(esc_html__('MetForm requires Elementor version %1$s+, which is currently NOT RUNNING.', 'metform'), '2.6.0');

                \Oxaim\Libs\Notice::instance('metform', 'unsupported-elementor-version')
                    ->set_dismiss('global', (3600 * 24 * 15))
                    ->set_message($message)
                    ->set_button($btn)
                    ->call();
            }

            public function available_metform_pro()
            {
                if (isset($_GET['activate'])) {
                    unset($_GET['activate']);
                }

                $btn['text'] = esc_html__('MetForm Pro', 'metform');
                $btn['url'] = esc_url('https://products.wpmet.com/metform/');
                $btn['class'] = 'button-primary';

                $message = sprintf(esc_html__('We have MetForm Pro version. Check out our pro feature.', 'metform'), '2.6.0');
                \Oxaim\Libs\Notice::instance('metform', 'unsupported-metform-pro-version')
                    ->set_dismiss('global', (3600 * 24 * 15))
                    ->set_message($message)
                    ->set_button($btn)
                    ->call();
            }


            public function failed_elementor_version()
            {

                $btn['text'] = esc_html__('Update Elementor', 'metform');
                $btn['url'] = sprintf(esc_html__('MetForm requires Elementor version %1$s+, which is currently NOT RUNNING.', 'metform'), '2.6.0');
                $btn['class'] = 'button-primary';

                $message = sprintf(esc_html__('We have MetForm Pro version. Check out our pro feature.', 'metform'), '2.6.0');
                \Oxaim\Libs\Notice::instance('metform', 'unsupported-elementor-version')
                    ->set_dismiss('global', (3600 * 24 * 15))
                    ->set_message($message)
                    ->set_button($btn)
                    ->call();
            }

            public function flush_rewrites()
            {
                $form_cpt = new Core\Forms\Cpt();
                $form_cpt->flush_rewrites();
            }

            public static function instance()
            {
                if (!self::$instance) {
                    self::$instance = new self();
                }
                return self::$instance;
            }
        }
