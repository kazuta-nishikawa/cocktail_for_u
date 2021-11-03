@extends('layouts.app')

@section('content')
<div class="py-4 container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">カクテルログを編集</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('notes.update',['id'=>$note->id]) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">カクテル名</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="cocktail_name" value="{{ $note->cocktail_name }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="place" class="col-md-4 col-form-label text-md-right">飲んだ場所</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="place"  value="{{ $note->place }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="memo" class="col-md-4 col-form-label text-md-right">メモ</label>

                            <div class="col-md-6">
                                <textarea type="text" class="form-control" name="memo">{{ $note->memo }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    変更を保存
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