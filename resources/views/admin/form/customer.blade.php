@extends('admin._layout')
@section('content')

    <div class="col-md-12">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><h3 class="card-title">{{ isset($customer) ? 'Editar' : 'Cadastrar' }}  Cliente</h3></h3>
            </div>

            <form method="post" action="{{ isset($customer) ? route('admin.post.customer.report', ['id' => $customer->id]) : route('admin.post.customer.register') }}">
                @csrf

                @if(isset($customer))
                    <input type="hidden" name="id" value="{{ $customer->id }}">
                @endif

                <div class="card-body">
                    <div class="form-group">
                        <label for="full_name">Nome do Cliente</label>
                        <input type="text" class="form-control" name="full_name" id="full_name" value="{{ $customer->full_name ?? '' }}" placeholder="Marcelo Alves">
                    </div>
                    <div class="form-group">
                        <label for="category">Categoria</label>
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" value="{{ (isset($customer) && $customer->category_id == $category->id) ? 'selected' : '' }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="profile">Perfil</label>
                        <select class="form-control" name="profile" id="profile">
                            <option value="visualizar">Visualizador</option>
                            <option value="administrar">Administrador</option>
                        </select>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{ isset($customer) ? 'Editar' : 'Cadastrar' }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
