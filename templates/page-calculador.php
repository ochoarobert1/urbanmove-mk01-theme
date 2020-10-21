<?php
/**
* Template Name: Pagina Calculador
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
        <section class="calculator-container col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="container">
                <div class="row">
                    <div class="title-container col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h2><?php _e('Detalles de su reserva', 'urbanmove'); ?></h2>
                    </div>
                    <div class="form-result-container col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="row">
                            <div class="form-result-item col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <?php if (isset($_POST['checkida'])) { ?>
                                <?php $check = ($_POST['checkida'] == 1) ? 'Ida y Regreso' : 'Solo Ida'; ?>
                                <?php } ?>
                                <strong><?php _e('Modalidad', 'urbanmove'); ?>:</strong> <?php echo $check; ?>
                            </div>
                            <div class="form-result-item col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <strong><?php _e('Cantidad de Pasajeros', 'urbanmove'); ?>:</strong>
                                <?php if (isset($_POST['quantity'])) { ?>
                                <?php echo $_POST['quantity']; ?>
                                <?php } ?>
                            </div>
                            <div class="form-result-item col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <strong><?php _e('Origen', 'urbanmove'); ?>:</strong>
                                <?php if (isset($_POST['search-origen'])) { ?>
                                <?php echo $_POST['search-origen']; ?>
                                <?php } ?>
                            </div>
                            <div class="form-result-item col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <strong><?php _e('Destino', 'urbanmove'); ?>:</strong>
                                <?php if (isset($_POST['search-destino'])) { ?>
                                <?php echo $_POST['search-destino']; ?>
                                <?php } ?>
                            </div>

                            <div class="form-result-item col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <strong><?php _e('Fecha / Hora de Salida', 'urbanmove'); ?>:</strong>
                                <?php if (isset($_POST['search-fecha-origen'])) { ?>
                                <?php echo $_POST['search-fecha-origen']; ?>
                                <?php } ?>
                            </div>

                            <div class="form-result-item col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <strong><?php _e('Fecha / Hora de Retorno', 'urbanmove'); ?>:</strong>
                                <?php if (isset($_POST['search-fecha-regreso'])) { ?>
                                <?php echo $_POST['search-fecha-regreso']; ?>
                                <?php } ?>
                            </div>
                            <div class="form-result-item col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <hr>
                            </div>
                            <?php if (isset($_POST['pasajero'])) { ?>
                            <?php $pasajeros = $_POST['pasajero']; ?>
                            <?php if (is_array($pasajeros)) { $i = 1; ?>
                            <?php foreach ($pasajeros as $item) { ?>
                            <div class="form-result-item col-xl col-lg col-md col-sm-12 col-12">
                                <?php $valor = ($item == 'adult') ? 'adulto' : 'niño'; ?>
                                <strong><?php _e('Pasajero', 'urbanmove'); ?> <?php echo $i; ?>:</strong> <?php echo $valor; ?>
                            </div>
                            <?php $i++; } ?>
                            <?php } ?>
                            <?php } ?>
                            <div class="form-result-item col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <hr>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </div>
</main>
<?php get_footer(); ?>