@extends('layouts.dashboard')
@section('title', 'Create')
@section('content')

    <div id="content" class="content">
        <h1 class="page-header">Create New</h1>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-black"></div>
                <div class="card-body">
                    <form action="{{ route('news.store') }}" method="POST" role="form" data-toggle="validator"
                        enctype="multipart/form-data">
                        @csrf
                        {{-- Hiddens --}}
                        <input type="hidden" name="priority" id="priority" value="0">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"zrequired />
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                            <div class="form-group col-md-6 mt-4">
                                <div class="form-check">
                                    <input class="form-check-input check_priority" type="checkbox" id="check_priority">
                                    <label class="form-check-label" for="priority">
                                        ¿The news is important?
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" name="description" id="description"
                                        style="height: 150px" required></textarea>
                                    <label for="Description">Description...</label>
                                </div>
                            </div>
                        </div>
                        <label for="Image" class="col-sm-12 col-form-label">Select file: <i
                                class="fas fa-question-circle" data-toggle="tooltip" data-placement="top"
                                title="Extensiones permitidas JPEG, BMP, PNG, JPG con un peso máximo de 2 MB Extensión recomendada: PNG"></i></label>
                        <div class="custom-file mb-2">
                            <input type="file" class="form-control" id="image" name="image"
                                accept="image/jpeg,image/png" required>
                            <div class="text-center mt-5 mb-3">
                                <button type="submit" class="btn btn-success"><span class="fas fa-save"></span>
                                    Save</button>
                                <button type="reset" class="btn btn-danger"><span class="fas fa-eraser"></span>
                                    Clean</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    {{-- Notificaciones del controlador --}}
    @if (Session::has('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'error occurred',
                text: 'All data is required'
            })
        </script>
    @endif
    @if (Session::has('create'))
        <script>
            Swal.fire(
                'Excelent!',
                'News created successfully!',
                'success'
            )
        </script>
    @endif
    <script>
        //Change para activar bandera de noticia importante
        const check_priority = document.getElementById('check_priority')
        check_priority.addEventListener('change', (event) => {
            if (event.currentTarget.checked) {
                $('#priority').val(1);
            } else {
                $('#priority').val(0);
            }
        })
    </script>
@endsection
