@extends('layouts.app')

@section('content')
<div class="py-4 container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">カクテルログを記録</div>
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('notes.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">カクテル名</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="cocktail_name" value="{{ $cocktail_name }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="place" class="col-md-4 col-form-label text-md-right">飲んだ場所</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="place">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="memo" class="col-md-4 col-form-label text-md-right">メモ</label>

                            <div class="col-md-6">
                                <textarea type="text" class="form-control" name="memo"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    記録する
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection