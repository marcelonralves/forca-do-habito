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
                        <label for="fullname">Nome Completo</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="ex: Marcelo do Nascimento Alves">
                    </div>
                    <div class="form-group">
                        <label for="login">Login</label>
                        <input type="text" class="form-control" id="login" name="fullname" placeholder="ex: marceloadmin">
                    </div>
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
                    </div>
                    <div class="form-group">
                        <label for="profile">Perfil</label>
                        <select name="perfil" class="form-control" id="profile" name="profile">
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
