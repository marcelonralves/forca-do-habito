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
                    <th scope="col">Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->title }}</td>
                        <td><a href="{{ url("/admin/relatorios/categorias/{$category->id}/edit") }}" class="btn btn-warning">Editar</a>
                            <a href="{{ url("/admin/relatorios/categorias/{$category->id}/del") }}" class="btn btn-danger">Deletar</a>
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
                    window.location.href = "{{ url("/admin/relatorios/categorias/{$category->id}/del") }}";
                }
            }
        </script>
    @endsection
@endsection
