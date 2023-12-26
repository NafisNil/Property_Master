@push('css')
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/css/bootstrap-datetimepicker.min.css">
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/min/moment.min.js"></script>

    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/js/bootstrap-datetimepicker.min.js">
    </script>
    <script>
        $(document).ready(function () {
            $('.date-time-picker').datetimepicker({
                format: 'yyyy-MM-DD HH:mm:ss',
                icons: {
                    time: "fa fa-clock",
                    date: "fa fa-calendar",
                    up: "fa fa-caret-up",
                    down: "fa fa-caret-down",
                    previous: "fa fa-caret-left",
                    next: "fa fa-caret-right",
                    today: "fa fa-today",
                    clear: "fa fa-clear",
                    close: "fa fa-close"
                }
            })

            $('.date-picker').datetimepicker({
                format: 'yyyy-MM-DD',
                icons: {
                    time: "fa fa-clock",
                    date: "fa fa-calendar",
                    up: "fa fa-caret-up",
                    down: "fa fa-caret-down",
                    previous: "fa fa-caret-left",
                    next: "fa fa-caret-right",
                    today: "fa fa-today",
                    clear: "fa fa-clear",
                    close: "fa fa-close"
                }
            })
        })
    </script>
@endpush
