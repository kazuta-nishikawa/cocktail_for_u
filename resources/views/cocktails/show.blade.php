@extends('layouts.app')

@section('content')
<div class="container">
    <div class="py-4 row justify-content-sm-center">
        
        <div class="col-md-8">
                <h3 style="margin: 10px 0 ;">今夜のおすすめカクテルはこちらです！</h3>
                <h2>{{ $cocktail['cocktail_name'] }}</h2>

                <hr style="border:none; border-top: 3px #000000 solid;">
                <h4>{{ $cocktail['cocktail_name_english'] }}</h4>
                <div class="table-responsive">
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <td>{{ $cocktail['style_name'] }}カクテル</td>
                                <td>{{ $cocktail['glass_name'] }}</td>
                                <td>{{ $cocktail['taste_name'] }}</td>
                                <td>{{ $cocktail['alcohol'] }}度前後</td>
                                <td>{{ $cocktail['technique_name'] }}</td>
                                @if (isset($cocktail['base_name']))
                                    <td>{{ $cocktail['base_name'] }}ベース</td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
        </div>
        <div class="w-100 d-none d-md-block"></div>

        <div class="col-md-8">
            <h3>{{ $cocktail['cocktail_digest'] }}</h3>
            <p>{{ $cocktail['cocktail_desc'] }}</p>
        </div>
        <div class="w-100 d-none d-md-block"></div>

        <div class="col-md-8">
            <div class="table-responsive">
                <table class="table table-sm table-borderless">
                    <thead>
                        <th>レシピ</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($cocktail['recipes'] as $ingredient)
                        <tr>
                            <td>{{ $ingredient['ingredient_name'] }}</td>
                            <td>{{ $ingredient['amount'] }}{{ $ingredient['unit'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <p>{{ $cocktail['recipe_desc'] }}</p>
        </div>
        <div class="w-100 d-none d-md-block"></div>

    </div>
    <div class="text-center py-2">
        <form action="{{ route('cocktails.show') }}" method="post">
            @csrf
            <input type="hidden" name="alcohol" value="{{ $input_alc }}">
            <input type="hidden" name="base" value="{{ $input_base }}">
            <button type="submit" class="btn mybtn">もう一度ガチャを回す</button>
        </form>
    </div>
    <div class="text-center py-3">
        <form action="{{ route('notes.create') }}" method="get">
            @csrf
            <input type="hidden" name="cocktail_name" value="{{ $cocktail['cocktail_name'] }}">
            <button type="submit" class="btn mybtn">このカクテルをカクテルログに記録する</button>
        </form>
    </div>
</div>
@endsection
