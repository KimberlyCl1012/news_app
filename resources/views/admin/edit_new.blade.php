@extends('layouts.dashboard')
@section('title', 'Edit')
@section('content')

    <div id="content" class="content">
        <h1 class="page-header">Edit New</h1>

        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-black"></div>
                <div class="card-body">
                    <form action="{{ route('news.update',$newDetails->id) }}" method="POST" role="form" data-toggle="validator"
                        id="formulario" enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        @csrf
                        {{-- Hiddens --}}
                        <input type="hidden" name="priority" id="priority" value="0">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $newDetails->name }}" />
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                            <div class="form-group col-md-6 mt-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                        {{ $newDetails->priority == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckChecked">
                                        ¿The news is important?
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" name="description" id="description"
                                        style="height: 150px">{{ $newDetails->description }}</textarea>
                                    <label for="Description">Description...</label>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <input type="file" class="form-control" id="image" name="image"
                                aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                        </div>
                        <div class="text-center mt-5 mb-3">
                            <button type="submit" class="btn btn-success" id="enviar_us"><span class="fas fa-save"></span>
                                Save</button>
                            <button type="reset" class="btn btn-danger"><span class="fas fa-eraser"></span>
                                Clean</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
@endsection
