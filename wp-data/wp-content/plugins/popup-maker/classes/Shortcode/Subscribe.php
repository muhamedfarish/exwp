<?php
/*******************************************************************************
 * Copyright (c) 2017, WP Popup Maker
 ******************************************************************************/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class PUM_Shortcode_Subscribe
 */
class PUM_Shortcode_Subscribe extends PUM_Shortcode {

	/**
	 * @var int
	 */
	public $version = 2;

	/**
	 * @var bool
	 */
	public $ajax_rendering = true;

	/**
	 * The shortcode tag.
	 *
	 * @return string
	 */
	public function tag() {
		return 'pum_sub_form';
	}

	/**
	 * @return string
	 */
	public function label() {
		return __( 'Subscription Form', 'popup-maker' );
	}

	/**
	 * @return string
	 */
	public function description() {
		return __( 'A customizable newsletter subscription form.', 'popup-maker' );
	}

	/**
	 * @return array
	 */
	public function post_types() {
		return array( 'page', 'post', 'popup' );
	}

	/**
	 * @return array
	 */
	public function tabs() {
		$tabs = array(
			'general' => __( 'General', 'popup-maker' ),
			'form'    => __( 'Form', 'popup-maker' ),
			'actions' => __( 'Actions', 'popup-maker' ),
		);

		// Deprecated filter
		$tabs = apply_filters( 'pum_sub_form_shortcode_sections', $tabs );

		$tabs = apply_filters( 'pum_sub_form_shortcode_tabs', $tabs );

		return $this->resort_provider_tabs( $tabs );
	}

	/**
	 * @return array
	 */
	public function subtabs() {
		$subtabs = apply_filters( 'pum_sub_form_shortcode_subtabs', array(
			'general' => array(
				'main' => __( 'General', 'popup-maker' ),
			),
			'form'    => array(
				'appearance'   => __( 'Appearance', 'popup-maker' ),
				'fields'       => __( 'Fields', 'popup-maker' ),
				'labels'       => __( 'Labels', 'popup-maker' ),
				'placeholders' => __( 'Placeholders', 'popup-maker' ),
			),
			'actions' => array(
				'popup'    => __( 'Popup', 'popup-maker' ),
				'redirect' => __( 'Redirect', 'popup-maker' ),
			),
		) );

		return $this->resort_provider_tabs( $subtabs );
	}

