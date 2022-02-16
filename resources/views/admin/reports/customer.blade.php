@extends('admin._layout')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Relatório de Clientes</h5>
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
                        <td>{{ $customer->full_name }}</td>
                        <td><span class="badge bg-danger">{{ $customer->category->title }}</span></td>
                        <td>{{ $customer->profile }}</td>
                        <td><a href="{{ url("/admin/relatorios/clientes/{$customer->id}/edit") }}" class="btn btn-warning">Editar</a>
                            <button onclick="confirmDelete()" class="btn btn-danger">Deletar</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!-- End Default Table Example -->
        </div>
    </div>
    @section('script')
        <script>
            function confirmDelete() {
                let confirma = confirm("Você tem certeza que quer deletar esse registro? Ação não reversível");
                if (confirma) {
                    window.location.href = "{{ url("/admin/relatorios/clientes/{$customer->id}/del") }}";
                }
            }
        </script>
    @endsection
@endsection
