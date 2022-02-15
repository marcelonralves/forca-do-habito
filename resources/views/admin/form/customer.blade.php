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
                        <label for="fullname">Nome do Cliente</label>
                        <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Marcelo Alves">
                    </div>
                    <div class="form-group">
                        <label for="category">Categoria</label>
                        <select class="form-control" name="category" id="category">
                            <option value="first">Selecione a categoria</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="profile">Perfil</label>
                        <select class="form-control" name="profile" id="profile">
                            <option value="first">Selecione o perfil</option>
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
