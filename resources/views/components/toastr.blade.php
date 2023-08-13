<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-left",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>
@props(['status' => 'info'])

@if (session('status') === 'info')
    <script>
        toastr.success('{{ session("message") }}');
    </script>
@endif

@if (session('status') === 'alert')
    <script>
        toastr.error('{{ session("message") }}');
    </script>
@endif
