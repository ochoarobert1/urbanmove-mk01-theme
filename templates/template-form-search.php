<?php $origenes = get_option('origen_matrix'); ?>
<?php $arr_origenes = explode(',', $origenes); ?>
<?php $destinos = get_option('origen_matrix'); ?>
<?php $arr_destinos = explode(',', $origenes); ?>
<form id="searchForm" method="POST" action="<?php echo home_url('/calculador'); ?>" class="search-form-container col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="row">
        <div class="search-form-item col-12">
            <input type="radio" id="checkida" name="checkida" value="1" checked="checked" class="form-checkbox" />
            <label for="checkida"><?php _e('Ida y Vuelta', 'urbanmove'); ?></label>

            <input type="radio" id="checkida2" name="checkida" value="2" class="form-checkbox" />
            <label for="checkida2"><?php _e('Solo Ida', 'urbanmove'); ?></label>
        </div>
        <div class="search-form-item col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <select name="search-origen" id="origen" class="form-control">
                <option value="" selected disabled><?php _e('Busque y seleccione de la lista su lugar de recogida', 'urbanmove'); ?></option>
                <?php foreach ($arr_origenes as $key => $value) { ?>
                    <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="search-form-item col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <select name="search-destino" id="destino" class="form-control">
                <option value="" selected disabled><?php _e('Busque su lugar de destino', 'urbanmove'); ?></option>
                <?php foreach ($arr_destinos as $key => $value) { ?>
                    <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="search-form-item col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-inline">
                <label for="fechaOrigen"><?php _e('Fecha y hora de recogida', 'urbanmove'); ?></label>
                <input name="search-fecha-origen" id="fechaOrigen" type="text" class="form-control" placeholder="<?php _e('Establecer una fecha y hora de su recogida', 'urbanmove'); ?>" autocomplete="off" />
            </div>
        </div>
        <div id="fechaRegresoCont" class="search-form-item col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-inline">
                <label for="fechaRegreso"><?php _e('Fecha y hora de regreso', 'urbanmove'); ?></label>
                <input name="search-fecha-regreso" id="fechaRegreso" type="text" class="form-control" placeholder="<?php _e('Establecer una fecha y hora de regreso', 'urbanmove'); ?>" autocomplete="off" />
            </div>
        </div>
        <div class="search-form-item col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-inline">
                <label for="quantity"><?php _e('Cantidad de pasajeros', 'urbanmove'); ?></label>
                <input name="quantity" min="1" max="4" id="quantity" type="number" class="form-control" placeholder="<?php _e('Seleccione la cantidad de pasajeros', 'urbanmove'); ?>" autocomplete="off" />
            </div>
        </div>
        <div class="input-repeat-container col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div id="inputRepeat" class="row search-form-item input-repeat">

            </div>
        </div>

        <div class="search-form-item col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            <button type="submit" class="btn btn-md btn-submit"><?php _e('Encuentre su traslado', 'urbanmove'); ?></button>
        </div>
    </div>
</form>