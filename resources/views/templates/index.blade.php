<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Website | {{ $title }}</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <!-- Custom fonts for this template -->
    <link href="/vendor/fontawesome-free-6.4.2-web/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style>
        #imgPreview {
            object-fit: cover;
            aspect-ratio: 1/1;
            width: 200px;
        }
        .thumbnailCard {
            background: #ddd;
            min-height: 200px;
        }
        .dropArea {
            max-width: 100%;
            height: 200px;
            padding: 25px;
            display: grid;
            place-items: center;
            text-align: center;
            font-family: sans-serif;
            font-weight: 500;
            font-size: 1.2rem;
            cursor: pointer;
            color: #ccc;
            border: 4px dashed #000;
            border-radius: 10px;
        }

        .dropArea-over {
            border-style: solid;
        }

        .dropFile {
            display: none;
        }

        .dropArea-thumb {
            width: 100%;
            height: 100%;
            border-radius: 10px;
            overflow: hidden;
            background: #ccc;
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
        }

        .dropArea-thumb::after {
            content: attr(data-label);
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 5px 0;
            color: white;
            background: rgba(0, 0, 0, .75);
            font-size: .9rem;
            text-align: center;
        }

        .thumb-card {
            display: grid;
            place-items: center;
            background: #ddd;
            height: 200px;
        }
        .thumb-card img {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
            object-position: top;
        }
    </style>

</head>

<body id="page-top">
    @if (!request()->is('file/create'))        
        @if (session('errors'))
            <div class="alert alert-danger alert-dismissible fade show w-25 m-3" role="alert"
                style="position: fixed; z-index: 1; top: 0; right: 0;">
                <strong>Error!</strong> {{ session('errors') }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    @endif

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('user.templates.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('user.templates.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                @yield('content')
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    @include('user.templates.modal')

    <script>
        const bSalin = document.querySelectorAll("#salin");
        bSalin.forEach((b) => {
            b.addEventListener('click', () => {
                link = document.querySelector('#link');
                navigator.clipboard.writeText(link.value);
                alert('berhasil disalin');
            });
        })

        function showPreview(event){
            if(event.target.files.length > 0){
                let src = URL.createObjectURL(event.target.files[0]);
                let preview = document.getElementById("imgPreview");
                preview.src = src;
                // preview.style.display = "block";
            }
        }
    </script>
    @if (request()->is('file/create') || request()->is('file/*/edit'))
        <script>
            document.querySelectorAll('.dropFile').forEach((i) => {
                // Ketika droparea diklik akan membuka file explorer
                const dropArea = i.closest('.dropArea');
                dropArea.addEventListener('click', (e) => {
                    i.click();
                });

                // Drag and drop
                i.addEventListener('change', (e) => {
                    if (i.files.length) {
                        thumb(dropArea, i.files[0]);
                    }
                })

                dropArea.addEventListener('dragover', (e) => {
                    e.preventDefault();
                    dropArea.classList.add('dropArea-over');
                });
                ['dragleave', 'dragend'].forEach((type) => {
                    dropArea.addEventListener(type, (e) => {
                        dropArea.classList.remove('dropArea-over');
                    })
                });
                dropArea.addEventListener('drop', (e) => {
                    e.preventDefault();
                    if (e.dataTransfer.files.length) {
                        i.files = e.dataTransfer.files;
                        thumb(dropArea, e.dataTransfer.files[0]);
                    }
                    dropArea.classList.remove('dropArea-over');
                });
            })

            function thumb(dropArea, file) {
                let thumbElement = dropArea.querySelector('.dropArea-thumb');

                if (dropArea.querySelector('.dropText')) {
                    dropArea.querySelector('.dropText').remove();
                }

                if (!thumbElement) {
                    thumbElement = document.createElement('div');
                    thumbElement.classList.add('dropArea-thumb');
                    dropArea.appendChild(thumbElement);
                }
                thumbElement.dataset.label = file.name;

                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = () => {
                        thumbElement.style.backgroundImage = `url('${reader.result}')`;
                    };
                } else {
                    thumbElement.style.backgroundImage = null;
                }
            }
        </script>
    @endif

    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/js/demo/datatables-demo.js"></script>

</body>

</html>
