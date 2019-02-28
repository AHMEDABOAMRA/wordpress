<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <?php finance_viewport(); ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
// loading
$loader = finance_option('general','enable-loader');
if( isset($loader) ) echo '<div class="loader"><div class="loader-wrapper"><div class="loader__bar"></div><div class="loader__bar"></div><div class="loader__bar"></div><div class="loader__bar"></div><div class="loader__bar"></div><div class="loader__ball"></div></div></div>';
// top hook
do_action( 'finance_hook_top' ); ?>

<!-- **Wrapper** -->
<div class="wrapper">
	<div class="inner-wrapper">

		<!-- **Header Wrapper** -->
        <?php $hdarkbg = finance_option('layout','header-darkbg'); $class = isset( $hdarkbg ) ? "dt-sc-dark-bg" : ""; ?>
		<div id="header-wrapper" class="<?php echo esc_attr( $class );?>">
            <!-- **Header** -->
            <header id="header"><?php
				//top bar
				$topbar 	= finance_option('layout','layout-topbar');
				$topcontent = finance_option('layout','top-content');
				if( isset($topbar) && isset($topcontent) && $topcontent != '' ):?>
                    <div class="top-bar">
                        <div class="container"><?php
							$content = finance_option('layout','top-content');
							$content = do_shortcode( stripslashes($content) );
							echo finance_wp_kses( $content );?>
                        </div>
                    </div><?php
				endif;

				// header types
				$htype = finance_option('layout','header-type');
				if( $htype != "left-header" && $htype != "left-header-boxed" && $htype != "creative-header" && $htype != "overlay-header" ):
					// header position
					$headerpos = finance_option('layout','header-position');
					if( isset($headerpos) && $headerpos == 'below slider' ):
						echo finance_slider();
					endif;
				endif;?>

            	<!-- **Main Header Wrapper** -->
            	<div id="main-header-wrapper" class="main-header-wrapper">

            		<div class="container">

            			<!-- **Main Header** -->
            			<div class="main-header"><?php
							if( isset($htype) && ($htype == 'fullwidth-header header-align-center fullwidth-menu-header') ):?>
								<div class="header-left"><?php
									$leftcontent = finance_option('layout','menu-top-left-content');
									if( isset($leftcontent) && $leftcontent != '') :
										echo do_shortcode( stripcslashes( $leftcontent ) );
									else:
										echo '<div class="dt-sc-hr-invisible-xsmall"></div>';
									endif; ?>
                                </div><?php
							endif;

							finance_header_logo();
                            
							if( isset($htype) && (($htype == 'fullwidth-header header-align-center fullwidth-menu-header') || 
												  ($htype == 'fullwidth-header header-align-left fullwidth-menu-header')) ):?>
								<div class="header-right"><?php
									$rightcontent = finance_option('layout','menu-top-right-content');
									if( isset($rightcontent) && $rightcontent != '') :
										echo do_shortcode( stripcslashes( $rightcontent ) );
									endif; ?>
                                </div><?php
							endif; ?>

            				<div id="menu-wrapper" class="menu-wrapper <?php finance_opts_show('menu-active-type','');?>">
                            	<div class="dt-menu-toggle" id="dt-menu-toggle">
                                	<?php esc_html_e('Menu','finance');?>
                                    <span class="dt-menu-toggle-icon"></span>
                                </div><?php
								if( isset($htype) ):
									switch($htype):
										case 'split-header fullwidth-header':
										case 'split-header boxed-header':
												echo '<nav id="main-menu">';
												finance_wp_split_menu();
												echo '</nav>';
										break;
										
										case 'overlay-header':
												echo '<div class="overlay overlay-hugeinc">';
													echo '<div class="overlay-close"></div>';
													finance_wp_nav_menu(1);
												echo '</div>';
												echo '<div id="trigger-overlay"></div>';
										break;

										case 'fullwidth-header':
										case 'boxed-header':
										case 'two-color-header':
										default:
											finance_wp_nav_menu();
											require_once( FINANCE_THEME_DIR .'/headers/default.php' );
										break;
									endswitch;
								endif; ?>
            				</div><?php
							// left header
                            if( isset($htype) && ( $htype == 'left-header' || $htype == 'left-header-boxed' || $htype == 'creative-header') ): ?>
                                <div class="left-header-footer"><?php
									$content = finance_option('layout','menu-left-header-content');
									$content = do_shortcode( stripcslashes( $content ) );
									echo finance_wp_kses($content);?>
                                </div><?php
							endif; ?>
            			</div>
            		</div>
            	</div><!-- **Main Header** --><?php			
				if( $htype != "left-header" && $htype != "left-header-boxed" && $htype != "creative-header" && $htype != "overlay-header" ):
					// header position
					if( isset($headerpos) && $headerpos != 'below slider' ):
						echo finance_slider();
					endif;
				endif;?>

			</header><!-- **Header - End** -->
		</div><!-- **Header Wrapper - End** -->

		<?php if( $htype == "creative-header" ) echo '<div id="toggle-sidebar"></div>'; ?>

        <!-- **Main** -->
        <div id="main"><?php

			if( $htype == "left-header" || $htype == "left-header-boxed" || $htype == "creative-header" || $htype == "overlay-header" ):
				echo finance_slider();
			endif;

			// subtitle & breadcrumb section
			require_once( FINANCE_THEME_DIR .'/headers/breadcrumb.php' );
			
			$class = "container";
			
			if( is_page_template('tpl-portfolio.php') ) {
				$tpl_default_settings = get_post_meta($post->ID,'_tpl_default_settings',TRUE);
				$tpl_default_settings = is_array( $tpl_default_settings ) ? $tpl_default_settings  : array();
				$class =  isset( $tpl_default_settings['portfolio-fullwidth'] ) ? "portfolio-fullwidth-container" : "container"; 
            }

			if( is_singular('tribe_events') ) {
				$tpl_default_settings = get_post_meta($post->ID,'_custom_settings',TRUE);
				$tpl_default_settings = is_array( $tpl_default_settings ) ? $tpl_default_settings  : array();
				$post_style = array_key_exists( "event-post-style", $tpl_default_settings ) ? $tpl_default_settings['event-post-style'] : "type1";
				switch( $post_style ):
					case 'type2':
						$class = "event-type2-fullwidth";
						break;
					case 'type5':
						$class = "event-type5-fullwidth";
						break;
					default:
						$class = "container";
				endswitch;
			}

			if( is_singular() ) {
				$tpl_default_settings = get_post_meta($post->ID,'_custom_settings',TRUE);
				$tpl_default_settings = is_array( $tpl_default_settings ) ? $tpl_default_settings  : array();
				$class =  ( isset( $tpl_default_settings['layout'] ) ) && ( $tpl_default_settings['layout'] == 'fullwidth-container') ? "show-in-fullwidth" : $class;
			} ?>
            <!-- ** Container ** -->
            <div class="<?php echo esc_attr($class);?>"><?php
			do_action( 'finance_hook_content_before' ); ?>