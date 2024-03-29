<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpusnik | {{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/styles/global.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/custom-divider-waves.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta name="csrf-token" content="{{csrf_token()}}">
</head>

<body>
    @yield('main')
    <script src="{{ asset('assets/plugins/jquery-3.7.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    @if(session()->has('error'))
    <script>
        errorAlert('{{session("error")}}');
    </script>
    @endif
    @if(session()->has('success'))
    <script>
        successAlert('{{session("success")}}');
    </script>
    @endif
    @if(session()->has('info'))
    <script>
        infoAlert('{{session("info")}}');
    </script>
    @endif/
    <script>
        const errorAlert = (message) => {
            swal({
            title: message,
            className: 'text-danger',
            icon: 'error',
            button: {
                text: 'Siap, laksanakan!',
                className : 'btn bg-danger text-light',
            },
            });
        }

        const successAlert = (message) => {
            swal({
            title: message,
            icon: 'success',
            button: {
                text: 'Oke',
                className : 'btn bg-success text-light',
            },
            });
        }

        const infoAlert = (message) => {
            swal({
            title: message,
            icon: 'info',
            button: {
                text: 'Oke',
                className : 'btn bg-info text-light',
            },
            });
        }

        const confirmAlert = () => {
            swal({
                title: 'Apakah anda yakin?',
                text: 'Item ini akan dihapus.',
                icon: 'warning',
                buttons: true,
                dangerMode: true
            }).then((willDelete) => {
                if(willDelete){
                    // swal('Item ini sudah terhapus', {
                    //     icon: 'success'
                    // });
                    deleteItem();
                }
            });
        }


    </script>
    @stack('scripts')
</body>

</html>
