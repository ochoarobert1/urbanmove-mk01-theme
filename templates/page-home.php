<?php
/**
* Template Name: Landing Principal
*
* @package urbanmove
* @subpackage urbanmove-mk01-theme
* @since Mk. 1.0
*/
?>
<?php get_header(); ?>
<?php the_post(); ?>
<main class="container-fluid p-0" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
    <div class="row no-gutters">
        <div class="the-hero col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="container-fluid p-0">
                <div class="row align-items-center no-gutters">
                    <div class="hero-content col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="row no-gutters justify-content-center">
                            <div class="hero-middle-content col-xl-7 col-lg-8 col-md-10 col-sm-12 col-12" data-aos="fade-in" data-aos-delay="150">
                                <?php the_content(); ?>
                                <div class="line-hero"></div>
                            </div>
                        </div>
                    </div>
                    <div class="hero-image col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <?php $bg_banner_id = get_post_meta(get_the_ID(), 'umv_hero_banner_bg_id', true); ?>
                        <?php $bg_banner = wp_get_attachment_image_src($bg_banner_id, 'logo_larger', false); ?>
                        <img itemprop="logo" content="<?php echo $bg_banner[0];?>" src="<?php echo $bg_banner[0];?>" title="<?php echo get_post_meta( $bg_banner_id, '_wp_attachment_image_alt', true ); ?>" alt="<?php echo get_post_meta($bg_banner_id, '_wp_attachment_image_alt', true ); ?>" class="img-fluid" width="<?php echo $bg_banner[1]; ?>" height="<?php echo $bg_banner[2]; ?>" data-aos="fade-in" data-aos-delay="300" />
                    </div>
                </div>
            </div>
        </div>
        <div id="reservation" class="the-form col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="container">
                <div class="row">
                    <div class="form-container col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <?php get_template_part('templates/template-form-search'); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php $bg_banner_id = get_post_meta(get_the_ID(), 'umv_home_descanso_bg_id', true); ?>
        <?php $bg_banner = wp_get_attachment_image_src($bg_banner_id, 'full', false); ?>
        <div id="about" class="the-about col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="background: #FFF url(<?php echo $bg_banner[0]; ?>);">
            <div class="container">
                <div class="row align-items-center">
                    <div class="about-container col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" data-aos="fade-in" data-aos-delay="150">
                        <?php $arr_about = get_post_meta(get_the_ID(), 'umv_home_descanso_group', true); ?>
                        <?php if (!empty($arr_about)) : ?>
                        <?php foreach ($arr_about as $item) { ?>
                        <div class="about-item"><?php echo $item['text']; ?></div>
                        <?php } ?>
                        <?php endif; ?>
                    </div>
                    <div class="about-container about-image col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" data-aos="fade-in" data-aos-delay="300">
                        <?php $bg_banner_id = get_post_meta(get_the_ID(), 'umv_home_descanso_image_id', true); ?>
                        <?php $bg_banner = wp_get_attachment_image_src($bg_banner_id, 'large', false); ?>
                        <img itemprop="logo" content="<?php echo $bg_banner[0];?>" src="<?php echo $bg_banner[0];?>" title="<?php echo get_post_meta( $bg_banner_id, '_wp_attachment_image_alt', true ); ?>" alt="<?php echo get_post_meta($bg_banner_id, '_wp_attachment_image_alt', true ); ?>" class="img-fluid" width="<?php echo $bg_banner[1]; ?>" height="<?php echo $bg_banner[2]; ?>" />
                    </div>
                </div>
            </div>
        </div>
        <?php $bg_banner_id = get_post_meta(get_the_ID(), 'umv_home_slider_bg_id', true); ?>
        <?php $bg_banner = wp_get_attachment_image_src($bg_banner_id, 'full', false); ?>
        <div class="the-slider col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="background: url(<?php echo $bg_banner[0]; ?>);">
            <div class="container">
                <div class="row">
                    <div class="slider-container col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <?php $arr_slider = get_post_meta(get_the_ID(), 'umv_home_slider_group', true); ?>
                        <?php if (!empty($arr_slider)) : ?>
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <?php foreach ($arr_slider as $item) { ?>
                                <div class="swiper-slide">
                                    <div class="slider-item-wrapper">
                                        <div class="slider-icon">
                                            <?php $bg_banner = wp_get_attachment_image_src($item['icon_id'], 'avatar', false); ?>
                                            <img itemprop="logo" content="<?php echo $bg_banner[0];?>" src="<?php echo $bg_banner[0];?>" title="<?php echo get_post_meta( $item['icon_id'], '_wp_attachment_image_alt', true ); ?>" alt="<?php echo get_post_meta($item['icon_id'], '_wp_attachment_image_alt', true ); ?>" class="img-fluid" width="<?php echo $bg_banner[1]; ?>" height="<?php echo $bg_banner[2]; ?>" />
                                        </div>
                                        <?php echo apply_filters('the_content', $item['text']); ?>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php $bg_banner_id = get_post_meta(get_the_ID(), 'umv_home_cards_bg_id', true); ?>
        <?php $bg_banner = wp_get_attachment_image_src($bg_banner_id, 'full', false); ?>
        <div class="the-cards col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="background: #FFF url(<?php echo $bg_banner[0]; ?>);">
            <div class="container">
                <div class="row">
                    <div class="card-container col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" data-aos="fade-in">
                        <div class="card-main-content" data-aos="fade-in" data-aos-delay="300">
                            <?php echo apply_filters('the_content', get_post_meta(get_the_ID(), 'umv_home_cards_content', true)); ?>
                        </div>
                        <div class="card-testimonials">
                            <?php $arr_cards = get_post_meta(get_the_ID(), 'umv_home_testimonial_group', true); ?>
                            <?php if (!empty($arr_cards)) : ?>
                            <div class="row">
                                <?php foreach ($arr_cards as $item) { ?>
                                <div class="testimonials-item col-6" data-aos="fade-in" data-aos-delay="300">
                                    <div class="testimonial-item-wrapper">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/comillas.png" alt="Comillas" class="img-fluid img-comillas" />
                                        <div class="testimonial-content">
                                            <div class="star-container">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <?php echo apply_filters('the_content', $item['desc']); ?>
                                        </div>
                                        <div class="testimonial-author">
                                            <div class="input-group align-items-center">
                                                <?php $bg_banner = wp_get_attachment_image_src($item['image_id'], array('70', '70'), false); ?>
                                                <img itemprop="logo" content="<?php echo $bg_banner[0];?>" src="<?php echo $bg_banner[0];?>" title="<?php echo get_post_meta( $item['icon_id'], '_wp_attachment_image_alt', true ); ?>" alt="<?php echo get_post_meta($item['icon_id'], '_wp_attachment_image_alt', true ); ?>" class="img-fluid" width="<?php echo $bg_banner[1]; ?>" height="<?php echo $bg_banner[2]; ?>" />
                                                <h3><?php echo $item['author']; ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card-container col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="row row-cards justify-content-between">
                            <?php $arr_cards = get_post_meta(get_the_ID(), 'umv_home_cards_group', true); ?>
                            <?php if (!empty($arr_cards)) : $i = 1; ?>
                            <?php foreach ($arr_cards as $item) { ?>
                            <?php $delay = 100 * $i; ?>
                            <div class="cards-item cards-item-<?php echo $i;  ?> col-xl-5 col-lg-6 col-md-6 col-sm-6 col-6" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                                <div class="cards-item-wrapper">
                                    <?php $bg_banner = wp_get_attachment_image_src($item['icon_id'], 'avatar', false); ?>
                                    <img itemprop="logo" content="<?php echo $bg_banner[0];?>" src="<?php echo $bg_banner[0];?>" title="<?php echo get_post_meta( $item['icon_id'], '_wp_attachment_image_alt', true ); ?>" alt="<?php echo get_post_meta($item['icon_id'], '_wp_attachment_image_alt', true ); ?>" class="img-fluid" width="<?php echo $bg_banner[1]; ?>" height="<?php echo $bg_banner[2]; ?>" />
                                    <?php echo apply_filters('the_content', $item['text']); ?>
                                </div>
                            </div>
                            <?php $i++; } ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="contact" class="the-contact col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="container">
                <div class="row align-items-start justify-content-between">
                    <div class="contact-title col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h2><?php _e('Contáctenos', 'urbanmove'); ?></h2>
                        <div class="line-hero"></div>
                    </div>
                    <div class="contact-embed col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" data-aos="fade-in">
                        <?php echo apply_filters('the_content', get_post_meta(get_the_ID(), 'umv_home_contact_dir', true)); ?>
                        <div class="embed-responsive embed-responsive-16by9">
                            <?php echo get_post_meta(get_the_ID(), 'umv_home_contact_embed', true); ?>
                        </div>
                    </div>
                    <div class="contact-info col-xl-5 col-lg-5 col-md-6 col-sm-12 col-12" data-aos="fade-in">
                        <?php $bg_banner_id = get_post_meta(get_the_ID(), 'umv_home_contact_logo_id', true); ?>
                        <?php $bg_banner = wp_get_attachment_image_src($bg_banner_id, 'medium', false); ?>
                        <img itemprop="logo" content="<?php echo $bg_banner[0];?>" src="<?php echo $bg_banner[0];?>" title="<?php echo get_post_meta( $bg_banner_id, '_wp_attachment_image_alt', true ); ?>" alt="<?php echo get_post_meta($bg_banner_id, '_wp_attachment_image_alt', true ); ?>" class="img-fluid" width="<?php echo $bg_banner[1]; ?>" height="<?php echo $bg_banner[2]; ?>" />
                        <div class="contact-info-item">
                            <i class="fa fa-envelope"></i> <?php echo get_post_meta(get_the_ID(), 'umv_home_contact_email', true); ?>
                        </div>
                        <div class="contact-info-item">
                            <i class="fa fa-phone"></i> <?php echo get_post_meta(get_the_ID(), 'umv_home_contact_telf', true); ?>
                        </div>
                        <div class="contact-info-item">
                            <i class="fa fa-twitter"></i> <?php echo get_post_meta(get_the_ID(), 'umv_home_contact_twitter', true); ?>
                        </div>
                        <div class="contact-info-item">
                            <i class="fa fa-linkedin"></i> <?php echo get_post_meta(get_the_ID(), 'umv_home_contact_linkedin', true); ?>
                        </div>
                        <div class="contact-post-info">
                            <?php echo get_post_meta(get_the_ID(), 'umv_home_contact_posttext', true); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>
