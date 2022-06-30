<script>
    var mode = localStorage.getItem("mode");
    if (mode == 'light') {
        document.write('<body data-sidebar="dark" data-layout-mode="light" data-topbar="light">')
    } else {
        document.write('<body data-sidebar="dark" data-layout-mode="dark" data-topbar="dark">')
    }
</script>

{{-- <body data-sidebar="dark"> --}}
