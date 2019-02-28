<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <?php finance_viewport(); ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php wp_head(); ?>
</head>
<?php
$bg = finance_option('pageoptions','notfound-bg');
$opacity = finance_opts_get('notfound-bg-opacity', '1');
$position = finance_opts_get('notfound-bg-position', 'center center');
$repeat = finance_opts_get('notfound-bg-repeat', 'no-repeat');
$color = finance_option('pageoptions','notfound-bg-color');

$estyle = finance_option('pageoptions','notfound-bg-style');
$color = !empty($color) ? finance_hex2rgb($color) : array('f', 'f', 'f');
$style = !empty($bg) ? "background:url($bg) $position $repeat;" : '';
$style .= !empty($color) ? "background-color:rgba(  $color[0] ,  $color[1],  $color[2], {$opacity});" : '';
$style .= !empty($estyle) ? $estyle : ''; ?>

<body <?php body_class(); ?> style="<?php echo esc_attr($style); ?>">

<div class="wrapper">
	<div class="container">
        <div class="center-content-wrapper">
            <div class="center-content"><?php
                $pageid = finance_option('pageoptions','notfound-pageid');
                if( finance_option('pageoptions','enable-404message') && !empty($pageid) ):
                    $page = get_post( $pageid, ARRAY_A );
                    echo DTCoreShortcodesDefination::dtShortcodeHelper ( stripslashes($page['post_content']) );
                elseif( finance_option('pageoptions','enable-404message') ):
					echo '<div class="error-box square"><div class="error-box-inner"><h3>'.esc_html__('Oops!', 'finance').'</h3><h2>404</h2><h4>'.esc_html__('Page Not Found', 'finance').'</h4></div></div>';
					echo '<div class="dt-sc-hr-invisible-xsmall"></div>';
					echo '<p>'.esc_html__("It seems you've venured too far.", "finance").'</p><p>'.esc_html__('Maybe you can get on track by searching here.', 'finance').'</p>';
					echo '<div class="dt-sc-hr-invisible-xsmall"></div>';
                    echo '<a class="dt-sc-button filled small icon-right with-icon type2" target="_blank" href="'.esc_url(home_url('/')).'">'.esc_html__('Back to Home','finance').' <span class="fa fa-home"> </span></a>';
                endif; ?>
            </div>
        </div>
	</div>        
</div>
</body>
<?php wp_footer(); ?>
</html>