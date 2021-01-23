<?php
/**
 * Customm Theme Development || Diesel IQ 2.0
 *
 * @package WordPress
 * @subpackage dieseliq
 * @since Diesel IQ 2.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
  <head>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo THEME_URI; ?>/css/css__oaAOsWMYr6G2l8HHsi6jD9mx8wSuRfe2VZcZzySF2RA__wQiiTM3ZmF_0_RCLdkoHlBsfr7uiPHH4aAsGOK2sL0c__4DhIZYAFoFq23Qtr6drancnuiDtWKiSAUd7dbZSrJIM.css">

    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
      <div id="wrapper" style="height: auto !important;">
        <header id="header" class="clearfix">

          <div id="site-logo">
            <a href="<?php echo esc_url(home_url());?>" title="Home">
              <img src="<?php echo get_theme_mod('dieseliq_header_logo_setting'); ?>" alt="Home">
            </a>
			  <span style="margin-left: 10%; color:#fff"> 
              <!-- Twitter Widdgets here -->
              <?php get_template_part('include/widgets/twitter-widget');?>
            </span>
            <h2 style="font-size:14px;color:#FFFFFF;font-weight:bold;font-style:italic;" id="site-slogan"><?php bloginfo( 'description' ); ?></h2>
          </div>

          <div class="social-profile">
            <!-- Facebook Widdgets here -->
            <?php get_template_part('include/widgets/facebook-widget');?>
          </div>

          <nav id="navigation" role="navigation">
            <div data-mediasize="768" class="responsive-menus responsive-menus-0-0 absolute"><span class="toggler"><i class="fa fa-bars"></i> Menu</span>
              <div id="main-menu" class="rm-no-class responsive-menus-simple">

                <?php if ( has_nav_menu( 'primary' ) ) : ?>
                  <?php
                      wp_nav_menu(
                          array(
                            'theme_location'  =>'primary',
                            'container'       => '',
                            'items_wrap'      => '<ul class="menu l_tinynavNaN" id="rm-no-id-1">%3$s</ul>',
                        )
                    );
                ?>
                <?php endif; ?>

                <select class="tinynav tinynavNaN mobNav" onchange="location = this.value;">
                  <option value="<?php echo get_page_link(6);?>">Home</option>
                  <option value="<?php echo get_page_link(48);?>">Repair Information</option>
                  <option value="<?php echo get_page_link(50);?>">&nbsp;&nbsp;OBDII Power Train  Codes</option>
                  <option value="https://service.dieseliq.com>">&nbsp;&nbsp;Your Vehicle Service History</option>
                  <option value="<?php echo get_page_link(69);?>">Power Stroke Parts Finder</option>
                  <option value="<?php echo get_page_link(72);?>">&nbsp;&nbsp;Power Stroke to International Cross Reference</option>
                  <option value="<?php echo get_page_link(37);?>">About Diesel IQ</option>
                  <option value="<?php echo get_page_link(41);?>">Contact</option>
                </select>

              </div>
            </div>
          </nav>
        </header>

        <div id="preface-area" class="clearfix"></div>