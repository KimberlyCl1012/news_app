@extends('layouts.dashboard')
@section('title', 'News')
@section('link')
    <link href="{{ asset('/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/plugins/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" />
@endsection
@section('content')

    <div id="content" class="content">
        <h1 class="page-header">News</h1>

        <div class="container">
            <div class="card">
                <div class="card-header bg-black"></div>
                <div class="card-body">
                    <a href="{{ route('news.create') }}" class="btn-generate float-right mb-3"><span
                            class="fas fa-plus"></span> Agregar</a>
                    <div class="table-responsive">
                        <table id="table_news" class="table table-hover table-bordered table-td-valign-middle">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th class="text-nowrap">Nombre</th>
                                    <th class="text-nowrap">Fecha Creación</th>
                                    <th class="text-nowrap">Vistas</th>
                                    <th class="text-nowrap">Estatus</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $contador = 1;
                                @endphp
                                @foreach ($news as $new)
                                    <tr class="text-center">
                                        <td>{{ $contador }}</td>
                                        <td>{{ $new->name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($new->created_at)->format('d/m/y ') }}</td>
                                        <td>1</td>
                                        <td>
                                            @if ($new->status == 1)
                                                Active
                                            @else
                                                Inactive
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('news.destroy', $new->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                @if ($new->status == 1)
                                                    <button type="submit" class="btn btn-danger btn-icon btn-circle btn-lg"
                                                        data-toggle="tooltip" data-placement="top" title="Delete"><span
                                                            class="fas fa-trash"></span></button>
                                                    <a href="{{ route('news.edit', Crypt::encryptString($new->id)) }}"
                                                        class="btn btn-primary btn-icon btn-circle btn-lg"
                                                        data-toggle="tooltip" data-placement="top" title="Updated"><span
                                                            class="fas fa-edit"></span></a>
                                                    <a href="{{ route('news.show', Crypt::encryptString($new->id)) }}"
                                                        class="btn btn-warning btn-icon btn-circle btn-lg"
                                                        data-toggle="tooltip" data-placement="top" title="Show"><span
                                                            class="fas fa-eye"></span></a>
                                                @else
                                                    <button type="submit"
                                                        class="btn btn-success btn-icon btn-circle btn-lg"
                                                        data-toggle="tooltip" data-placement="top" title="Activate"><span
                                                            class="fas fa-plug"></span></button>
                                                    <a href="{{ route('news.edit', Crypt::encryptString($new->id)) }}"
                                                        class="btn btn-primary btn-icon btn-circle btn-lg"
                                                        data-toggle="tooltip" data-placement="top" title="Updated"><span
                                                            class="fas fa-edit"></span></a>
                                                    <a href="{{ route('news.show', Crypt::encryptString($new->id)) }}"
                                                        class="btn btn-warning btn-icon btn-circle btn-lg"
                                                        data-toggle="tooltip" data-placement="top" title="Show"><span
                                                            class="fas fa-eye"></span></a>
                                                @endif
                                            </form>
                                        </td>
                                    </tr>
                                    @php
                                        $contador++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('/plugins/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('/plugins/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
    {{-- Notificaciones del controlador --}}
    @if (Session::has('status'))
        <script>
            Swal.fire(
                'Excelent!',
                'Status updated!',
                'success'
            )
        </script>
    @endif
    @if (Session::has('edit'))
        <script>
            Swal.fire(
                'Excelent!',
                'Status updated!',
                'success'
            )
        </script>
    @endif
    <script>
        $(document).ready(function() {
            $('#table_news').DataTable({
                dom: "<'row'<'col-md-6'l><'col-md-6'f>><'row'<'col-md-6'B><'col-md-6'p>><'row'<'col-md-12't>><'row'<'col-md-12'i>>",
                buttons: [{
                        extend: 'copy',
                        text: '<i class="fas fa-copy fa-lg"></i>',
                        titleAttr: 'Copiar'
                    },
                    {
                        extend: 'csv',
                        fieldSeparator: ';',
                        text: '<i class="fas fa-file fa-lg"></i>',
                        titleAttr: 'CSV'
                    },
                    {
                        extend: 'excel',
                        text: '<i class="fas fa-file-excel fa-lg"></i>',
                        titleAttr: 'Excel'
                    },
                    {
                        extend: 'pdf',
                        orientation: 'landscape',
                        text: '<i class="fas fa-file-pdf fa-lg"></i>',
                        titleAttr: 'PDF'
                    },
                    {
                        extend: 'print',
                        text: '<i class="fas fa-print fa-lg"></i>',
                        titleAttr: 'Imprimir'
                    }
                ],
                responsive: true,
                "autoWidth": false,
                "language": {
                    buttons: {
                        copySuccess: {
                            1: "Copió una fila al portapapeles",
                            _: "Se copiaron %d filas al portapapeles"
                        },
                        copyTitle: 'Datos Copiados'
                    },
                    "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json"
                },
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ]
            });
        });
    </script>
@endsection
