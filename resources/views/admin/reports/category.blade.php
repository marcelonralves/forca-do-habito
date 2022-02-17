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
                    window.location.href = "{{ url("/admin/relatorios/categorias/{$category->id}/del") }}";
                }
            }
        </script>
    @endsection
    @else
            <br> Não há nenhuma categoria cadastrada, para cadastrar alguma <a href="{{ route('admin.form.category.register') }}">Clique aqui!</a>
            </div>
        </div>
        @endif
@endsection
