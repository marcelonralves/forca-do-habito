@extends('admin._layout')
@section('content')

    <div class="col-md-12">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Cadastrar Cliente</h3>
            </div>

            <form method="post" action="{{ route('userPostForm') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="full_name">Nome Completo</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" placeholder="ex: Marcelo do Nascimento Alves">
                    </div>
                    <div class="form-group">
                        <label for="username">Login</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="ex: marceloadmin">
                    </div>
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
                    </div>
                    <div class="form-group">
                        <label for="profile">Perfil</label>
                       <input type="text" class="form-control" id="profile" name="profile">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
