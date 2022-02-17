@extends('admin._layout')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Relatório de Categorias</h5>
        @if(isset($categories[0]))

            <!-- Default Table -->
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->title }}</td>
                        <td><a href="{{ url("/admin/relatorios/categorias/{$category->id}/edit") }}" class="btn btn-warning">Editar</a>
                            <a href="{{ url("/admin/relatorios/categorias/{$category->id}/del") }}" onClick="return confirm('Você tem certeza que quer deletar essa categoria? Não há como reverter e também irá DELETAR os usuários que estão nessa categoria!')" class="btn btn-danger">Deletar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
                <br> Não há nenhuma categoria cadastrada, para cadastrar alguma <a href="{{ route('admin.form.category.register') }}">Clique aqui!</a>
            @endif
        </div>
    </div>
@endsection
