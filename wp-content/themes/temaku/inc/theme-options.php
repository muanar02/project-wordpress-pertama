<?php

add_action('admin_enqueue_scripts', 'load_media_script');

function load_media_script() {
    wp_enqueue_media();
    wp_enqueue_script( 'theme-options-script', get_stylesheet_directory_uri() . '/assets/js/theme-options-script.js', array('jquery'), null, false );
}

add_action('admin_menu', 'add_admin_menu');

function add_admin_menu() {
    add_menu_page(
        'Theme Options',
        'Theme Options',
        'manage_options',
        'theme-options', 
        'fungsi_theme_options',
        'dashicons-admin-site',
        60
    );
}

function fungsi_theme_options() {
    if($_POST) {     
        update_option('logo', $_POST['logo']);
        update_option('favicon', $_POST['favicon']);
        update_option('footer_copyright', $_POST['footer_copyright']);
        update_option('facebook', $_POST['facebook']);
        update_option('twitter', $_POST['twitter']);
    } 
    ?>
    <style type="text/css">
        .input-group {
            margin: 20px 0;
            display: flex;
            justify-content: start;
            align-items: center;
        }
        .input-group label {
            margin-right: 20px;
            font-size: 14px;
            width: 20%;
        }
        .input-group input {
            width: 50%;
        }
        .input-group .div-input {
            width: 50%;
            display: flex;
            justify-content: start;
            align-items: center;
        }
        .input-group .div-input input[type=url] {
            width: 67%;
            margin-right: 3%;
        }
        .input-group .div-input input[type=button] {
            width: 30%;
        }
        .btn-input {
            font-size: 16px;
            padding: 10px 50px;
            border-radius: 10px;
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
            border: 1px solid transparent;
            text-transform: uppercase;
        }
       
        .btn {
            font-size: 16px;
            padding: 10px 50px;
            border-radius: 10px;
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
            border: 1px solid transparent;
            text-transform: uppercase;
        }
        .btn:hover {
            color: #fff;
            background-color: #0069d9;
            border-color: #0062cc;
        }
        .btn-input {
            font-size: 12px;
            padding: 10px 10px;
            border-radius: 10px;
        }

    </style>
    <h2>Theme Options</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="input-group">
            <label for="logo">Site Logo : </label>
            <div class="div-input">
                <input id="logo" type="url" size="30" name="logo" value="<?php echo get_option('logo'); ?>" />
                <input class="btn btn-input" onclick="uploadButton('logo')" type="button" value="Upload Logo" />
            </div> 
        </div>
        <div class="input-group">
            <label for="favicon">Site Favicon : </label>
            <div class="div-input">
                <input id="favicon" type="url" size="30" name="favicon" value="<?php echo get_option('favicon'); ?>" />
                <input class="btn btn-input" onclick="uploadButton('favicon')" type="button" value="Upload Favicon" />
            </div> 
        </div>
        <div class="input-group">
            <label for="footer_copyright">Footer Copyright : </label>
            <input type="text" name='footer_copyright' id='footer_copyright' value="<?= get_option('footer_copyright'); ?>" >
        </div>
        <div class="input-group">
            <label for="facebook">Facebook : </label>
            <input type="url" name='facebook' id='facebook' value="<?= get_option('facebook'); ?>" >
        </div>
        <div class="input-group">
            <label for="twitter">Twitter : </label>
            <input type="url" name='twitter' id='twitter' value="<?= get_option('twitter'); ?>" >
        </div>
        <button type="submit" id="simpan" class="btn">Simpan</button>
    </form>
   
    <?php
}

?>