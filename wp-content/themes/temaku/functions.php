<?php

add_action('wp_enqueue_scripts', 'load_file');

function load_file() {

    $theme_path = get_template_directory_uri();
    wp_enqueue_style( 'style', get_stylesheet_uri() );

    wp_enqueue_style('bootstrap', $theme_path.'/assets/css/bootstrap.min.css');
    wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('base', $theme_path.'/assets/css/style.css');
    wp_enqueue_style('style', get_stylesheet_uri());

    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap', $theme_path.'/assets/js/bootstrap.bundle.min.js', '', false, true);
}

add_action('admin_enqueue_scripts', 'load_media_script');

function load_media_script() {
    wp_enqueue_media();
    wp_enqueue_script( 'theme-options-script', get_stylesheet_directory_uri() . '/assets/js/theme-options-script.js', array('jquery'), null, false );
}

add_filter('excerpt_length', 'get_excerpt_length');

// the_excerpt
function get_excerpt_length() {
    return 20;
}

add_filter('excerpt_more', 'return_excerpt_text');

function return_excerpt_text() {
    return ' ...';
}

add_action('after_setup_theme', 'init_setup');

function init_setup() {

    register_nav_menu('main-menu',__( 'Main Menu' ));

    add_theme_support('post-thumbnails');
}


function pagination($pages = '', $range = 2) {  
    $showitems = ($range * 2)+1;  

    global $paged;
    if(empty($paged)) $paged = 1;

    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }   

    $output = "";
    if(1 != $pages) {
        $output .= "<div class='pt-3'>
                    <nav aria-label='Page navigation example'>
                    <ul class='pagination justify-content-center'>";

        if($paged > 1 && $pages > 1) {
            $output .= "<li class='page-item'>
                            <a class='page-link' href='".get_pagenum_link($paged - 1)."' tabindex='-1' aria-disabled='true'>Previous</a>
                        </li>";
        } else {
            $output .= "<li class='page-item disabled'>
                            <a class='page-link' href='#' tabindex='-1' aria-disabled='true'>Previous</a>
                        </li>";
        }

        for ($i=1; $i <= $pages; $i++) {
           if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
               if($paged == $i) {
                    $output .= "<li class='page-item disabled'><a class='page-link' href='#'>$i</a></li>";
               } else {
                    $output .= "<li class='page-item'><a class='page-link' href='".get_pagenum_link($i)."'>$i</a></li>";
               }
               
               
           }
       }

        if($paged < $pages && $pages > 1) {
            $output .= "<li class='page-item'>
                            <a class='page-link' href='".get_pagenum_link($paged + 1)."' tabindex='+1' aria-disabled='true'>Next</a>
                        </li>";
        } else {
            $output .= "<li class='page-item disabled'>
                            <a class='page-link' href='#'>Next</a>
                        </li>";
        }

        $output .= "</ul>
                    </nav>
                    </div>";

        echo $output;
        
    }
}

add_action( 'init', 'add_post_type_book' );

function add_post_type_book() {
    $labels = array(
        'name'               => _x( 'Books', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'      => _x( 'Book', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'          => _x( 'Books', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'     => _x( 'Book', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'            => _x( 'Add New', 'book', 'your-plugin-textdomain' ),
        'add_new_item'       => __( 'Add New Book', 'your-plugin-textdomain' ),
        'new_item'           => __( 'New Book', 'your-plugin-textdomain' ),
        'edit_item'          => __( 'Edit Book', 'your-plugin-textdomain' ),
        'view_item'          => __( 'View Book', 'your-plugin-textdomain' ),
        'all_items'          => __( 'All Books', 'your-plugin-textdomain' ),
        'search_items'       => __( 'Search Books', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __( 'Parent Books:', 'your-plugin-textdomain' ),
        'not_found'          => __( 'No books found.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __( 'No books found in Trash.', 'your-plugin-textdomain' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => 'Book Description',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'book' ),
        'show_in_nav_menus'  => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'taxonomies'         => array('genre', 'writer'),
        'supports'           => array( 'title', 'editor', 'thumbnail', 'comments', 'excerpt')
    );

    register_post_type( 'book', $args );
}

add_action( 'init', 'add_book_taxonomy');


function add_book_taxonomy() {
    register_taxonomy(
        'genre',
        'book',
        array(
            'label' => __('Genre'),
            'rewrite' => array('slug' => 'genre'),
            'hierarchical' => true, 
            'show_admin_column' => true,
            'query_var' => true,
        )
    );

    register_taxonomy(
        'writer',
        'book',
        array(
            'label' => __( 'Writer' ),
            'rewrite' => array( 'slug' => 'penulis' ),
            'hierarchical' => false, 
            'show_admin_column' => true,
            'query_var' => true,
            
        )
    );
}

add_action( 'add_meta_boxes', 'book_add_custom_box' );
function book_add_custom_box() {    
    add_meta_box( 
        'book_meta_box',
        'Custom Book Meta Box ',
        'book_meta_box_callback',
        'book'
    );
}

function book_meta_box_callback( $post ) {
    // Use nonce for verification
    $jumlah_halaman = get_post_meta($post->ID, 'jumlah_halaman', true);
    $kode_isbn = get_post_meta($post->ID, 'kode_isbn',true);
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
    </style>
    <div class="input-group">
        <label for="jumlah_halaman">Jumlah Halaman : </label>
        <input type="number" name="jumlah_halaman" id="jumlah_halaman" value="<?= $jumlah_halaman; ?>">
    </div>
    <div class="input-group">
        <label for="kode_isbn">Kode ISBN : </label>
        <input type="text" name="kode_isbn" id="kode_isbn" value="<?= $kode_isbn; ?>">
    </div>
    
   <?php
}

add_action('save_post', 'book_save_meta_box');
function book_save_meta_box($post_id) {
    if(array_key_exists('jumlah_halaman', $_POST)) {
        update_post_meta($post_id,'jumlah_halaman',$_POST['jumlah_halaman']);
    }

    if(array_key_exists('kode_isbn', $_POST)) {
        update_post_meta($post_id,'kode_isbn',$_POST['kode_isbn']);
    }    
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