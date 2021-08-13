function uploadButton(id) {
    let upload;
    // alert('ok - ' + upload);

    upload = wp.media.frames.file_frame = wp.media({
        title: 'Choose Image',
        button: {
            text: 'Choose Image'
        },
        multiple: false
    });

    upload.on('select', function () {
        attachment = upload.state()
            .get('selection')
            .first()
            .toJSON();
        jQuery('#' + id).val(attachment.url);
    });

    upload.open();
}



// function upload_button(id) {
// alert('ok');
// let custom_uploader;
// alert('custom_uploader');

// //If the uploader object has already been created, reopen the dialog
// if (custom_uploader) {
//     custom_uploader.open();
//     return;
// }
// //Extend the wp.media object
// custom_uploader = wp.media.frames.file_frame = wp.media({
//     title: 'Choose Image',
//     button: {
//         text: 'Choose Image'
//     },
//     multiple: false
// });

// //When a file is selected, grab the URL and set it as the text field's value
// custom_uploader.on('select', function () {
//     attachment = custom_uploader.state()
//         .get('selection')
//         .first()
//         .toJSON();
//     jQuery('#' + id).val(attachment.url);
// });

// //Open the uploader dialog
// custom_uploader.open();
// }