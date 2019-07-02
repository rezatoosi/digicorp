<?php

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Epsilon_Control_Toggle' ) ) {
    /**
     * Multiple checkbox customize control class.
     *
     * @since  1.0.0
     * @access public
     *
     */
    class Epsilon_Control_Toggle extends WP_Customize_Control {
        /**
         * The type of customize control being rendered.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $type = 'mte-toggle';
        /**
         * Displays the control content.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        public function render_content() {
            ?>
            <div class="checkbox_switch">
                <span class="customize-control-title onoffswitch_label"><?php echo esc_html( $this->label ); ?>
                    <?php if ( !empty($this->description) ): ?>
                    <i class="dashicons dashicons-editor-help" style="vertical-align: text-bottom; position: relative;">
                        <span class="mte-tooltip"><?php echo wp_kses_post( $this->description ); ?></span>
                    </i>
                    <?php endif; ?>
                </span>
                <div class="onoffswitch">
                    <input type="checkbox" id="<?php echo esc_attr( $this->id ); ?>"
                           name="<?php echo esc_attr( $this->id ); ?>" class="onoffswitch-checkbox"
                           value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link();
                    checked( $this->value() ); ?>>
                    <label class="onoffswitch-label" for="<?php echo esc_attr( $this->id ); ?>"></label>
                </div>
            </div>
            <?php
        }
    }
}

if ( ! class_exists( 'Epsilon_Control_Button' ) ):
    class Epsilon_Control_Button extends WP_Customize_Control {
        public $type = 'epsilon-button';
        public $text = '';
        public $section_id = '';
        public $icon = '';
        public function __construct( WP_Customize_Manager $manager, $id, array $args ) {
            parent::__construct( $manager, $id, $args );
        }
        public function to_json() {
            parent::to_json();
            $this->json['text']  = $this->text;
            $this->json['section_id']  = $this->section_id;
            $this->json['icon']  = $this->icon;
        }

        public function content_template() { ?>
            <div class="epsilon-button">
                <# if ( data.section_id ) { #>
                    <a href="#" class="epsilon-button" data-section="{{ data.section_id }}">
                        <# if ( data.icon ) { #>
                            <span class="dashicons {{ data.icon }}"></span>
                        <# } #>
                        {{ data.text }}</a>
                <# } #>
            </div>
        <?php }
    }
endif;
