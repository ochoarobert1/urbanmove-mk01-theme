<footer class="container-fluid p-0" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
    <div class="row no-gutters">
        <div class="the-footer col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="container">
                <div class="row align-items-start">
                    <?php if ( is_active_sidebar( 'sidebar_footer' ) ) : ?>
                    <div class="footer-item col-xl col-lg col-md col-sm-12 col-12">
                        <ul id="sidebar-footer1" class="footer-sidebar">
                            <?php dynamic_sidebar( 'sidebar_footer' ); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( 'sidebar_footer-2' ) ) : ?>
                    <div class="footer-item col-xl col-lg col-md col-sm-12 col-12">
                        <ul id="sidebar-footer2" class="footer-sidebar">
                            <?php dynamic_sidebar( 'sidebar_footer-2' ); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( 'sidebar_footer-3' ) ) : ?>
                    <div class="footer-item col-xl col-lg col-md col-sm-12 col-12">
                        <ul id="sidebar-footer3" class="footer-sidebar">
                            <?php dynamic_sidebar( 'sidebar_footer-3' ); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( 'sidebar_footer-4' ) ) : ?>
                    <div class="footer-item col-xl col-lg col-md col-sm-12 col-12">
                        <ul id="sidebar-footer4" class="footer-sidebar">
                            <?php dynamic_sidebar( 'sidebar_footer-4' ); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <div class="w-100"></div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php $cookies_options = get_option('umv_cookie_settings'); ?>
<div class="urbanmove-privacy-policy-accept hidden-policy" id="urbanmove-privacy-policy-accept">
    <p class="text-center small"><?php echo $cookies_options['cookie_text']; ?> <a href="<?php echo get_permalink($cookies_options['cookie_link']); ?>" class="font-weight-bold"><?php _e( "aquí", 'urbanmove' ) ?></a>.</p>
    <div class="button-container">
        <a class="btn btn-sm btn-outline-elephant btn-privacy" id="privacy-policy-accept-btn"><?php _e( "Aceptar", 'urbanmove' ) ?></a>
    </div>
</div>
<?php wp_footer() ?>
</body>

</html>
