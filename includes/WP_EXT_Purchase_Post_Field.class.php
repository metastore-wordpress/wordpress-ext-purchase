<?php

/**
 * Class WP_EXT_Purchase_Post_Field
 */
class WP_EXT_Purchase_Post_Field extends WP_EXT_Purchase {

	/**
	 * Constructor.
	 */
	public function __construct() {
		parent::__construct();

		$this->run();
	}

	/**
	 * Plugin: `initialize`.
	 */
	public function run() {
		add_action( 'acf/init', [ $this, 'post_fields' ] );
	}

	/**
	 * Post fields.
	 */
	public function post_fields() {
		if ( function_exists( 'acf_add_local_field_group' ) ) {
			acf_add_local_field_group( [
				'key'                   => 'group_' . $this->pt_ID,
				'title'                 => esc_html__( 'Информация о закупке', 'wp-ext-' . $this->domain_ID ),
				'fields'                => [
					[
						'key'               => 'tab_' . $this->pt_ID . '_general',
						'label'             => esc_html__( 'Общие сведения', 'wp-ext-' . $this->domain_ID ),
						'name'              => '',
						'type'              => 'tab',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'placement'         => 'left',
						'endpoint'          => 0,
					],
					[
						'key'               => 'field_' . $this->pt_ID . '_description',
						'label'             => esc_html__( 'Описание', 'wp-ext-' . $this->domain_ID ),
						'name'              => $this->pt_ID . '_description',
						'type'              => 'textarea',
						'instructions'      => '',
						'required'          => 1,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => '',
						'maxlength'         => '',
						'rows'              => '',
						'new_lines'         => '',
					],
					[
						'key'               => 'field_' . $this->pt_ID . '_eis_number',
						'label'             => esc_html__( 'Регистрационный номер в ЕИС', 'wp-ext-' . $this->domain_ID ),
						'name'              => $this->pt_ID . '_eis_number',
						'type'              => 'number',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'min'               => '0',
						'max'               => '',
						'step'              => '',
					],
					[
						'key'               => 'field_' . $this->pt_ID . '_lot_id',
						'label'             => esc_html__( 'Номер лота', 'wp-ext-' . $this->domain_ID ),
						'name'              => $this->pt_ID . '_lot_id',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 1,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
					],
					[
						'key'               => 'field_' . $this->pt_ID . '_total_cost',
						'label'             => esc_html__( 'Общая стоимость', 'wp-ext-' . $this->domain_ID ),
						'name'              => $this->pt_ID . '_total_cost',
						'type'              => 'number',
						'instructions'      => '',
						'required'          => 1,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => esc_html__( 'RUB', 'wp-ext-' . $this->domain_ID ),
						'min'               => '0',
						'max'               => '',
						'step'              => '',
					],
					[
						'key'               => 'field_' . $this->pt_ID . '_status',
						'label'             => esc_html__( 'Статус закупки', 'wp-ext-' . $this->domain_ID ),
						'name'              => $this->pt_ID . '_status',
						'type'              => 'taxonomy',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'taxonomy'          => $this->pt_ID . '_status',
						'field_type'        => 'radio',
						'allow_null'        => 0,
						'add_term'          => 0,
						'save_terms'        => 1,
						'load_terms'        => 0,
						'return_format'     => 'id',
						'multiple'          => 0,
					],
					[
						'key'               => 'field_' . $this->pt_ID . '_method',
						'label'             => esc_html__( 'Способ закупки', 'wp-ext-' . $this->domain_ID ),
						'name'              => $this->pt_ID . '_method',
						'type'              => 'taxonomy',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'taxonomy'          => $this->pt_ID . '_method',
						'field_type'        => 'radio',
						'allow_null'        => 0,
						'add_term'          => 0,
						'save_terms'        => 1,
						'load_terms'        => 0,
						'return_format'     => 'id',
						'multiple'          => 0,
					],
					[
						'key'               => 'tab_' . $this->pt_ID . '_customer',
						'label'             => esc_html__( 'Заказчик', 'wp-ext-' . $this->domain_ID ),
						'name'              => '',
						'type'              => 'tab',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'placement'         => 'left',
						'endpoint'          => 0,
					],
					[
						'key'               => 'field_' . $this->pt_ID . '_customer_name',
						'label'             => esc_html__( 'Наименование организации', 'wp-ext-' . $this->domain_ID ),
						'name'              => $this->pt_ID . '_customer_name',
						'type'              => 'textarea',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => '',
						'maxlength'         => '',
						'rows'              => '',
						'new_lines'         => '',
					],
					[
						'key'               => 'field_' . $this->pt_ID . '_customer_itn',
						'label'             => esc_html__( 'ИНН', 'wp-ext-' . $this->domain_ID ),
						'name'              => $this->pt_ID . '_customer_itn',
						'type'              => 'number',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'min'               => '0',
						'max'               => '',
						'step'              => '',
					],
					[
						'key'               => 'field_' . $this->pt_ID . '_customer_iec',
						'label'             => esc_html__( 'КПП', 'wp-ext-' . $this->domain_ID ),
						'name'              => $this->pt_ID . '_customer_iec',
						'type'              => 'number',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'min'               => '0',
						'max'               => '',
						'step'              => '',
					],
					[
						'key'               => 'field_' . $this->pt_ID . '_customer_psrn',
						'label'             => esc_html__( 'ОГРН', 'wp-ext-' . $this->domain_ID ),
						'name'              => $this->pt_ID . '_customer_psrn',
						'type'              => 'number',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'min'               => '0',
						'max'               => '',
						'step'              => '',
					],
					[
						'key'               => 'field_' . $this->pt_ID . '_customer_location',
						'label'             => esc_html__( 'Адрес места нахождения', 'wp-ext-' . $this->domain_ID ),
						'name'              => $this->pt_ID . '_customer_location',
						'type'              => 'textarea',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => '',
						'maxlength'         => '',
						'rows'              => '',
						'new_lines'         => '',
					],
					[
						'key'               => 'field_' . $this->pt_ID . '_customer_mailing_address',
						'label'             => esc_html__( 'Почтовый адрес', 'wp-ext-' . $this->domain_ID ),
						'name'              => $this->pt_ID . '_customer_mailing_address',
						'type'              => 'textarea',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => '',
						'maxlength'         => '',
						'rows'              => '',
						'new_lines'         => '',
					],
					[
						'key'               => 'tab_' . $this->pt_ID . '_contacts',
						'label'             => esc_html__( 'Контактное лицо', 'wp-ext-' . $this->domain_ID ),
						'name'              => '',
						'type'              => 'tab',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'placement'         => 'left',
						'endpoint'          => 0,
					],
					[
						'key'               => 'field_' . $this->pt_ID . '_contact_organization',
						'label'             => esc_html__( 'Организация', 'wp-ext-' . $this->domain_ID ),
						'name'              => $this->pt_ID . '_contact_organization',
						'type'              => 'textarea',
						'instructions'      => '',
						'required'          => 1,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => '',
						'maxlength'         => '',
						'rows'              => '',
						'new_lines'         => '',
					],
					[
						'key'               => 'field_' . $this->pt_ID . '_contact_person',
						'label'             => esc_html__( 'Контактное лицо', 'wp-ext-' . $this->domain_ID ),
						'name'              => $this->pt_ID . '_contact_person',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
					],
					[
						'key'               => 'field_' . $this->pt_ID . '_contact_email',
						'label'             => esc_html__( 'Электронная почта', 'wp-ext-' . $this->domain_ID ),
						'name'              => $this->pt_ID . '_contact_email',
						'type'              => 'email',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
					],
					[
						'key'               => 'field_' . $this->pt_ID . '_contact_phone',
						'label'             => esc_html__( 'Телефон', 'wp-ext-' . $this->domain_ID ),
						'name'              => $this->pt_ID . '_contact_phone',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
					],
					[
						'key'               => 'field_' . $this->pt_ID . '_contact_fax',
						'label'             => esc_html__( 'Факс', 'wp-ext-' . $this->domain_ID ),
						'name'              => $this->pt_ID . '_contact_fax',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
					],
					[
						'key'               => 'tab_' . $this->pt_ID . '_storage',
						'label'             => esc_html__( 'Хранилище', 'wp-ext-' . $this->domain_ID ),
						'name'              => '',
						'type'              => 'tab',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'placement'         => 'left',
						'endpoint'          => 0,
					],
					[
						'key'               => 'field_' . $this->pt_ID . '_storage',
						'label'             => esc_html__( 'Хранилище', 'wp-ext-' . $this->domain_ID ),
						'name'              => $this->pt_ID . '_storage',
						'type'              => 'repeater',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'collapsed'         => '',
						'min'               => 0,
						'max'               => 0,
						'layout'            => 'table',
						'button_label'      => '',
						'sub_fields'        => [
							[
								'key'               => 'field_' . $this->pt_ID . '_file',
								'label'             => esc_html__( 'Файл', 'wp-ext-' . $this->domain_ID ),
								'name'              => 'file',
								'type'              => 'file',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => [
									'width' => '',
									'class' => '',
									'id'    => '',
								],
								'return_format'     => 'array',
								'library'           => 'all',
								'min_size'          => '',
								'max_size'          => '',
								'mime_types'        => 'zip',
							],
							[
								'key'               => 'field_' . $this->pt_ID . '_file_hash',
								'label'             => esc_html__( 'SHA-256 Hash', 'wp-ext-' . $this->domain_ID ),
								'name'              => 'file_hash',
								'type'              => 'textarea',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => [
									'width' => '',
									'class' => '',
									'id'    => '',
								],
								'default_value'     => '',
								'placeholder'       => '',
								'maxlength'         => '',
								'rows'              => '',
								'new_lines'         => '',
							],
						],
					],
					[
						'key'               => 'tab_' . $this->pt_ID . '_meta',
						'label'             => esc_html__( 'META-информация', 'wp-ext-' . $this->domain_ID ),
						'name'              => '',
						'type'              => 'tab',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'placement'         => 'left',
						'endpoint'          => 0,
					],
					[
						'key'               => 'field_' . $this->pt_ID . '_meta',
						'label'             => esc_html__( 'META-теги', 'wp-ext-' . $this->domain_ID ),
						'name'              => $this->pt_ID . '_meta',
						'type'              => 'taxonomy',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'taxonomy'          => $this->pt_ID . '_meta',
						'field_type'        => 'multi_select',
						'allow_null'        => 0,
						'add_term'          => 0,
						'save_terms'        => 1,
						'load_terms'        => 0,
						'return_format'     => 'id',
						'multiple'          => 0,
					],
				],
				'location'              => [
					[
						[
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => $this->pt_ID,
						],
					],
				],
				'menu_order'            => 0,
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen'        => '',
				'active'                => 1,
				'description'           => '',
			] );
		}
	}
}

/**
 * Helper function to retrieve the static object without using globals.
 *
 * @return WP_EXT_Purchase_Post_Field
 */
function WP_EXT_Purchase_Post_Field() {
	static $object;

	if ( null == $object ) {
		$object = new WP_EXT_Purchase_Post_Field;
	}

	return $object;
}

/**
 * Initialize the object on `plugins_loaded`.
 */
add_action( 'plugins_loaded', [ WP_EXT_Purchase_Post_Field(), 'run' ] );
