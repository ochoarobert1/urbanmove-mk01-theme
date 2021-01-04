<?php if ( is_active_sidebar( 'main_sidebar' ) ) : ?>
<ul id="sidebar" class="sidebar-container">
    <?php dynamic_sidebar( 'main_sidebar' ); ?>
</ul>
<?php endif; ?>

<div class="input-wrapper">
    <label>[text* fullname class:form-control class:custom-form-control placeholder "Nombre Completo"]</label>
</div>
<div class="input-wrapper">
    <label>[email* email placeholder "Correo Electrónico"]</label>
</div>
<div class="input-wrapper">
    <label>[tel* phone placeholder "Número de Teléfono"]</label>
</div>
<div class="input-wrapper">
    [acceptance acceptance] He leído y acepto la Política de Privacidad [/acceptance]
</div>
<div class="input-wrapper">
    <div class="btn-wrp">[submit class:submit-btn "Asesoría financiera gratuita"]</div>
</div>