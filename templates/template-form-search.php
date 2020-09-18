<form class="search-form-container col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="row">
        <div class="search-form-item col-12">
            <input type="radio" id="checkida" name="checkida" value="1" class="form-checkbox" />
            <label for="checkida"><?php _e('Ida y Regreso', 'urbanmove'); ?></label>

             <input type="radio" id="checkida2" name="checkida" value="2" class="form-checkbox" />
            <label for="checkida2"><?php _e('Solo Ida', 'urbanmove'); ?></label>
        </div>
        <div class="search-form-item col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <select name="search-origen" id="origen" class="form-control">
                <option value="" selected disabled><?php _e('Busque y seleccione de la lista su lugar de recogida', 'urbanmove'); ?></option>
            </select>
        </div>
        <div class="search-form-item col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <select name="search-destino" id="destino" class="form-control">
                <option value="" selected disabled><?php _e('Busque su lugar de destino', 'urbanmove'); ?></option>
            </select>
        </div>
        <div class="search-form-item col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <input name="search-fecha-origen" id="fechaOrigen" type="text" class="form-control" placeholder="<?php _e('Establecer una fecha y hora de su recogida', 'urbanmove'); ?>" />
        </div>
        <div class="search-form-item col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <input name="search-fecha-regreso" id="fechaRegreso" type="text" class="form-control" placeholder="<?php _e('Establecer una fecha y hora de regreso', 'urbanmove'); ?>" />
        </div>
        <div class="search-form-item col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="input-group">
                <select name="search-origen" id="origen" class="form-control">
                    <option value="" selected disabled><?php _e('Cantidad de pasajeros', 'urbanmove'); ?></option>
                </select>
                <select name="search-origen" id="origen" class="form-control">
                    <option value="" selected disabled><?php _e('Adulto', 'urbanmove'); ?></option>
                </select>
            </div>
        </div>
        <div class="search-form-item col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <button type="submit" class="btn btn-md btn-submit"><?php _e('Encuentre su traslado', 'urbanmove'); ?></button>
        </div>
    </div>
</form>
