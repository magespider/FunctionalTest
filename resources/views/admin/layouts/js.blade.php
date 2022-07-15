<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.8.1/tinymce.min.js"></script>  
<script type="text/javascript">
    tinymce.init({
      force_br_newlines : true,
      force_p_newlines : false,
      forced_root_block : '',
      selector: '.editor', 
      language: 'en',
      height: 200,
      menubar: "insert", 
      plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen textcolor',
        'insertdatetime media table paste code help wordcount'
      ],
      toolbar: 'undo redo code | formatselect | ' +
      ' link bold italic backcolor image media | alignleft aligncenter | table tabledelete ' +
      ' alignright alignjustify | bullist numlist outdent indent |' +
      ' removeformat | fontsizeselect forecolor backcolor | help', 
      content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tiny.cloud/css/codepen.min.css'
      ], 
      media_live_embeds: true,
      image_title: true,
      automatic_uploads: true,
      images_upload_handler: function (blobInfo, success, failure) {
                var xhr, formData;
                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', "{{ route('admin.tinymce.upload') }}");
                var token = '{{ csrf_token() }}';
                xhr.setRequestHeader("X-CSRF-Token", token);
                xhr.onload = function() {
                    var json;
                    if (xhr.status != 200) {
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }
                    json = JSON.parse(xhr.responseText);

                    if (!json || typeof json.location != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }
                    success(json.location);
                };
                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());
                xhr.send(formData);
            },
          file_picker_types: 'image',
          relative_urls : true,  
          remove_script_host : false,
          convert_urls : true,
          file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                };
                input.click();
          }
    }); 
</script> 