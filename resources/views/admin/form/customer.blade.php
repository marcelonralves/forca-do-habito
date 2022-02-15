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
                        <label for="full_name">Nome do Cliente</label>
                        <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Marcelo Alves">
                    </div>
                    <div class="form-group">
                        <label for="category">Categoria</label>
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="profile">Perfil</label>
                        <select class="form-control" name="profile" id="profile">
                            <option value="visualizador">Visualizador</option>
                            <option value="administrador">Administrador</option>
                        </select>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
