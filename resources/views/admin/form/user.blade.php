@extends('admin._layout')
@section('content')

    <div class="col-md-12">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ isset($user) ? 'Editar' : 'Cadastrar' }} Usuário</h3>
            </div>

            <form method="post" action="{{ isset($user) ? route('admin.post.user.report', ['id' => $user->id]) : route('admin.post.user.register') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="full_name">Nome Completo</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" value="{{ $user->full_name ?? '' }}" placeholder="ex: Marcelo do Nascimento Alves">
                    </div>
                    <div class="form-group">
                        <label for="username">Login</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{ $user->username ?? '' }}" placeholder="ex: marceloadmin">
                    </div>
                    @if(!isset($user))
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" value="" placeholder="Senha">
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="profile">Perfil</label>
                       <input type="text" class="form-control" id="profile" value="{{ $user->profile ?? '' }}" name="profile">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{ isset($user) ? 'Editar' : 'Cadastrar' }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
