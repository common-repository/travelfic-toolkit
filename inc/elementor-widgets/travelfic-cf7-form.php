<?php
class Travelfic_Toolkit_CF7_Form extends \Elementor\Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve oEmbed widget name.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'tft-cf7-form';
    }

    /**
     * Get widget title.
     *
     * Retrieve oEmbed widget title.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Travelfic CF7 Forms', 'travelfic-toolkit' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve oEmbed widget icon.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-form-horizontal';
    }

    /**
     * Get custom help URL.
     *
     * Retrieve a URL where the user can get more information about the widget.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget help URL.
     */
    public function get_custom_help_url() {
        return 'https://developers.elementor.com/docs/widgets/';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the oEmbed widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget categories.
     */
    public function get_categories() {
        return ['travelfic'];
    }

    /**
     * Get widget keywords.
     *
     * Retrieve the list of keywords the oEmbed widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget keywords.
     */
    public function get_keywords() {
        return ['travelfic', 'form', 'cf7', 'tft', 'contact'];
    }

    public function get_style_depends() {
        return ['travelfic-toolkit-cf7-form'];
    }

    // Function to fetch Contact Form 7 forms
    private function get_contact_form_7_forms() {

        if( class_exists('WPCF7_ContactForm')){ 
            $forms = array();
            $args = array(
                'post_type' => 'wpcf7_contact_form',
                'posts_per_page' => -1,
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    $forms[] = WPCF7_ContactForm::get_instance(get_the_ID());
                }
            }
            wp_reset_postdata();
            return $forms;
        } else{
            
        }

    }
    public function get_cf7_from_id(){

        if( class_exists('WPCF7_ContactForm')){ 
            $forms = $this->get_contact_form_7_forms(); // Fetch available forms
            $form_options = array('' => __('Select a form', 'travelfic-toolkit'));
            foreach ($forms as $form) {
                $form_options[$form->title()] = $form->title();
            }
            return $form_options;
        } else{
            
        }
    }

    /**
     * Register oEmbed widget controls.
     *
     * Add input fields to allow the user to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls() {

        $this->start_controls_section(
            'cf7_form',
            [
                'label' => __( 'Form', 'travelfic-toolkit' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'selected_form',
            [
                'label' => __('Select Form', 'travelfic-toolkit'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => $this->get_cf7_from_id(),
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'tour_destination_style',
            [
                'label' => __( 'Style', 'travelfic-toolkit' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'cf7_form_input',
            [
                'label'     => __( 'Input Fields', 'travelfic-toolkit' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'cf7_form_input_typo',
                'label'    => __( 'Typography', 'travelfic-toolkit' ),
                'selector' => '{{WRAPPER}} .tft-cf7-form-wrapper .wpcf7-form input[type=email], .tft-cf7-form-wrapper .wpcf7-form input[type=text], .tft-cf7-form-wrapper .wpcf7-form input[type=phone], .tft-cf7-form-wrapper .wpcf7-form textarea, .tft-cf7-form-wrapper .wpcf7-form label',
            ]
        );
        $this->add_control(
            'cf7_form_input_color',
            [
                'label'     => __( 'Input Color', 'travelfic-toolkit' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#666666',
                'selectors' => [
                    '{{WRAPPER}} .tft-cf7-form-wrapper .wpcf7-form input[type=email], .tft-cf7-form-wrapper .wpcf7-form input[type=text], .tft-cf7-form-wrapper .wpcf7-form input[type=phone], .tft-cf7-form-wrapper .wpcf7-form textarea' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'cf7_form_input_label',
            [
                'label'     => __( 'Label Color', 'travelfic-toolkit' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#1D2A3B',
                'selectors' => [
                    '{{WRAPPER}} .tft-cf7-form-wrapper .wpcf7-form label' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'cf7_form_input_bg',
            [
                'label'     => __( 'Background', 'travelfic-toolkit' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .tft-cf7-form-wrapper .wpcf7-form input[type=email], .tft-cf7-form-wrapper .wpcf7-form input[type=text], .tft-cf7-form-wrapper .wpcf7-form input[type=phone], .tft-cf7-form-wrapper .wpcf7-form textarea' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'cf7_form_input_field_padding',
            [
                'label' => __( 'Padding', 'travelfic-toolkit' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%', 'rem' ],
                'default' => [
                    'unit' => 'px',
                    'top' => 14,
                    'right' => 14,
                    'bottom' => 14,
                    'left' => 14,
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .tft-cf7-form-wrapper .wpcf7-form input[type=email], .tft-cf7-form-wrapper .wpcf7-form input[type=text], .tft-cf7-form-wrapper .wpcf7-form input[type=phone], .tft-cf7-form-wrapper .wpcf7-form textarea' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'cf7_form_input_field_radius',
            [
                'label' => __( 'Border Radius', 'travelfic-toolkit' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%', 'rem' ],
                'default' => [
                    'unit' => 'px',
                    'top' => 10,
                    'right' => 10,
                    'bottom' => 10,
                    'left' => 10,
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .tft-cf7-form-wrapper .wpcf7-form input[type=email], .tft-cf7-form-wrapper .wpcf7-form input[type=text], .tft-cf7-form-wrapper .wpcf7-form input[type=phone], .tft-cf7-form-wrapper .wpcf7-form textarea' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'cf7_form_button',
            [
                'label'     => __( 'Button Style', 'travelfic-toolkit' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'cf7_form_button',
                'label'    => __( 'Typography', 'travelfic-toolkit' ),
                'selector' => '{{WRAPPER}} .tft-cf7-form-wrapper .wpcf7-form .wpcf7-submit',
            ]
        );
        $this->add_responsive_control(
            'cf7_form_button_padding',
            [
                'label' => __( 'Padding', 'travelfic-toolkit' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%', 'rem' ],
                'default' => [
                    'unit' => 'px',
                    'top' => 14,
                    'right' => 24,
                    'bottom' => 14,
                    'left' => 24,
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .tft-cf7-form-wrapper .wpcf7-form .wpcf7-submit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'cf7_form_button_color',
            [
                'label'     => __( 'Color', 'travelfic-toolkit' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .tft-cf7-form-wrapper .wpcf7-form .wpcf7-submit' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'cf7_form_button_bg_color',
            [
                'label'     => __( 'Background Color', 'travelfic-toolkit' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#F15D30',
                'selectors' => [
                    '{{WRAPPER}} .tft-cf7-form-wrapper .wpcf7-form .wpcf7-submit' => 'background-color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_control(
            'cf7_form_button_bg_hover_color',
            [
                'label'     => __( 'Background Hover', 'travelfic-toolkit' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#D83B0B',
                'selectors' => [
                    '{{WRAPPER}} .tft-cf7-form-wrapper .wpcf7-form .wpcf7-submit:hover' => 'background-color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_control(
            'cf7_form_button_radius',
            [
                'label' => __( 'Border Radius', 'travelfic-toolkit' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%', 'rem' ],
                'default' => [
                    'unit' => 'px',
                    'top' => 10,
                    'right' => 10,
                    'bottom' => 10,
                    'left' => 10,
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .tft-cf7-form-wrapper .wpcf7-form .wpcf7-submit' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'cf7_form_notice',
            [
                'label'     => __( 'Notice', 'travelfic-toolkit' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_control(
            'cf7_form_notice_color',
            [
                'label'     => __( 'Color', 'travelfic-toolkit' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#00a0d2',
                'selectors' => [
                    '{{WRAPPER}} .tft-cf7-form-wrapper .wpcf7-response-output' => 'color: {{VALUE}};',
                ],
            ]
        );
        
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $selected_form = $settings['selected_form']; ?>
            <div class="tft-cf7-form-wrapper"> <?php 
                if (!empty($selected_form)) {
                    echo do_shortcode('[contact-form-7 title="' . esc_attr($selected_form) . '"]');
                } ?>
            </div> 
        <?php
}
}