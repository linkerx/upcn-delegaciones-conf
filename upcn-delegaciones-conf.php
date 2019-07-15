<?php

/**
 * Plugin Name: LNK-UPCN plugin para datos de delagaciones
 * Plugin URI: https://github.com/linkerx
 * Description: Opciones para subsitios
 * Version: 0.1
 * Author: Diego Martinez Diaz
 * Author URI: https://github.com/linkerx
 * License: GPLv3
 */

function delegaciones_options_page() {
    add_menu_page(
        'Informacion de Delegacion',
        'Delegación',
        'manage_options',
        'delegaciones_options',
        'delegaciones_options_page_html',
        '',
        50
    );
}
add_action( 'admin_menu', 'delegaciones_options_page' );

function delegaciones_options_page_html(){
    echo '<h1>Delegación</h1>';

    if (isset($_POST['delegacion_info_direccion'])) {
        update_option('delegacion_info_direccion',$_POST['delegacion_info_direccion']);
    }

    if (isset($_POST['delegacion_info_telefono'])) {
        update_option('delegacion_info_telefono',$_POST['delegacion_info_telefono']);
    }

    if (isset($_POST['delegacion_info_email'])) {
        update_option('delegacion_info_email',$_POST['delegacion_info_email']);
    }

    if (isset($_POST['delegacion_info_imagen'])) {
        update_option('delegacion_info_imagen',$_POST['delegacion_info_imagen']);
    }

    $info_direccion = get_option('delegacion_info_direccion','Calle XXX, Localidad, Río Negro');
    $info_telefono = get_option('delegacion_info_telefono','+54 XXX - XXX XXXX');
    $info_email = get_option('delegacion_info_email','email_delegacion@upcn-rionegro.com.ar');
    $info_imagen = get_option('delegacion_info_imagen','http://back.upcn-rionegro.com.ar/wp-content/uploads/2003/04/logo_upcn.jpg');

    echo "<form method='POST'>";
    echo "<h2>Información General</h2>";

    echo "<p><label for='delegacion_info_direccion' style='display: inline-block;width:150px;' >Dirección: </label>";
    echo "<input id='delegacion_info_direccion' name='delegacion_info_direccion' value='".$info_direccion."' style='width:700px;' /></p>";

    echo "<p><label for='delegacion_info_telefono' style='display: inline-block;width:150px;' >Teléfono: </label>";
    echo "<input id='delegacion_info_telefono' name='delegacion_info_telefono' value='".$info_telefono."' style='width:700px;' /></p>";

    echo "<p><label for='delegacion_info_email' style='display: inline-block;width:150px;' >Email: </label>";
    echo "<input id='delegacion_info_email' name='delegacion_info_email' value='".$info_email."' style='width:700px;' /></p>";

    echo "<p><label for='delegacion_info_imagen' style='display: inline-block;width:150px;' >Imagen (Pegar URL): </label>";
    echo "<input id='delegacion_info_imagen' name='delegacion_info_imagen' value='".$info_imagen."' style='width:700px;' /></p>";

    // Guardar
    echo "<input type='submit' value='Guardar' class='button button-primary button-large'>";
    echo "</form>";

}