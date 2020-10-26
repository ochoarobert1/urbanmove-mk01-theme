<?php

/**
 * Template Name: Pagina Vacia
 *
 * @package urbanmove
 * @subpackage urbanmove-mk01-theme
 * @since Mk. 1.0
 */
?>
<?php get_header(); ?>
<?php the_post(); ?>
<div class="container-fluid p-0">
    <div class="row no-gutters">
        <div class="main-page-container col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <main class="container" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
                <div class="row">
                    <section id="post-<?php the_ID(); ?>" class="page-container col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" role="article" itemscope itemtype="http://schema.org/BlogPosting">
                        <div class="row">
                            <div class="section-title col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h1 itemprop="headline"><?php the_title(); ?></h1>
                            </div>
                            <div class="section-container col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </section>
                </div>
            </main>
        </div>
    </div>
</div>
<?php get_footer(); ?>