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

    if (isset($_POST['delegacion_redes_facebook_page_url'])) {
        update_option('delegacion_redes_facebook_page_url',$_POST['delegacion_redes_facebook_page_url']);
    }

    if (isset($_POST['delegacion_redes_facebook_page_id'])) {
        update_option('delegacion_redes_facebook_page_id',$_POST['delegacion_redes_facebook_page_id']);
    }

    if (isset($_POST['delegacion_redes_facebook_app_id'])) {
        update_option('delegacion_redes_facebook_app_id',$_POST['delegacion_redes_facebook_app_id']);
    }

    if (isset($_POST['delegacion_redes_facebook_app_secret'])) {
        update_option('delegacion_redes_facebook_app_secret',$_POST['delegacion_redes_facebook_app_secret']);
    }

    if (isset($_POST['delegacion_pos_latitud'])) {
        update_option('delegacion_pos_latitud',$_POST['delegacion_pos_latitud']);
    }

    if (isset($_POST['delegacion_pos_longitud'])) {
        update_option('delegacion_pos_longitud',$_POST['delegacion_pos_longitud']);
    }


    $info_direccion = get_option('delegacion_info_direccion','Calle XXX, Localidad, Río Negro');
    $info_telefono = get_option('delegacion_info_telefono','+54 XXX - XXX XXXX');
    $info_email = get_option('delegacion_info_email','email_delegacion@upcn-rionegro.com.ar');
    $info_imagen = get_option('delegacion_info_imagen','http://back.upcn-rionegro.com.ar/wp-content/uploads/2003/04/logo_upcn.jpg');
    $redes_facebook_page_url = get_option('delegacion_redes_facebook_page_url','https://facebook.com/XXX');
    $redes_facebook_page_id = get_option('delegacion_redes_facebook_page_id','12345678910');
    $redes_facebook_app_id = get_option('delegacion_redes_facebook_app_id','12345678910');
    $redes_facebook_app_secret = get_option('delegacion_redes_facebook_app_secret','12345678910');
    $pos_latitud = get_option('delegacion_pos_latitud','-40.8');
    $pos_longitud = get_option('delegacion_pos_longitud','-63');
    
    
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

    echo "<h2>Redes Sociales</h2>";

    echo "<p><label for='delegacion_redes_facebook_page_url' style='display: inline-block;width:150px;' >Facebook Page Url: </label>";
    echo "<input id='delegacion_redes_facebook_page_url' name='delegacion_redes_facebook_page_url' value='".$redes_facebook_page_url."' style='width:700px;' /></p>";

    echo "<p><label for='delegacion_redes_facebook_page_id' style='display: inline-block;width:150px;' >Facebook Page ID: </label>";
    echo "<input id='delegacion_redes_facebook_page_id' name='delegacion_redes_facebook_page_id' value='".$redes_facebook_page_id."' style='width:700px;' /></p>";

    echo "<p><label for='delegacion_redes_facebook_app_id' style='display: inline-block;width:150px;' >Facebook App ID: </label>";
    echo "<input id='delegacion_redes_facebook_app_id' name='delegacion_redes_facebook_app_id' value='".$redes_facebook_app_id."' style='width:700px;' /></p>";

    echo "<p><label for='delegacion_redes_facebook_app_secret' style='display: inline-block;width:150px;' >Facebook App Secret: </label>";
    echo "<input id='delegacion_redes_facebook_app_secret' name='delegacion_redes_facebook_app_secret' value='".$redes_facebook_app_secret."' style='width:700px;' /></p>";

    echo "<h2>Posicionamiento</h2>";

    echo "<p><label style='display: inline-block;width:250px;' >Latitud y longitud: </label>";
    echo "<input id='delegacion_pos_latitud' name='delegacion_pos_latitud' value='".$pos_latitud."' style='width:200px;' placeholder='Latitud' />&nbsp;";
    echo "<input id='delegacion_pos_longitud' name='delegacion_pos_longitud' value='".$pos_longitud."' style='width:200px;' placeholder='Latitud' />&nbsp;";
    echo "</p>";

    // Guardar
    echo "<input type='submit' value='Guardar' class='button button-primary button-large'>";
    echo "</form>";

}