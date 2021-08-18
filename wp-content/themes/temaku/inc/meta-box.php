<?php
add_action( 'add_meta_boxes', 'book_meta_box' );
function book_meta_box() {    
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
?>