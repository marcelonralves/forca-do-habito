@extends('admin._layout')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Relatório de Clientes</h5>
            @if(isset($customers[0]))
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Perfil</th>
                        <th scope="col">Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($customers as $customer)
                        <tr>
                            <th scope="row">{{ $customer->id }}</th>
                            <td>{{ ucfirst($customer->full_name) }}</td>
                            <td><span style="background-color: {{ $customer->category->color }}; color: white" class="badge">{{ $customer->category->title }}</span></td>
                            <td>{{ ucfirst($customer->profile) }}</td>
                            <td><a href="{{ url("/admin/relatorios/clientes/{$customer->id}/edit") }}" class="btn btn-warning">Editar</a>
                                <a href="{{ url("/admin/relatorios/clientes/{$customer->id}/del") }}" onClick="return confirm('Você tem certeza que quer deletar esse cliente? Não há como reverter')" class="btn btn-danger">Deletar</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <br> Não há nenhum cliente cadastrado, para cadastrar alguém <a href="{{ route('admin.form.customer.register') }}">Clique aqui!</a>
            @endif
        </div>
    </div>

@endsection

