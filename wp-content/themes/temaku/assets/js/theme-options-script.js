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