	/**
	 * @return array
	 */
	public function fields() {
		$fields = apply_filters( 'pum_sub_form_shortcode_fields', array(
			'general' => array(
				'main' => array(
					'provider' => array(
						'label'   => __( 'Service Provider', 'popup-maker' ),
						'desc'    => __( 'Choose which service provider to submit to.', 'popup-maker' ),
						'type'    => 'select',
						'options' => array_merge( array( '' => __( 'Default', 'popup-maker' ) ), PUM_Newsletter_Providers::dropdown_list(), array( 'none' => __( 'None', 'popup-maker' ) ) ),
						'std'     => '',
					),
				),
			),
			'form'    => array(
				'fields'       => array(
					'name_field_type' => array(
						'label'   => __( 'Name Field Type', 'popup-maker' ),
						'type'    => 'select',
						'options' => array(
							'disabled'   => __( 'None', 'popup-maker' ),
							'fullname'   => __( 'Full', 'popup-maker' ),
							'first_only' => __( 'First Only', 'popup-maker' ),
							'first_last' => __( 'First & Last', 'popup-maker' ),
						),
						'std'     => 'fullname',
						'private' => true,
					),
					'name_optional'   => array(
						'label'        => __( 'Name Optional', 'popup-maker' ),
						'desc'         => __( 'Makes the name field optional.', 'popup-maker' ),
						'type'         => 'checkbox',
						'dependencies' => array(
							'name_field_type' => array( 'fullname', 'first_only', 'first_last' ),
						),
						'private' => true,
					),
					'name_disabled'   => array(
						'label'        => __( 'Name Disabled', 'popup-maker' ),
						'desc'         => __( 'Removes the name field.', 'popup-maker' ),
						'type'         => 'checkbox',
						'dependencies' => array(
							'name_field_type' => false,
						),
						'private' => true,
					),

				),
				'labels'       => array(
					'disable_labels' => array(
						'label' => __( 'Disable Labels', 'popup-maker' ),
						'desc'  => __( 'Disables the display of field labels.', 'popup-maker' ),
						'type'  => 'checkbox',
						'private' => true,
					),
					'heading_labels' => array(
						'label' => __( 'Labels', 'popup-maker' ),
						'desc'  => __( 'Field label text', 'popup-maker' ),
						'type'  => 'heading',
						'private' => true,
					),
					'label_name'     => array(
						'label'        => __( 'Full Name', 'popup-maker' ),
						'dependencies' => array(
							'disable_labels'  => false,
							'name_field_type' => array( 'fullname' ),
						),
						'std'          => __( 'Name', 'popup-maker' ),
						'private' => true,
					),
					'label_fname'    => array(
						'label'        => __( 'First Name', 'popup-maker' ),
						'dependencies' => array(
							'disable_labels'  => false,
							'name_field_type' => array( 'first_only', 'first_last' ),
						),
						'std'          => __( 'First Name', 'popup-maker' ),
						'private' => true,
					),
					'label_lname'    => array(
						'label'        => __( 'Last Name', 'popup-maker' ),
						'dependencies' => array(
							'disable_labels'  => false,
							'name_field_type' => array( 'first_last' ),
						),
						'std'          => __( 'Last Name', 'popup-maker' ),
						'private' => true,
					),
					'label_email'    => array(
						'label'        => __( 'Email', 'popup-maker' ),
						'dependencies' => array(
							'disable_labels' => false,
						),
						'std'          => __( 'Email', 'popup-maker' ),
						'private' => true,
					),
					'label_submit'   => array(
						'label' => __( 'Submit Button', 'popup-maker' ),
						'std'   => __( 'Subscribe', 'popup-maker' ),
						'private' => true,
					),
					// Deprecated fields.
					'name_text'      => array(
						'type' => 'hidden',
						'private' => true,
					),
					'email_text'     => array(
						'private' => true,
						'type' => 'hidden',
					),
					'button_text'    => array(
						'type' => 'hidden',
						'private' => true,
					),
				),
				'placeholders' => array(
					'placeholder_name'  => array(
						'label'        => __( 'Full Name', 'popup-maker' ),
						'dependencies' => array(
							'name_field_type' => array( 'fullname' ),
						),
						'std'          => __( 'Name', 'popup-maker' ),
						'private' => true,
					),
					'placeholder_fname' => array(
						'label'        => __( 'First Name', 'popup-maker' ),
						'dependencies' => array(
							'name_field_type' => array( 'first_only', 'first_last' ),
						),
						'std'          => __( 'First Name', 'popup-maker' ),
						'private' => true,
					),
					'placeholder_lname' => array(
						'label'        => __( 'Last Name', 'popup-maker' ),
						'dependencies' => array(
							'name_field_type' => array( 'first_last' ),
						),
						'std'          => __( 'Last Name', 'popup-maker' ),
						'private' => true,
					),
					'placeholder_email' => array(
						'label' => __( 'Email', 'popup-maker' ),
						'std'   => __( 'Email', 'popup-maker' ),
						'private' => true,
					),

				),
				'appearance'   => array(
					'form_layout'    => array(
						'label'   => __( 'Form Layout', 'popup-maker' ),
						'desc'    => __( 'Choose a form layout.', 'popup-maker' ),
						'type'    => 'select',
						'options' => array(
							'block'  => __( 'Block', 'popup-maker' ),
							'inline' => __( 'Inline', 'popup-maker' ),
						),
						'std'     => 'block',
						'private' => true,
					),
					'form_alignment' => array(
						'label'   => __( 'Form Alignment', 'popup-maker' ),
						'desc'    => __( 'Choose a form alignment.', 'popup-maker' ),
						'type'    => 'select',
						'options' => array(
							'left'   => __( 'Left', 'popup-maker' ),
							'center' => __( 'Center', 'popup-maker' ),
							'right'  => __( 'Right', 'popup-maker' ),
						),
						'std'     => 'center',
						'private' => true,
					),
					'form_style'     => array(
						'label'   => __( 'Form Style', 'popup-maker' ),
						'desc'    => __( 'Choose how you want your form styled.', 'popup-maker' ),
						'type'    => 'select',
						'options' => array(
							''        => __( 'None', 'popup-maker' ),
							'default' => __( 'Default', 'popup-maker' ),
						),
						'std'     => 'default',
					),
					'layout'         => array(
						'type' => 'hidden',
						'private' => true,
					),
					'style'          => array(
						'type' => 'hidden',
						'private' => true,
					),
				),
			),
			'actions' => array(
				'popup'    => array(
					'closepopup'   => array(
						'label' => __( 'Close Popup', 'popup-maker' ),
						'type'  => 'checkbox',
					),
					'closedelay'   => array(
						'label'        => __( 'Delay', 'popup-maker' ),
						'type'         => 'rangeslider',
						'min'          => 0,
						'max'          => 180,
						'step'         => 1,
						'unit'         => 's',
						'std'          => 0,
						'dependencies' => array(
							'closepopup' => true,
						),
					),
					'openpopup'    => array(
						'label' => __( 'Open Popup', 'popup-maker' ),
						'type'  => 'checkbox',
					),
					'openpopup_id' => array(
						'label'        => __( 'Popup ID', 'popup-maker' ),
						'type'         => 'select',
						'options'      => array_merge( array(
							0 => __( 'Select a popup', 'popup-maker' ),
						), PUM_Helpers::popup_selectlist() ),
						'std'          => 0,
						'dependencies' => array(
							'openpopup' => true,
						),
					),
				),
				'redirect' => array(
					'redirect_enabled' => array(
						'label' => __( 'Redirect', 'popup-maker' ),
						'desc'  => __( 'Enable refreshing the page or redirecting after success.', 'popup-maker' ),
						'type'  => 'checkbox',
					),
					'redirect'         => array(
						'label'        => __( 'Redirect URL', 'popup-maker' ),
						'desc'         => __( 'Leave blank to refresh, or enter a url that users will be taken to after success.', 'popup-maker' ),
						'std'          => '',
						'dependencies' => array(
							'redirect_enabled' => true,
						),
					),
				),
			),
		) );

		return $this->resort_provider_tabs( $fields );
	}

