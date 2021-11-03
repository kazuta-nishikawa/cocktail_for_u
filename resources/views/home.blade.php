@extends('layouts.app')

@section('content')
<div class="container">
    <a class="navbar-brand text-dark" href="{{ route('home') }}"><h2>Cocktail Log</h2></a>
    <div class="row justify-content-between py-4">
        <div class="col-md-4">
            <form class="row" method="GET" action="{{ route('home') }}">
                @csrf
                <input class="form-control me-2 col-md-9" name="search" type="search" placeholder="カクテル名検索" aria-label="Search">
                <button class="btn btn-outline-success col-md-3" type="submit">検索する</button>
            </form>
        </div>
        {{-- <div class="col-md-4">
            <form class="row" method="GET" action="{{ route('home') }}">
                @csrf
                <select class="custom-select col-md-6"　name="sort">
                    <option value="">選択する</option>
                    <option value="1">カクテル名昇順</option>
                    <option value="2">カクテル名降順</option>
                    <option value="3">場所昇順</option>
                    <option value="4">場所降順</option>
                    <option value="5">記録日昇順</option>
                    <option value="6">記録日降順</option>
                </select>
                <button class="btn btn-outline-danger col-md-3" type="submit">並び替え</button>
            </form>
        </div> --}}
        <div class="col-md-2">
            <a href="{{ route('notes.create') }}" class="btn mybtn "><i class="fas fa-plus-circle"></i>新規カクテル記録</a>
        </div>
    </div>
    
    <div class="row justify-content-center">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">カクテル名</th>
                            <th scope="col">場所</th>
                            <th scope="col">登録日</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notes as $note)
                        <tr>
                            <td>
                                <a href="{{ route('notes.show',['id' => $note->id ])}}">
                                    {{ $note->cocktail_name }}
                                </a>
                            </td>
                            <td>{{ $note->place }}</td>
                            <td>{{ $note->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $notes->links() }}
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
