@extends('admin._layout')
@section('content')

    <div class="col-md-12">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Cadastrar Cliente</h3>
            </div>

            <form method="post" action="{{ route('customerPostForm') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="category">Categoria</label>
                        <input type="text" class="form-control" id="category" name="category" placeholder="Operador">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
