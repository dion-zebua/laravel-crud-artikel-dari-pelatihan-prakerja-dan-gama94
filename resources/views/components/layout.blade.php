<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prakerja Dion Elson Famahato Zebua</title>
    <meta name="description" content="Prakerja Dion Elson Famahato Zebua" />

    <meta property="og:title" content="Berkah Utama Travel adalah Travel Terbaik Jawa Timur Tepatnya Kediri" />
    <meta property="og:description" content="Prakerja Dion Elson Famahato Zebua" />
    <meta property="og:type" content="website" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg my-2">
            <div class="container px-4 pb-3 border-bottom">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img class="logo-text" src="{{ asset('assets/img/Prakerja-Dion-E-F-Zebua.png') }}" alt="Prakerja Dion Elson Famahato Zebua">
                </a>
                <button class="navbar-toggler btn btn-outline-info shadow" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav gap-2 ms-auto my-2 my-lg-0 navbar-nav-scroll menu">
                        <li class="nav-item">
                            <a class="nav-link text-body-tertiary fw-semibold" href="{{ route('home') }}">Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body-tertiary fw-semibold" href="{{ route('article.admin.index')}}">Admin
                            </a>
                        </li>
                        @if (Auth::user())
                            <li class="nav-item">
                                <a class="nav-link text-body-tertiary fw-semibold" href="{{ route('logout_view')}}">Logout
                                </a>
                            </li>
                        @endif
                    </ul>

                    <a class="ms-lg-5 btn btn-outline-info rounded-3 shadow px-4" href="https://wa.me/6288214535126" target="_blank">Whatsapp</a>
                </div>
            </div>
        </nav>
    </header>
    <main>@yield('body')</main>

    @if (request()->path() == '/' || request()->path() == 'login')
        <!-- Modal Alert -->
        <div class="modal fade" id="myAlert" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Important !!!!</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ol class="list-group list-group-numbered">
                    <li class="list-group-item border-0 p-0 pb-1">Nama saya Dion Elson Famahato Zebua</li>
                    <li class="list-group-item border-0 p-0 pb-1">Web ini merupakan tugas dari pelatihan Prakerja x Gama94</li>
                    <li class="list-group-item border-0 p-0 pb-1">Menampilkan Crud Artikel dan Authentication</li>
                    <li class="list-group-item border-0 p-0 pb-1">Akses admin :
                        <ul>
                            <li>Name : admin</li>
                            <li>Password : Admin123</li>
                        </ul>
                    </li>
                    <li class="list-group-item border-0 p-0 pb-1">Jangan di hack :(</li>
                </ol>
            </div>
            <div class="modal-footer">
                <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Understood Sir</button>
            </div>
            </div>
        </div>
        </div>        
    @endif

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>let table = new DataTable('#myTable');</script>
    <script>
        if(document.querySelector( '#editor' )){
            ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .catch( error => {
                    console.error( error );
                } );
        }
    </script>

    @if (request()->path() == '/' || request()->path() == 'login')
        <script>
            window.onload = () => {
                const myModal = new bootstrap.Modal("#myAlert");
                myModal.show();
            }

        </script>
    @endif
</body>

</html>