@extends('layouts.app')

@section('content')
    <div class="container py-4 text-center">
        <div>
            <h4>カクテル名</h4>
            <h2>{{ $note->cocktail_name }}</h2>
        </div>
        <hr style="border:none; border-top: 3px #000000 solid;">
        <div>
            <h4>場所</h4>
            <p>{{ $note->place }}</p>
            
        </div>
        <div>
            <h4>メモ</h4>
            <p>{{ $note->memo }}</p>
        </div>
        <div>
            <a href="{{ route('notes.edit',['id' => $note->id ])}}" class="btn mybtn mb-3"><i class="fas fa-edit"></i> 編集する</a>
            <form method="POST" action="{{ route('notes.destroy', ['id' => $note->id ])}}" id="delete_{{ $note->id}}" >
                @csrf
                <a href="#" class="btn mybtn" data-id="{{ $note->id }}" onclick="deletePost(this);" >
                    <i class="fas fa-trash-alt"></i> 削除する
                </a>
            </form>
        </div>
    </div>

    <script>
        <!--
        /************************************
        削除ボタンを押してすぐにレコードが削除
        されるのも問題なので、一旦javascriptで
        確認メッセージを流します。
        *************************************/
        //-->
        function deletePost(e) {
            'use strict';
            if (confirm('本当に削除していいですか?')) {
            document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
        </script>
@endsection