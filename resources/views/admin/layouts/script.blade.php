
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('admin/js/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('admin/tinymce/tinymce.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{ asset('admin/js/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('admin/js/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{ asset('admin/js/dashboard.js')}}"></script> --}}
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin/js/demo.js')}}"></script>
<script type="text/javascript" src="{{ asset('admin/datatable/datatables.min.js')}}"></script>
<script type="text/javascript" src="http://www.jasny.net/bootstrap/dist/js/jasny-bootstrap.min.js"></script>



{{-- <script src="{{ asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script> --}}
<!-- daterangepicker -->
{{-- <script src="{{ asset('admin/js/moment/min/moment.min.js')}}"></script>
<script src="{{ asset('admin/bootstrap-daterangepicker/daterangepicker.js')}}"></script> --}}
<script type="text/javascript">
    tinymce.init({
      /* replace textarea having class .tinymce with tinymce editor */
      selector: "textarea",
      relative_urls: false,
      remove_script_host : false,
      image_caption: true,

      /* theme of the editor */
      theme: "modern",
      skin: "lightgray",

      /* width and height of the editor */
      width: "100%",
      height: 400,
      /* display statusbar */
      statubar: true,
      content_style: ".mce-content-body {font-size:16px;}",

      /* plugin */
      plugins: [
        "advlist autolink link image lists charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "save table contextmenu directionality emoticons imagetools template paste textcolor"
      ],

      /* toolbar */
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",

      /* style */
      style_formats: [

        {title: "Headers", items: [
          {title: "Header 1", format: "h1"},
          {title: "Header 2", format: "h2"},
          {title: "Header 3", format: "h3"},
          {title: "Header 4", format: "h4"},
          {title: "Header 5", format: "h5"},
          {title: "Header 6", format: "h6"}
        ]},
        {title: "Inline", items: [
          {title: "Bold", icon: "bold", format: "bold"},
          {title: "Italic", icon: "italic", format: "italic"},
          {title: "Underline", icon: "underline", format: "underline"},
          {title: "Strikethrough", icon: "strikethrough", format: "strikethrough"},
          {title: "Superscript", icon: "superscript", format: "superscript"},
          {title: "Subscript", icon: "subscript", format: "subscript"},
          {title: "Code", icon: "code", format: "code"}
        ]},
        {title: "Blocks", items: [
          {title: "Paragraph", format: "p"},
          {title: "Blockquote", format: "blockquote"},
          {title: "Div", format: "div"},
          {title: "Pre", format: "pre"}
        ]},
        {
          title: 'Image Left',
          selector: 'img',
          styles: {
              'float': 'left',
              'margin': '0 10px 0 10px'
          }
      },
      {
          title: 'Image Right',
          selector: 'img',
          styles: {
              'float': 'right',
              'margin': '0 10px 0 10px'
          }
      }
      ],
        external_filemanager_path:"{{ asset('filemanager') }}/",
        external_plugins: { "filemanager" : "{{ asset('filemanager/plugin.min.js') }}"}
    });

  </script>
<script type="text/javascript">

		$(document).ready(function () {
            $('.read').on('change', function () {
                read = $(this).val();
                $.ajax({
                    url: "roleChangeAccess/1/" + read,
                    type: "GET"
                });
            });
            $('.write').on('change', function () {
                write = $(this).val();
                $.ajax({
                    url: "roleChangeAccess/2/" + write,
                    type: "GET"
                });
            });
            $('.edit').on('change', function () {
                edit = $(this).val();
                $.ajax({
                    url: "roleChangeAccess/3/" + edit,
                    type: "GET"
                });
            });
            $('.delete').on('change', function () {
                del = $(this).val();
                $.ajax({
                    url: "roleChangeAccess/4/" + del,
                    type: "GET"
                });
            });
        });

</script>
