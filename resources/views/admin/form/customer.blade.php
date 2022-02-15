@extends('admin._layout')
@section('content')

    <div class="col-md-12">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Cadastrar Cliente</h3>
            </div>

            <form method="post" action="{{ route('customerPost') }}">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nome do Cliente</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Marcelo Alves">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Categoria</label>
                        <select name="category" class="form-control" id="exampleInputPassword1">
                            <option value="first">Selecione a categoria</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Perfil</label>
                        <select name="perfil" class="form-control" id="exampleInputPassword1">
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
