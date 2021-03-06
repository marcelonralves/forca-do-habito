@extends('admin._layout')
@section('content')

    <div class="col-md-12">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ isset($category) ? 'Editar' : 'Cadastrar' }}  Categoria</h3>
            </div>

            <form method="post" action="{{ isset($category) ? route('admin.post.category.report', ['id'=> $category->id]) : route('admin.post.category.register') }}">
                @csrf

                @if(isset($category))
                    <input type="hidden" name="id" value="{{ $category->id }}">
                @endif

                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Categoria</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Operador" value="{{ $category->title ?? '' }}">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{ isset($category) ? 'Editar' : 'Cadastrar' }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
