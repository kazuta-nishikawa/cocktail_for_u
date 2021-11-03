@extends('layouts.app')

@section('content')

    <div>
        <div class="jumbotron text-center text-light jumbotron-fluid">
            <h1 class="jumbotron-heading">CocktailForUとは？</h1>
            <hr>
            <div class="lead text-light">
                <p>簡単におすすめカクテルを提案するサービスです。</p>
                <p>バーで注文が決まらない時、あなたにカクテルを提案します。</p>
                <p>カクテルにあまり詳しくない方は、好みのものを見つけてみましょう。</p>
                <p>カクテルに詳しい方は普段飲まないカクテルに出会えるかもしれません。</p>
            </div>
        </div>

        <div class="bg-light container bg-stone">
            
                {{-- カクテルガチャで探す --}}
                <div class="card mb-3" style="background:url(../images/stone_pink.png) center no-repeat; background-size: cover;">
                    <div class="row g-0">
                        <div class="col-sm-6">
                            <img src="../images/5052766_s.jpg" width="100%" alt="gacha_image"role="img">
                        </div>
                        <div class="col-sm-6">
                            <div class="card-body">
                                <h5 class="card-title">カクテルガチャ</h5>
                                <p class="card-text">今夜おすすめの一杯をランダムで提案します。</p>
                                <a href="{{ route('cocktails.gacha') }}" class="mybtn">
                                    <i class="fas fa-glass-martini"></i>カクテルガチャへ
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            
                {{-- カクテルろぐ --}}
                <div class="card mb-3" style="background:url(../images/stone_orange.png) center no-repeat; background-size: cover;">
                    <div class="row g-0">
                        <div class="col-sm-6">
                            <img src="../images/22235617_s.jpg" width="100%" alt="note_image"role="img">
                        </div>
                        <div class="col-sm-6">
                            <div class="card-body">
                                <h5 class="card-title">カクテルログ</h5>
                                <p class="card-text">飲んだカクテルを記録したい方はこちら</p>
                                <a href="{{ route('home') }}" class="btn mybtn">
                                    <i class="fas fa-glass-martini"></i>カクテルログへ
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection