@extends('admin._layout')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Default Table</h5>

            <!-- Default Table -->
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Login</th>
                    <th scope="col">Perfil</th>
                    <th scope="col">Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->full_name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->profile }}</td>
                        <td><a href="{{ url("/admin/relatorios/usuario/{$user->id}/edit") }}" class="btn btn-warning">Editar</a>
                            <a href="{{ url("/admin/relatorios/usuario/{$user->id}/del") }}" class="btn btn-danger">Deletar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!-- End Default Table Example -->
        </div>
    </div>
@endsection