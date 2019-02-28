<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <?php finance_viewport(); ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php wp_head(); ?>
</head>
<?php
$bg = finance_option('pageoptions','comingsoon-bg');
$opacity = finance_opts_get('comingsoon-bg-opacity', '1');
$position = finance_opts_get('comingsoon-bg-position', 'center center');
$repeat = finance_opts_get('comingsoon-bg-repeat', 'no-repeat');
$color = finance_option('pageoptions','comingsoon-bg-color');
$showcolor = finance_option('pageoptions','show-comingsoon-bg-color');

$estyle = finance_option('pageoptions','comingsoon-bg-style');

$color = !empty($color) ? finance_hex2rgb($color) : array('f', 'f', 'f');
$style = !empty($bg) ? "background:url($bg) $position $repeat;" : '';
$style .= (!empty($color) && isset($showcolor) ) ? "background-color:rgba(  $color[0],  $color[1],  $color[2], {$opacity});" : '';
$style .= !empty($estyle) ? $estyle : ''; ?>

<body <?php body_class(); ?> style="<?php echo esc_attr($style); ?>">

<div class="wrapper"><?php
	$pageid = finance_option('pageoptions','comingsoon-pageid');
	if( !empty($pageid) ):
		$page = get_post( $pageid, ARRAY_A );
		echo DTCoreShortcodesDefination::dtShortcodeHelper ( stripslashes($page['post_content']) );
	else:
		echo '<div class="uc-wrapper-inner">';
			echo '<h2>'.esc_html__('Website is almost ready', 'finance').'</h2>';
			echo '<p>'.esc_html__('Our website is under construction.', 'finance').'</p>';
			echo '<p>'.esc_html__("We'll be here soon with our new awesome.", 'finance').'</p>';
			echo '<div class="dt-sc-hr-invisible-xsmall"></div>';

			if( finance_option('pageoptions','show-launchdate') == 'true'):
				echo '<div class="downcount" data-date="11/10/2018" data-offset="+5">';
					echo '<div class="dt-sc-counter-wrapper">';
						echo '<div class="counter-icon-wrapper">';
							echo '<div class="dt-sc-counter-number days">00</div>';
						echo '</div>';
						echo '<h3 class="title">'.esc_html__('Days', 'finance').'</h3>';
					echo '</div>';
					echo '<div class="dt-sc-counter-wrapper">';
						echo '<div class="counter-icon-wrapper">';
							echo '<div class="dt-sc-counter-number hours">00</div>';
						echo '</div>';
						echo '<h3 class="title">'.esc_html__('Hours', 'finance').'</h3>';
					echo '</div>';
					echo '<div class="dt-sc-counter-wrapper">';
						echo '<div class="counter-icon-wrapper">';
							echo '<div class="dt-sc-counter-number minutes">00</div>';
						echo '</div>';
						echo '<h3 class="title">'.esc_html__('Minutes', 'finance').'</h3>';
					echo '</div>';
					echo '<div class="dt-sc-counter-wrapper">';
						echo '<div class="counter-icon-wrapper">';
							echo '<div class="dt-sc-counter-number seconds">00</div>';
						echo '</div>';
						echo '<h3 class="title">'.esc_html__('Seconds', 'finance').'</h3>';
					echo '</div>';
				echo '</div>';
			endif;	
		echo '</div>';
	endif; ?>
</div>
</body>
<?php wp_footer(); ?>
</html>