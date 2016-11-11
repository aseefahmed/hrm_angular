<!-- main bootstrap js -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<!-- File Input -->
{{--<link href="{{ asset('lib/bootstrap-fileinput/js//fileinput.min.js') }}" rel="stylesheet">--}}
<!-- main bootstrap js -->
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<!-- custom scrollbar -->
<script src="{{ asset('lib/slimScroll/jquery.slimscroll.js') }}"></script>
<!-- React scripts -->
<script src="{{ asset('js/react-build/app.js') }}"></script>
{{--<script src="{{ asset('js/jquery-migrate.min.js') }}"></script>--}}
{{--<script src="{{ asset('lib/jquery-ui/jquery-ui-1.10.0.custom.min.js') }}"></script>--}}
<!-- touch events for jquery ui-->
{{--<script src="{{ asset('js/forms/jquery.ui.touch-punch.min.js') }}"></script>
<!-- easing plugin -->
<script src="{{ asset('js/jquery.easing.1.3.min.js') }}"></script>
<!-- smart resize event -->
<script src="{{ asset('js/jquery.debouncedresize.min.js') }}"></script>--}}
<!-- js cookie plugin -->
{{--<script src="{{ asset('js/jquery_cookie_min.js') }}"></script>--}}

<!-- bootstrap plugins -->
{{--<script src="{{ asset('js/bootstrap.plugins.min.js') }}"></script>--}}
<!-- typeahead -->
{{--<script src="{{ asset('lib/typeahead/typeahead.min.js') }}"></script>--}}
<!-- code prettifier -->
{{--<script src="{{ asset('lib/google-code-prettify/prettify.min.js') }}"></script>
<!-- sticky messages -->
<script src="{{ asset('lib/sticky/sticky.min.js') }}"></script>
<!-- lightbox -->
<script src="{{ asset('lib/colorbox/jquery.colorbox.min.js') }}"></script>--}}
<!-- jBreadcrumbs -->
{{--<script src="{{ asset('lib/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js') }}"></script>--}}
<!-- hidden elements width/height -->
{{--<script src="{{ asset('js/jquery.actual.min.js') }}"></script>--}}

<!-- fix for ios orientation change -->
{{--<script src="{{ asset('js/ios-orientationchange-fix.js') }}"></script>
<!-- to top -->
<script src="{{ asset('lib/UItoTop/jquery.ui.totop.min.js') }}"></script>--}}
<!-- mobile nav -->
{{--<script src="{{ asset('js/selectNav.js') }}"></script>--}}
<!-- moment.js date library -->
{{--<script src="{{ asset('lib/moment/moment.min.js') }}"></script>--}}

<!-- common functions -->
<script src="{{ asset('js/pages/gebo_common.js') }}"></script>

<!-- multi-column layout -->
{{--<script src="{{ asset('js/jquery.imagesloaded.min.js') }}"></script>
<script src="{{ asset('js/jquery.wookmark.js') }}"></script>
<!-- responsive table -->
<script src="{{ asset('js/jquery.mediaTable.min.js') }}"></script>
<!-- small charts -->
<script src="{{ asset('js/jquery.peity.min.js') }}"></script>
<!-- charts -->
<script src="{{ asset('lib/flot/jquery.flot.min.js') }}"></script>
<script src="{{ asset('lib/flot/jquery.flot.resize.min.js') }}"></script>
<script src="{{ asset('lib/flot/jquery.flot.pie.min.js') }}"></script>
<script src="{{ asset('lib/flot.tooltip/jquery.flot.tooltip.min.js') }}"></script>
<!-- calendar -->
<script src="{{ asset('lib/fullcalendar/fullcalendar.min.js') }}"></script>--}}
<!-- sortable/filterable list -->
{{--<script src="{{ asset('lib/list_js/list.min.js') }}"></script>
<script src="{{ asset('lib/list_js/plugins/paging/list.paging.min.js') }}"></script>
<!-- dashboard functions -->
<script src="{{ asset('js/pages/gebo_dashboard.js') }}"></script>--}}
<!-- datatable -->
<script src="{{ asset('lib/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('lib/datatables/extras/Scroller/media/js/dataTables.scroller.min.js') }}"></script>
<!-- datatable table tools -->
<script src="{{ asset('lib/datatables/extras/TableTools/media/js/TableTools.min.js') }}"></script>
<script src="{{ asset('lib/datatables/extras/TableTools/media/js/ZeroClipboard.js') }}"></script>
<!-- datatables bootstrap integration -->
<script src="{{ asset('lib/datatables/jquery.dataTables.bootstrap.min.js') }}"></script>
<!-- datatables bootstrap integration -->
<script src="{{ asset('lib/fileinput/fileinput.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        // Datatables
        $('#dataTable1').dataTable({
            "bDestroy": true,
            "sPaginationType": "bootstrap_alt",
            //"sScrollX": "100%",
            //"sScrollXInner": '110%',
            "sDom": "<'row'<'col-sm-6'<'dt_actions'>l><'col-sm-6'f>r>t<'row'<'col-sm-5'i><'col-sm-7'p>>",

        });

        $('.file-upload').fileinput({
            showUpload: false,
            previewFileType: "image",
        });

        $('#add-buyer-btn').click(function(e){
            e.preventDefault();
            myForm = $("#add-buyer-form")[0];
            formData = new FormData(myForm);
            $.ajax({
                url: "{{ url('/production/buyers/add') }}",
                method: "POST",
                data: formData,
                contentType: false,
                cache: false,
                processData:false,
                enctype: 'multipart/form-data',
                success: function(result){
                    $('#add-buyer-modal').modal('toggle');
                    myForm.reset();
                    $('#main-content').html(result);
                }
            }).fail(function(result){
                $('#ajax_preloader').css('display', 'none');
                $('#show_status').html(
                        "<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> There was some technical issue. Contact to the administrator.</div>"
                );
            });
        })
    });
</script>