	/**
	 * Sorts tabs so that providers come first.
	 *
	 * @param array $tabs
	 *
	 * @return array
	 */
	public function resort_provider_tabs( $tabs = array() ) {
		$sorted_tabs = $tabs;

		foreach ( $tabs as $tab_id => $tab ) {
			if ( strpos( $tab_id, 'provider_' ) === 0 ) {
				PUM_Admin_Helpers::move_item( $sorted_tabs, $tab_id, 'down', 'general' );
			}
		}

		return $sorted_tabs;
	}

	/**
	 * Shortcode handler
	 *
	 * @param  array  $atts    shortcode attributes
	 * @param  string $content shortcode content
	 *
	 * @return string
	 */
	public function handler( $atts, $content = null ) {
		$atts = $this->shortcode_atts( $atts );

		static $instance = 0;

		$instance ++;

		$atts['instance'] = $instance;

		ob_start();

		$data_attr = $this->data_attr( $atts );

		$classes = implode( ' ', array(
			'pum_sub_form',
			$atts['provider'],
			$atts['form_layout'],
			$atts['form_style'],
			'pum-sub-form',
			'pum-form',
			'pum-sub-form--provider-' . $atts['provider'],
			'pum-form--layout-' . $atts['form_layout'],
			'pum-form--style-' . $atts['form_style'],
			'pum-form--alignment-' . $atts['form_alignment'],
		) ); ?>


		<form class="<?php esc_attr_e( $classes ); ?>" data-settings="<?php esc_attr_e( json_encode( $data_attr ) ); ?>">

			<?php do_action( 'pum_sub_form_before', $atts ); ?>

			<?php


			if ( ! $atts['name_field_type'] != 'disabled' ) :

				$required = ! $atts['name_optional'] ? 'required' : '';

				switch ( $atts['name_field_type'] ) {
					case 'fullname': ?>

						<div class="pum-form__field  pum-form__field--name  pum-sub-form-field  pum-sub-form-field--name">
							<?php if ( ! $atts['disable_labels'] ) : ?>
								<label class="pum-form__label  pum-sub-form-label"><?php echo $atts['label_name']; ?></label>
							<?php endif; ?>
							<input type="text" name="name" <?php echo $required; ?> placeholder="<?php esc_attr_e( $atts['placeholder_name'] ); ?>"/>
						</div>

						<?php
						break;

					case 'first_only': ?>

						<div class="pum-form__field  pum-form__field--fname  pum-sub-form-field  pum-sub-form-field--fname">
							<?php if ( ! $atts['disable_labels'] ) : ?>
								<label class="pum-form__label  pum-sub-form-label"><?php echo $atts['label_fname']; ?></label>
							<?php endif; ?>
							<input type="text" name="fname" <?php echo $required; ?> placeholder="<?php esc_attr_e( $atts['placeholder_fname'] ); ?>"/>
						</div>

						<?php
						break;

					case 'first_last': ?>

						<div class="pum-form__field  pum-form__field--fname  pum-sub-form-field  pum-sub-form-field--fname">
							<?php if ( ! $atts['disable_labels'] ) : ?>
								<label class="pum-form__label  pum-sub-form-label"><?php echo $atts['label_fname']; ?></label>
							<?php endif; ?>
							<input type="text" name="fname" <?php echo $required; ?> placeholder="<?php esc_attr_e( $atts['placeholder_fname'] ); ?>"/>
						</div>

						<div class="pum-form__field  pum-form__field--lname  pum-sub-form-field  pum-sub-form-field--lname">
							<?php if ( ! $atts['disable_labels'] ) : ?>
								<label class="pum-form__label  pum-sub-form-label"><?php echo $atts['label_lname']; ?></label>
							<?php endif; ?>
							<input type="text" name="lname" <?php echo $required; ?> placeholder="<?php esc_attr_e( $atts['placeholder_lname'] ); ?>"/>
						</div>

						<?php
						break;
				} ?>

			<?php endif; ?>

			<div class="pum-form__field  pum-form__field--email  pum-sub-form-field  pum-sub-form-field--email">
				<?php if ( ! $atts['disable_labels'] ) : ?>
					<label class="pum-form__label  pum-sub-form-label"><?php echo $atts['label_email']; ?></label>
				<?php endif; ?>
				<input type="email" name="email" required placeholder="<?php esc_attr_e( $atts['placeholder_email'] ); ?>"/>
			</div>

			<?php do_action( 'pum_sub_form_fields', $atts ); ?>

			<?php do_action( 'pum_newsletter_fields', $atts ); ?>

			<input type="hidden" name="provider" value="<?php echo $atts['provider']; ?>"/>

			<div class="pum-form__field  pum-form__field--submit  pum-sub-form-field  pum-sub-form-field--submit">
				<button class="pum-form__submit  pum-sub-form-submit"><?php echo $atts['label_submit']; ?></button>
			</div>

			<?php do_action( 'pum_sub_form_after', $atts ); ?>
		</form>

		<?php

		//return content
		return ob_get_clean();
	}

