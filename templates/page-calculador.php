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
                        <hr>
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

                            <?php $format = "d M Y - h:i a"; ?>

                            <?php if (isset($_POST['search-fecha-origen'])) { ?>
                                <div class="form-result-item col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <strong><?php _e('Fecha / Hora de Salida', 'urbanmove'); ?>:</strong>
                                    <?php echo date_format(date_create($_POST['search-fecha-origen']), $format); ?>
                                </div>
                            <?php } ?>

                            <?php if (isset($_POST['search-fecha-regreso'])) { ?>
                                <?php if ($_POST['search-fecha-regreso'] != '') { ?>
                                    <div class="form-result-item col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <strong><?php _e('Fecha / Hora de Retorno', 'urbanmove'); ?>:</strong>
                                        <?php echo date_format(date_create($_POST['search-fecha-regreso']), $format); ?>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                            <div class="form-result-item col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <hr>
                            </div>
                            <?php if (isset($_POST['pasajero'])) { ?>
                                <?php $pasajeros = $_POST['pasajero']; ?>
                                <?php if (is_array($pasajeros)) {
                                    $i = 1; ?>
                                    <?php foreach ($pasajeros as $item) { ?>
                                        <div class="form-result-item col-xl col-lg col-md col-sm-12 col-12">
                                            <?php $valor = ($item == 'adult') ? 'adulto' : 'niño'; ?>
                                            <strong><?php _e('Pasajero', 'urbanmove'); ?> <?php echo $i; ?>:</strong> <?php echo $valor; ?>
                                        </div>
                                    <?php $i++;
                                    } ?>
                                <?php } ?>
                            <?php } ?>
                            <div class="form-result-item col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <hr>
                                <?php $array_origen = get_geocoding_coodinates($_POST['search-origen']); ?>
                                <?php $array_destino = get_geocoding_coodinates($_POST['search-destino']); ?>
                                <?php $distance = get_distance_matrix($array_origen, $array_destino); ?>
                                <?php $distance = $distance / 1000; ?>
                                <?php $distance_in_km = round($distance, 1); ?>
                                <div class="table-responsive">
                                    <table class="table table-stripped">
                                        <tr>
                                            <th>Distancia</th>
                                            <th>Precio unitario</th>
                                            <th>Total</th>
                                        </tr>
                                        <tr>
                                            <td><?php echo $distance_in_km; ?> km</td>
                                            <td><?php echo get_woocommerce_currency_symbol() . ' ' . get_unique_distance_price($distance_in_km); ?></td>
                                            <td><?php echo get_woocommerce_currency_symbol() . ' ' . get_total_distance_price($distance_in_km, $_POST['checkida']); ?></td>
                                        </tr>
                                        <tr>
                                            <?php $product = get_page_by_path('reserva-de-transporte', OBJECT, 'product'); ?>
                                            <?php $custom_price = get_total_distance_price($distance_in_km, $_POST['checkida']); ?>
                                            <?php $url = add_custom_gets_url($product->ID, $custom_price, $_POST['checkida'], $_POST['search-origen'], $_POST['search-destino'], $_POST['search-fecha-origen'], $_POST['search-fecha-regreso'], $_POST['quantity'], $_POST['pasajero']); ?>
                                            <td class="table-button" colspan="3"><a class="btn btn-md btn-primary" href="<?php echo $url; ?>"><?php _e('Adquirir Servicio', 'urbanmove'); ?></a></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </div>
</main>
<?php get_footer(); ?>