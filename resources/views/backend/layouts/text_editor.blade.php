<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
  var options = {
    filebrowserImageBrowseUrl: '{{ url("/") }}/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '{{ url("/") }}/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '{{ url("/") }}/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '{{ url("/") }}/laravel-filemanager/upload?type=Files&_token='
  };
</script>
<script>
CKEDITOR.replace('text_editor', options);
</script>