	/**
	 * Process shortcode attributes.
	 *
	 * Also remaps and cleans old ones.
	 *
	 * @param $atts
	 *
	 * @return array
	 */
	public function shortcode_atts( $atts ) {
		$atts = parent::shortcode_atts( $atts );

		if ( empty( $atts['provider'] ) ) {
			$atts['provider'] = pum_get_option( 'newsletter_default_provider' );
		}

		// Remap old atts.
		if ( ! empty( $atts['layout'] ) ) {
			$atts['form_layout'] = $atts['layout'];
		}
		if ( ! empty( $atts['style'] ) ) {
			$atts['form_style'] = $atts['style'];
		}

		if ( ! empty( $atts['name_text'] ) ) {
			$atts['label_name'] = $atts['name_text'];
		}
		if ( ! empty( $atts['email_text'] ) ) {
			$atts['label_email'] = $atts['email_text'];
		}
		if ( ! empty( $atts['button_text'] ) ) {
			$atts['label_submit'] = $atts['button_text'];
		}

		unset( $atts['layout'], $atts['style'], $atts['name_text'], $atts['email_text'], $atts['button_text'] );

		/**
		 * Remap v1.7 core shortcode attributes starting here.
		 */
		if ( ! empty( $atts['name_disabled'] ) && $atts['name_disabled'] ) {
			$atts['name_field_type'] = 'disabled';
		}

		unset( $atts['name_disabled'] );

		return $atts;
	}

	/**
	 * Returns array of fields & values that will be passed into data attr of the form.
	 *
	 * @param array $atts
	 *
	 * @return array
	 */
	public function data_attr( $atts = array() ) {
		$data = array();

		$data_attr_fields = $this->data_attr_fields();

		foreach ( $atts as $key => $value ) {
			if ( in_array( $key, $data_attr_fields ) ) {
				$data[ $key ] = $value;

				if ( $key == 'redirect' ) {
					$data[ $key ] = base64_encode( $value );
				}
			}
		}

		return $data;
	}

	/**
	 * Returns array of fields that will be passed into data attr of the form.
	 *
	 * @return mixed
	 */
	public function data_attr_fields() {
		return apply_filters( 'pum_sub_form_data_attr_fields', array(
			'closepopup',
			'closedelay',
			'openpopup',
			'openpopup_id',
			'redirect_enabled',
			'redirect',
		) );
	}

	/**
	 *
	 */
	public function template() { ?>
		<p class="pum-sub-form-desc">
			<?php _e( 'Subscription Form Placeholder', 'popup-maker' ); ?>
		</p>
		<?php
	}

}

