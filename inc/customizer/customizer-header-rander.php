<?php

class Travelfic_Customizer_Header
{

    public static function travelfic_toolkit_header_second_design($travelfic_header)
    {
        $travelfic_prefix = 'travelfic_customizer_settings_';
        // Sticky Settings Checked
        $travelfic_sticky_settings = get_theme_mod($travelfic_prefix.'stiky_header', 'disabled');
        if( isset( $travelfic_sticky_settings ) ){
            if( $travelfic_sticky_settings != 'disabled' ){
                $travelfic_sticky_class = 'tft_has_sticky';
            }else{
                $travelfic_sticky_class = '';
            }
        }

        // Transparent Header Settings Checked
        $travelfic_transparent_settings = get_theme_mod($travelfic_prefix.'transparent_header', 'disabled');
        $travelfic_transparent_showing = get_theme_mod($travelfic_prefix.'transparent_showing', 'both');
        if( isset( $travelfic_transparent_settings ) ){
            if( $travelfic_transparent_settings != 'disabled' ){
                if("both"==$travelfic_transparent_showing || "desktop"==$travelfic_transparent_showing){
                    $travelfic_desktop_transparent_class = 'tft_has_transparent';
                }
                if("both"==$travelfic_transparent_showing || "mobile"==$travelfic_transparent_showing){
                    $travelfic_mobile_transparent_class = 'tft_has_transparent';
                }
            }else{
                $travelfic_desktop_transparent_class = '';
                $travelfic_mobile_transparent_class = '';
            }
        }

        $travelfic_archive_transparent_showing = get_theme_mod($travelfic_prefix.'archive_transparent_header', 'disabled');
        if(is_archive()  || is_single() || is_404() || is_search()){
            if("disabled"==$travelfic_archive_transparent_showing ){
                $travelfic_desktop_transparent_class = '';
                $travelfic_mobile_transparent_class = '';
            }else{
                $travelfic_desktop_transparent_class = 'tft_has_transparent';
                $travelfic_mobile_transparent_class = 'tft_has_transparent';
            }
        }

        if (is_page()) {
            $disable_single_page = get_post_meta( get_the_ID(), 'tft-pmb-transfar-header', true );
            if(!empty($disable_single_page)){
                $travelfic_desktop_transparent_class = '';
                $travelfic_mobile_transparent_class = '';
            }
        }

        $design_2_topbar = get_theme_mod($travelfic_prefix.'header_design_2_topbar', '1');
        $design_2_phone = get_theme_mod($travelfic_prefix.'design_2_phone', '+88 00 123 456');
        $design_2_email = get_theme_mod($travelfic_prefix.'design_2_email', 'travello@outlook.com');
        $design_2_registration_url = get_theme_mod($travelfic_prefix.'design_2_registration_url', '#');
        $design_2_login_url = get_theme_mod($travelfic_prefix.'design_2_login_url', '#');
        $social_facebook = get_theme_mod($travelfic_prefix.'social_facebook', '#');
        $social_twitter = get_theme_mod($travelfic_prefix.'social_twitter', '#');
        $social_youtube = get_theme_mod($travelfic_prefix.'social_youtube', '#');
        $social_linkedin = get_theme_mod($travelfic_prefix.'social_linkedin', '#');
        $social_instagram = get_theme_mod($travelfic_prefix.'social_instagram', '#');
        $social_pinterest = get_theme_mod($travelfic_prefix.'social_pinterest', '#');
        $social_reddit = get_theme_mod($travelfic_prefix.'social_reddit', '#');
        $header_trasnparent_logo = get_theme_mod($travelfic_prefix . 'trasnparent_logo');
        $travelfic_header_bg = get_theme_mod($travelfic_prefix.'header_bg_color');
        ob_start();
    ?>
        <header class="tft-design-2 <?php echo esc_attr( $travelfic_sticky_class ); ?>">
            <?php if(!empty($design_2_topbar)){ ?>
            <div class="tft-top-header tft-w-padding <?php echo esc_attr( apply_filters( 'travelfic_header_2_tftcontainer', $travelfic_tftcontainer = '') ); ?>">
                <div class="tft-flex">
                    <div class="tft-contact-info">
                        <ul>
                            <?php
                            if(!empty($design_2_phone)){ ?>
                            <li>
                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.3333 7.70297C11.3333 7.47256 11.3333 7.35735 11.368 7.25465C11.4687 6.95629 11.7344 6.84051 12.0006 6.71926C12.2999 6.58295 12.4495 6.51479 12.5978 6.5028C12.7661 6.48919 12.9347 6.52545 13.0786 6.60619C13.2693 6.71323 13.4023 6.91662 13.5385 7.08201C14.1674 7.8459 14.4819 8.22784 14.5969 8.64904C14.6898 8.98894 14.6898 9.34439 14.5969 9.6843C14.4291 10.2986 13.8989 10.8136 13.5064 11.2903C13.3057 11.5341 13.2053 11.656 13.0786 11.7271C12.9347 11.8079 12.7661 11.8441 12.5978 11.8305C12.4495 11.8185 12.2999 11.7504 12.0006 11.6141C11.7344 11.4928 11.4687 11.377 11.368 11.0787C11.3333 10.976 11.3333 10.8608 11.3333 10.6304V7.70297Z" stroke="#FDF9F4" stroke-width="1.5"/>
                                <path d="M4.6665 7.70308C4.6665 7.41291 4.65836 7.15214 4.42378 6.94813C4.33846 6.87393 4.22534 6.82241 3.99911 6.71937C3.69984 6.58306 3.55021 6.5149 3.40194 6.50291C2.95711 6.46693 2.71778 6.77054 2.46125 7.08212C1.83234 7.84601 1.51788 8.22795 1.40281 8.64915C1.30996 8.98905 1.30996 9.3445 1.40281 9.68441C1.57064 10.2987 2.10085 10.8137 2.49331 11.2904C2.7407 11.5908 2.97702 11.865 3.40194 11.8306C3.55021 11.8187 3.69984 11.7505 3.99911 11.6142C4.22534 11.5111 4.33846 11.4596 4.42378 11.3854C4.65836 11.1814 4.6665 10.9206 4.6665 10.6305V7.70308Z" stroke="#FDF9F4" stroke-width="1.5"/>
                                <path d="M3.33325 6.5C3.33325 4.29086 5.42259 2.5 7.99992 2.5C10.5772 2.5 12.6666 4.29086 12.6666 6.5" stroke="#FDF9F4" stroke-width="1.5" stroke-linecap="square" stroke-linejoin="round"/>
                                <path d="M12.6665 11.832V12.3654C12.6665 13.5436 11.4726 14.4987 9.99984 14.4987H8.6665" stroke="#FDF9F4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <a href="tel:<?php echo esc_html( $design_2_phone ); ?>"><?php echo esc_html( $design_2_phone ); ?></a>
                            </li>
                            <?php }
                            if(!empty($design_2_email)){
                            ?>
                            <li>
                                <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="content">
                                <path id="Vector" d="M4.6665 4.16406L6.62785 5.32368C7.77132 5.99974 8.22836 5.99974 9.37183 5.32368L11.3332 4.16406" stroke="#FDF9F4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path id="Vector_2" d="M1.34376 7.48245C1.38735 9.52614 1.40914 10.548 2.16322 11.3049C2.91731 12.0619 3.96681 12.0883 6.0658 12.141C7.35946 12.1735 8.64038 12.1735 9.93404 12.141C12.033 12.0883 13.0825 12.0619 13.8366 11.3049C14.5907 10.548 14.6125 9.52613 14.6561 7.48245C14.6701 6.82532 14.6701 6.17208 14.6561 5.51496C14.6125 3.47127 14.5907 2.44943 13.8366 1.69247C13.0825 0.935519 12.033 0.909149 9.93404 0.85641C8.64038 0.823906 7.35946 0.823905 6.0658 0.856406C3.9668 0.90914 2.91731 0.935508 2.16322 1.69246C1.40913 2.44942 1.38734 3.47126 1.34376 5.51495C1.32975 6.17208 1.32975 6.82532 1.34376 7.48245Z" stroke="#FDF9F4" stroke-width="1.5" stroke-linejoin="round"/>
                                </g>
                                </svg>
                                <a href="mailto:<?php echo esc_html( $design_2_email ); ?>"><?php echo esc_html( $design_2_email ); ?></a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>

                    <div class="tft-social-share">
                        <ul>
                            <?php if(!empty($social_linkedin)){ ?>
                            <li>
                                <a href="<?php echo esc_url($social_linkedin); ?>" target="_blank">
                                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.33203 13.6673V8.33398C4.33203 7.86804 4.33203 7.63507 4.25591 7.4513C4.15442 7.20627 3.95974 7.0116 3.71471 6.9101C3.53094 6.83398 3.29797 6.83398 2.83203 6.83398C2.36609 6.83398 2.13312 6.83398 1.94935 6.9101C1.70432 7.0116 1.50965 7.20627 1.40815 7.4513C1.33203 7.63507 1.33203 7.86804 1.33203 8.33399V13.6673C1.33203 14.1333 1.33203 14.3662 1.40815 14.55C1.50965 14.795 1.70432 14.9897 1.94935 15.0912C2.13312 15.1673 2.36609 15.1673 2.83203 15.1673C3.29797 15.1673 3.53094 15.1673 3.71471 15.0912C3.95974 14.9897 4.15442 14.795 4.25591 14.55C4.33203 14.3662 4.33203 14.1333 4.33203 13.6673Z" fill="#FDF9F4"/>
                                    <path d="M4.33203 3.33398C4.33203 4.16241 3.66046 4.83398 2.83203 4.83398C2.0036 4.83398 1.33203 4.16241 1.33203 3.33398C1.33203 2.50556 2.0036 1.83398 2.83203 1.83398C3.66046 1.83398 4.33203 2.50556 4.33203 3.33398Z" fill="#FDF9F4"/>
                                    <path d="M8.21606 6.83398H7.66536C7.03683 6.83398 6.72256 6.83398 6.52729 7.02925C6.33203 7.22451 6.33203 7.53878 6.33203 8.16732V13.834C6.33203 14.4625 6.33203 14.7768 6.52729 14.9721C6.72256 15.1673 7.03683 15.1673 7.66536 15.1673H7.99871C8.62725 15.1673 8.94151 15.1673 9.13677 14.9721C9.33204 14.7768 9.33204 14.4625 9.33205 13.834L9.33207 11.5007C9.33207 10.3962 9.68411 9.50073 10.7239 9.50073C11.2439 9.50073 11.6653 9.94845 11.6653 10.5007V13.5007C11.6653 14.1293 11.6653 14.4435 11.8606 14.6388C12.0559 14.8341 12.3701 14.8341 12.9987 14.8341H13.3312C13.9596 14.8341 14.2738 14.8341 14.469 14.6389C14.6643 14.4437 14.6644 14.1295 14.6645 13.5011L14.6654 9.83414C14.6654 8.17729 13.0896 6.83414 11.5299 6.83414C10.642 6.83414 9.8498 7.26938 9.33207 7.94995C9.33206 7.52994 9.33205 7.31994 9.2408 7.16398C9.18302 7.06523 9.10079 6.98301 9.00204 6.92523C8.84608 6.83398 8.63607 6.83398 8.21606 6.83398Z" fill="#FDF9F4"/>
                                    </svg>
                                </a>
                            </li>
                            <?php }
                            if(!empty($social_facebook)){
                            ?>
                            <li>
                                <a href="<?php echo esc_url($social_facebook); ?>" target="_blank">
                                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.11991 7.38563C3.46807 7.38563 3.33203 7.51353 3.33203 8.12637V9.23749C3.33203 9.85033 3.46807 9.97823 4.11991 9.97823H5.69567V14.4227C5.69567 15.0355 5.83171 15.1634 6.48355 15.1634H8.0593C8.71114 15.1634 8.84718 15.0355 8.84718 14.4227V9.97823H10.6165C11.1109 9.97823 11.2383 9.88789 11.3741 9.44098L11.7117 8.32987C11.9444 7.56432 11.801 7.38563 10.9542 7.38563H8.84718V5.53378C8.84718 5.12468 9.19993 4.79304 9.63506 4.79304H11.8775C12.5293 4.79304 12.6654 4.66514 12.6654 4.0523V2.57082C12.6654 1.95798 12.5293 1.83008 11.8775 1.83008H9.63506C7.45939 1.83008 5.69567 3.48828 5.69567 5.53378V7.38563H4.11991Z" fill="#FDF9F4"/>
                                    </svg>
                                </a>
                            </li>
                            <?php }
                            if(!empty($social_twitter)){
                            ?>
                            <li>
                                <a href="<?php echo esc_url($social_twitter); ?>" target="_blank">
                                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.33203 12.8366C2.50872 13.5173 3.87488 13.8366 5.33203 13.8366C9.65256 13.8366 13.1731 10.4116 13.3268 6.12857L14.6654 3.50326L12.4292 3.83659C11.9592 3.42168 11.3417 3.16992 10.6654 3.16992C8.95044 3.16992 7.66582 4.84815 8.07932 6.48994C5.71059 6.64277 3.56448 5.18412 2.32332 3.24007C1.49968 6.03782 2.26289 9.40732 4.33203 11.4836C4.33203 12.2679 2.33203 12.7358 1.33203 12.8366Z" fill="#FDF9F4"/>
                                    </svg>
                                </a>
                            </li>
                            <?php }
                            if(!empty($social_youtube)){
                            ?>
                            <li>
                                <a href="<?php echo esc_url($social_youtube); ?>" target="_blank">
                                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.9987 14.1634C9.20516 14.1634 10.3621 14.0442 11.4343 13.8257C12.7736 13.5527 13.4432 13.4162 14.0543 12.6305C14.6654 11.8448 14.6654 10.9429 14.6654 9.13911V7.85438C14.6654 6.05057 14.6654 5.14866 14.0543 4.36299C13.4432 3.57733 12.7736 3.44083 11.4343 3.16783C10.3621 2.94926 9.20516 2.83008 7.9987 2.83008C6.79224 2.83008 5.63529 2.94926 4.56307 3.16783C3.2238 3.44083 2.55417 3.57733 1.9431 4.36299C1.33203 5.14866 1.33203 6.05057 1.33203 7.85438V9.13911C1.33203 10.9429 1.33203 11.8448 1.9431 12.6305C2.55417 13.4162 3.2238 13.5527 4.56307 13.8257C5.63529 14.0442 6.79224 14.1634 7.9987 14.1634Z" fill="#FDF9F4"/>
                                    <path d="M10.6414 8.70793C10.5425 9.11183 10.0161 9.40191 8.96324 9.98206C7.81817 10.613 7.24562 10.9285 6.78187 10.807C6.6248 10.7658 6.48013 10.6934 6.35866 10.5952C6 10.3053 6 9.70329 6 8.49935C6 7.2954 6 6.69343 6.35866 6.40347C6.48013 6.30526 6.6248 6.23287 6.78187 6.19171C7.24562 6.07016 7.81816 6.38565 8.96324 7.01663C10.0161 7.59679 10.5425 7.88687 10.6414 8.29076C10.6751 8.42819 10.6751 8.57051 10.6414 8.70793Z" fill="#595349"/>
                                    </svg>
                                </a>
                            </li>
                            <?php }
                            if(!empty($social_pinterest)){
                            ?>
                            <li>
                                <a href="<?php echo esc_url($social_pinterest); ?>" target="_blank">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="8.00065" cy="7.9987" r="6.66667" fill="#FDF9F4"/>
                                    <path d="M8.00065 7.33203L5.33398 13.9987" stroke="#595349" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M6.65042 11.0476C7.06334 11.2309 7.52043 11.3327 8.0013 11.3327C9.84225 11.3327 11.3346 9.8403 11.3346 7.99935C11.3346 6.1584 9.84225 4.66602 8.0013 4.66602C6.16035 4.66602 4.66797 6.1584 4.66797 7.99935C4.66797 8.60654 4.83042 9.17573 5.11411 9.66602" stroke="#595349" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </li>
                            <?php }
                            if(!empty($social_reddit)){
                            ?>
                            <li>
                                <a href="<?php echo esc_url($social_reddit); ?>" target="_blank">
                                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="8" cy="10.8333" rx="6" ry="4.33333" fill="#FDF9F4"/>
                                    <path d="M10.3346 11.6855C9.67789 12.1974 8.87209 12.4988 8.0013 12.4988C7.13051 12.4988 6.32471 12.1974 5.66797 11.6855" stroke="#595349" stroke-linecap="round"/>
                                    <ellipse cx="12.6673" cy="3.16536" rx="1.33333" ry="1.33333" stroke="#FDF9F4"/>
                                    <path d="M12 7.2129C12.2458 6.78702 12.7089 6.5 13.2397 6.5C14.0278 6.5 14.6667 7.13281 14.6667 7.91342C14.6667 8.45799 14.3557 8.93063 13.9001 9.16667" stroke="#FDF9F4" stroke-linecap="round"/>
                                    <path d="M4.00065 7.2129C3.75482 6.78702 3.29174 6.5 2.76097 6.5C1.97287 6.5 1.33398 7.13281 1.33398 7.91342C1.33398 8.45799 1.64491 8.93063 2.10053 9.16667" stroke="#FDF9F4" stroke-linecap="round"/>
                                    <path d="M11.3333 3.16602C9.76198 3.16602 8.97631 3.16602 8.48816 3.65417C8 4.14233 8 4.928 8 6.49935" stroke="#FDF9F4" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M6.00599 9.16602L6 9.16602" stroke="#595349" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M10.006 9.16602L10 9.16602" stroke="#595349" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </li>
                            <?php }
                            if(!empty($social_instagram)){
                            ?>
                            <li>
                                <a href="<?php echo esc_url($social_instagram); ?>" target="_blank">
                                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.66602 8.5013C1.66602 5.51574 1.66602 4.02296 2.59351 3.09546C3.52101 2.16797 5.01379 2.16797 7.99935 2.16797C10.9849 2.16797 12.4777 2.16797 13.4052 3.09546C14.3327 4.02296 14.3327 5.51574 14.3327 8.5013C14.3327 11.4869 14.3327 12.9796 13.4052 13.9071C12.4777 14.8346 10.9849 14.8346 7.99935 14.8346C5.01379 14.8346 3.52101 14.8346 2.59351 13.9071C1.66602 12.9796 1.66602 11.4869 1.66602 8.5013Z" fill="#FDF9F4"/>
                                    <path d="M11 8.5C11 10.1569 9.65685 11.5 8 11.5C6.34315 11.5 5 10.1569 5 8.5C5 6.84315 6.34315 5.5 8 5.5C9.65685 5.5 11 6.84315 11 8.5Z" fill="#FDF9F4" stroke="#595349"/>
                                    <path d="M11.6719 4.83398L11.6659 4.83398" stroke="#595349" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php } ?>

            <div class="tft-menus-section tft-header-desktop tft-w-padding <?php echo esc_attr( $travelfic_desktop_transparent_class ); ?>  <?php echo esc_attr( apply_filters( 'travelfic_header_2_tftcontainer', $travelfic_tftcontainer = '') ); ?>" style="background: <?php echo $travelfic_transparent_settings != 'enabled' && !empty($travelfic_header_bg) ? esc_attr($travelfic_header_bg) : '' ?>">
                <div class="tft-flex">
                    <div class="tft-menu">
                        <nav class="tft-site-navigation">
                            <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'primary_menu',
                                    'menu_id'        => 'navigation',
                                    'container'      => 'ul',
                                    'menu_class'     => 'main--header-menu'
                                ));
                            ?>
                        </nav>
                    </div>
                    <div class="tft-logo">
                    <?php
                    if($travelfic_transparent_settings == 'enabled'){
                        if(!empty($header_trasnparent_logo)){ ?>
                        <a href="<?php echo esc_url(home_url('/')) ?>">
                            <img src="<?php echo esc_url($header_trasnparent_logo); ?>" alt="<?php esc_html_e("Logo", "travelfic-toolkit"); ?>">
                        </a>
                        <?php }else{ ?>
                        <div class="logo-text">
                            <a href="<?php echo esc_url(home_url('/')) ?>">
                                <?php bloginfo('name'); ?>
                            </a>
                        </div>
                        <?php
                        }
                    }else{
                        if (has_custom_logo()) {
                            if (function_exists('the_custom_logo')) {
                                the_custom_logo();
                            }
                        } else {
                        ?>
                        <div class="logo-text">
                            <a href="<?php echo esc_url(home_url('/')) ?>">
                                <?php bloginfo('name'); ?>
                            </a>
                        </div>
                    <?php } } ?>
                    </div>
                    <div class="tft-account">
                        <ul>
                            <?php
                            if ( is_user_logged_in() ) {
                                $dashboard_url = get_option("tf_dashboard_page_id") ? get_permalink(get_option("tf_dashboard_page_id")) : site_url('my-account/');
                            ?>
                            <li>
                                <a href="<?php echo esc_url( $dashboard_url ); ?>" class="login"><?php echo esc_html_e("Profile", "travelfic-toolkit"); ?></a>
                            </li>
                            <?php
                            }else{
                            if(!empty($design_2_registration_url)){ ?>
                            <li>
                                <a href="<?php echo esc_url( $design_2_registration_url ); ?>"><?php echo esc_html_e("Register", "travelfic-toolkit"); ?></a>
                            </li>
                            <?php } if(!empty($design_2_login_url)){ ?>
                            <li>
                                <a href="<?php echo esc_url( $design_2_login_url ); ?>" class="login"><?php echo esc_html_e("Login", "travelfic-toolkit"); ?></a>
                            </li>
                            <?php } } ?>
                        </ul>
                    </div>
                </div>
            </div>



            <div class="tft-menus-section tft-header-mobile <?php echo esc_attr( $travelfic_mobile_transparent_class ); ?>">
                <div class="tft-main-header-wrapper <?php echo esc_attr( apply_filters( 'travelfic_header_tftcontainer', $travelfic_tftcontainer = '') ); ?> tft-container-flex align-center justify-sp-between tft-w-padding">

                    <div class="tft-header-left site-header-section">
                        <div class="site--brand-logo">
                            <?php
                            if (has_custom_logo()) {
                                the_custom_logo();
                            } else { ?>
                            <div class="logo-text">
                                <a href="<?php echo esc_url(home_url('/')) ?>">
                                    <?php bloginfo('name'); ?>
                                </a>
                            </div>
                            <?php  } ?>
                        </div>
                    </div>
                    <!-- Site Search Bar -->
                    <div class="tft-header-center site-header-section">
                        <a href="#" class="tft-mobile_menubar">
                            <div class="tft-menubar-active">
                                <i class="fas fa-bars"></i>
                            </div>
                            <div class="tft-menubar-close">
                                <i class="fas fa-times"></i>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="<?php echo esc_attr( apply_filters( 'travelfic_header_tftcontainer', $travelfic_tftcontainer = '') ); ?> site-header-section tft-mobile-main-menu">
                    <nav class="tft-site-navigation">
                        <?php
                        $travelfic_current_active_theme = !empty(get_option('stylesheet')) ? get_option('stylesheet') : 'No';
                        $travelfic_walker_menu = "";
                        if ( $travelfic_current_active_theme == 'travelfic' || $travelfic_current_active_theme == 'travelfic-child' ) {
                            $travelfic_walker_menu = new Travelfic_Custom_Nav_Walker();
                        }
                        if ( $travelfic_current_active_theme == 'ultimate-hotel-booking' || $travelfic_current_active_theme == 'ultimate-hotel-booking-child' ) {
                            $travelfic_walker_menu = new Ultimate_hotel_booking_Custom_Nav_Walker();
                        }
                        wp_nav_menu(array(
                            'theme_location' => 'primary_menu',
                            'menu_id'        => 'navigation',
                            'container' => 'ul',
                            'menu_class' => 'main--header-menu tft-flex',
                            'walker' => has_nav_menu('primary_menu') ?  $travelfic_walker_menu : '',
                        ));
                        ?>

                         <?php if( is_user_logged_in() || !empty( $design_2_registration_url ) && !empty($design_2_login_url) ) : ?>

                            <!-- Login/Register Links for Hamburger Menu -->
                            <div class="tft-mobile-account" style="padding-top: 15px;">
                                <ul>
                                    <?php
                                    if ( is_user_logged_in() ) {
                                        $dashboard_url = get_option("tf_dashboard_page_id") ? get_permalink(get_option("tf_dashboard_page_id")) : site_url('my-account/');
                                    ?>
                                    <li>
                                        <a href="<?php echo esc_url($dashboard_url); ?>" class="login"><?php echo esc_html_e("Profile", "travelfic-toolkit"); ?></a>
                                    </li>
                                    <?php
                                    }else{
                                    if(!empty($design_2_registration_url)){ ?>
                                    <li>
                                        <a href="<?php echo esc_url( $design_2_registration_url ); ?>"><?php echo esc_html_e("Register", "travelfic-toolkit"); ?></a>
                                    </li>
                                    <?php } if(!empty($design_2_login_url)){ ?>
                                    <li>
                                        <a href="<?php echo esc_url( $design_2_login_url ); ?>" class="login"><?php echo esc_html_e("Login", "travelfic-toolkit"); ?></a>
                                    </li>
                                    <?php } } ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <div class="tft-social-share">
                            <ul>
                                <?php if(!empty($social_linkedin)){ ?>
                                <li>
                                    <a href="<?php echo esc_url($social_linkedin); ?>" target="_blank">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="content">
                                        <path id="Vector 6810" d="M4.41602 15.4596V8.79297C4.41602 7.9711 4.41602 7.56016 4.18903 7.28358C4.14747 7.23294 4.10104 7.18651 4.05041 7.14496C3.77382 6.91797 3.36289 6.91797 2.54102 6.91797C1.71915 6.91797 1.30821 6.91797 1.03162 7.14496C0.980988 7.18651 0.934559 7.23294 0.893005 7.28358C0.666016 7.56016 0.666016 7.9711 0.666016 8.79297V15.4596C0.666016 16.2815 0.666016 16.6924 0.893005 16.969C0.934559 17.0197 0.980988 17.0661 1.03162 17.1076C1.30821 17.3346 1.71915 17.3346 2.54102 17.3346C3.36289 17.3346 3.77382 17.3346 4.05041 17.1076C4.10104 17.0661 4.14747 17.0197 4.18903 16.969C4.41602 16.6924 4.41602 16.2815 4.41602 15.4596Z" stroke="#595349"/>
                                        <path id="Ellipse 1922" d="M4.41602 2.54297C4.41602 3.5785 3.57655 4.41797 2.54102 4.41797C1.50548 4.41797 0.666016 3.5785 0.666016 2.54297C0.666016 1.50743 1.50548 0.667969 2.54102 0.667969C3.57655 0.667969 4.41602 1.50743 4.41602 2.54297Z" stroke="#595349"/>
                                        <path id="Vector" d="M9.27106 6.91797H8.58268C7.79701 6.91797 7.40417 6.91797 7.16009 7.16205C6.91602 7.40612 6.91602 7.79896 6.91602 8.58464V15.668C6.91602 16.4536 6.91602 16.8465 7.16009 17.0906C7.40417 17.3346 7.79701 17.3346 8.58268 17.3346H8.99937C9.78503 17.3346 10.1779 17.3346 10.4219 17.0906C10.666 16.8465 10.666 16.4537 10.666 15.668L10.6661 12.7514C10.6661 11.3707 11.1061 10.2514 12.4059 10.2514C13.0558 10.2514 13.5827 10.811 13.5827 11.5014V15.2514C13.5827 16.0371 13.5827 16.4299 13.8267 16.674C14.0708 16.9181 14.4636 16.9181 15.2493 16.9181H15.665C16.4505 16.9181 16.8432 16.9181 17.0873 16.6741C17.3313 16.4301 17.3314 16.0373 17.3316 15.2518L17.3327 10.6682C17.3327 8.5971 15.363 6.91817 13.4133 6.91817C12.3035 6.91817 11.3132 7.46221 10.6661 8.31293C10.666 7.78792 10.666 7.52541 10.552 7.33047C10.4797 7.20702 10.377 7.10425 10.2535 7.03202C10.0586 6.91797 9.79607 6.91797 9.27106 6.91797Z" stroke="#595349" stroke-linejoin="round"/>
                                        </g>
                                        </svg>
                                    </a>
                                </li>
                                <?php }
                                if(!empty($social_facebook)){
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($social_facebook); ?>" target="_blank">
                                        <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="content">
                                        <path id="Path" fill-rule="evenodd" clip-rule="evenodd" d="M2.15086 7.60851C1.33607 7.60851 1.16602 7.76838 1.16602 8.53443V9.92332C1.16602 10.6894 1.33607 10.8492 2.15086 10.8492H4.12056V16.4048C4.12056 17.1709 4.29061 17.3307 5.10541 17.3307H7.07511C7.8899 17.3307 8.05996 17.1709 8.05996 16.4048V10.8492H10.2716C10.8896 10.8492 11.0488 10.7363 11.2186 10.1777L11.6407 8.78881C11.9315 7.83186 11.7523 7.60851 10.6937 7.60851H8.05996V5.29369C8.05996 4.78232 8.50089 4.36777 9.0448 4.36777H11.8478C12.6626 4.36777 12.8327 4.20789 12.8327 3.44184V1.58999C12.8327 0.823939 12.6626 0.664062 11.8478 0.664062H9.0448C6.32522 0.664063 4.12056 2.73682 4.12056 5.29369V7.60851H2.15086Z" stroke="#595349" stroke-linejoin="round"/>
                                        </g>
                                        </svg>
                                    </a>
                                </li>
                                <?php }
                                if(!empty($social_twitter)){
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($social_twitter); ?>" target="_blank">
                                        <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="content">
                                        <path id="Vector" d="M0.666016 13.4193C2.13688 14.2701 3.84458 14.6693 5.66602 14.6693C11.0667 14.6693 15.4674 10.388 15.6595 5.03425L17.3327 1.7526L14.5375 2.16927C13.9499 1.65063 13.1781 1.33594 12.3327 1.33594C10.189 1.33594 8.58326 3.43372 9.10013 5.48596C6.13921 5.677 3.45657 3.85369 1.90512 1.42363C0.875573 4.92081 1.82959 9.13268 4.41602 11.7281C4.41602 12.7084 1.91602 13.2933 0.666016 13.4193Z" stroke="#595349" stroke-linejoin="round"/>
                                        </g>
                                        </svg>
                                    </a>
                                </li>
                                <?php }
                                if(!empty($social_youtube)){
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($social_youtube); ?>" target="_blank">
                                        <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="content">
                                        <path id="Vector" d="M8.99935 15.0807C10.5074 15.0807 11.9536 14.9318 13.2939 14.6585C14.968 14.3173 15.805 14.1467 16.5688 13.1646C17.3327 12.1825 17.3327 11.0551 17.3327 8.80035V7.19444C17.3327 4.93967 17.3327 3.81229 16.5688 2.83021C15.805 1.84813 14.968 1.6775 13.2939 1.33625C11.9536 1.06304 10.5074 0.914062 8.99935 0.914062C7.49128 0.914062 6.04509 1.06304 4.70481 1.33625C3.03073 1.6775 2.19369 1.84813 1.42985 2.83021C0.666016 3.81229 0.666016 4.93967 0.666016 7.19444V8.80035C0.666016 11.0551 0.666016 12.1825 1.42985 13.1646C2.19369 14.1467 3.03073 14.3173 4.70481 14.6585C6.04509 14.9318 7.49128 15.0807 8.99935 15.0807Z" stroke="#595349"/>
                                        <path id="Vector 3642" d="M12.3018 8.25943C12.1781 8.7643 11.5201 9.12689 10.204 9.85209C8.77271 10.6408 8.05703 11.0352 7.47733 10.8833C7.281 10.8318 7.10017 10.7413 6.94832 10.6186C6.5 10.2561 6.5 9.50363 6.5 7.9987C6.5 6.49377 6.5 5.7413 6.94832 5.37884C7.10017 5.25609 7.281 5.1656 7.47733 5.11414C8.05703 4.96221 8.7727 5.35657 10.204 6.14531C11.5201 6.8705 12.1781 7.2331 12.3018 7.73797C12.3439 7.90975 12.3439 8.08765 12.3018 8.25943Z" stroke="#595349" stroke-linejoin="round"/>
                                        </g>
                                        </svg>
                                    </a>
                                </li>
                                <?php }
                                if(!empty($social_pinterest)){
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($social_pinterest); ?>" target="_blank">

                                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="content">
                                        <path id="Vector" d="M8.00004 6.83594L5.33337 13.5026" stroke="#595349" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path id="Vector_2" d="M6.6492 10.5495C7.06212 10.7328 7.51921 10.8346 8.00008 10.8346C9.84103 10.8346 11.3334 9.34225 11.3334 7.5013C11.3334 5.66035 9.84103 4.16797 8.00008 4.16797C6.15913 4.16797 4.66675 5.66035 4.66675 7.5013C4.66675 8.10849 4.8292 8.67769 5.11289 9.16797" stroke="#595349" stroke-linecap="round" stroke-linejoin="round"/>
                                        <circle id="Ellipse 1794" cx="8.00004" cy="7.5026" r="6.66667" stroke="#595349"/>
                                        </g>
                                        </svg>

                                    </a>
                                </li>
                                <?php }
                                if(!empty($social_reddit)){
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($social_reddit); ?>" target="_blank">

                                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="content">
                                        <ellipse id="Ellipse 1794" cx="8" cy="9.83333" rx="6" ry="4.33333" stroke="#595349"/>
                                        <path id="Ellipse 1796" d="M10.3334 10.6875C9.67667 11.1993 8.87087 11.5008 8.00008 11.5008C7.12929 11.5008 6.32349 11.1993 5.66675 10.6875" stroke="#595349" stroke-linecap="round"/>
                                        <ellipse id="Ellipse 1795" cx="12.6667" cy="2.16927" rx="1.33333" ry="1.33333" stroke="#595349"/>
                                        <path id="Vector" d="M12 6.2129C12.2458 5.78702 12.7089 5.5 13.2397 5.5C14.0278 5.5 14.6667 6.13281 14.6667 6.91342C14.6667 7.45799 14.3557 7.93063 13.9001 8.16667" stroke="#595349" stroke-linecap="round"/>
                                        <path id="Vector_2" d="M4.00004 6.2129C3.75421 5.78702 3.29113 5.5 2.76036 5.5C1.97226 5.5 1.33337 6.13281 1.33337 6.91342C1.33337 7.45799 1.6443 7.93063 2.09991 8.16667" stroke="#595349" stroke-linecap="round"/>
                                        <path id="Vector 6379" d="M11.3333 2.16797C9.76198 2.16797 8.97631 2.16797 8.48816 2.65612C8 3.14428 8 3.92995 8 5.5013" stroke="#595349" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path id="Vector_3" d="M6.00538 8.16797L5.99939 8.16797" stroke="#595349" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path id="Vector_4" d="M10.0054 8.16797L9.99939 8.16797" stroke="#595349" stroke-linecap="round" stroke-linejoin="round"/>
                                        </g>
                                        </svg>

                                    </a>
                                </li>
                                <?php }
                                if(!empty($social_instagram)){
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($social_instagram); ?>" target="_blank">

                                    <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="content">
                                    <path id="Vector" d="M0.666626 7.4974C0.666626 4.51183 0.666626 3.01905 1.59412 2.09156C2.52162 1.16406 4.0144 1.16406 6.99996 1.16406C9.98552 1.16406 11.4783 1.16406 12.4058 2.09156C13.3333 3.01905 13.3333 4.51183 13.3333 7.4974C13.3333 10.483 13.3333 11.9757 12.4058 12.9032C11.4783 13.8307 9.98552 13.8307 6.99996 13.8307C4.0144 13.8307 2.52162 13.8307 1.59412 12.9032C0.666626 11.9757 0.666626 10.483 0.666626 7.4974Z" stroke="#595349" stroke-linejoin="round"/>
                                    <path id="Ellipse 1794" d="M10 7.5C10 9.15685 8.65685 10.5 7 10.5C5.34315 10.5 4 9.15685 4 7.5C4 5.84315 5.34315 4.5 7 4.5C8.65685 4.5 10 5.84315 10 7.5Z" stroke="#595349"/>
                                    <path id="Vector_2" d="M10.6724 3.83203L10.6664 3.83203" stroke="#595349" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    </svg>

                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>


        </header>

    <?php
        $travelfic_header = ob_get_clean();
        return $travelfic_header;
    }

}