@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center py-4">

        <h2>カクテルガチャ</h2>
        <form action="{{ route('cocktails.show')}}" method="post">
            @csrf
            <div class="form-group">
                <div>
                    <p>アルコール度数</p>
                    <input type="radio" name="alcohol" value="1">
                    <label for="alcohol">低い(8度以下)</label>
                    <input type="radio" name="alcohol" value="2">
                    <label for="alcohol">普通(9～24度)</label>
                    <input type="radio" name="alcohol" value="3">
                    <label for="alcohol">高い(25度以上)</label>
                </div>
            </div>
            <div class="form-group">
                <div>
                    <p>ベーススピリッツ</p>
                    <select name="base">
                        <option>選択できます</option>
                        <option value="1">ジン</option>
                        <option value="2">ウォッカ</option>
                        <option value="3">テキーラ</option>
                        <option value="4">ラム</option>
                        <option value="5">ウイスキー</option>
                        <option value="6">ブランデー</option>
                        <option value="7">リキュール</option>
                        <option value="8">ワイン</option>
                        <option value="9">ビール</option>
                        <option value="10">日本酒</option>
                        <option value="0">ノンアルコール</option>
                    </select>
                </div>
            </div>
            
            <button type="submit" class="btn mybtn">カクテルガチャを回す</button>
        </form>
    </div>
</div>
@endsection
