@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css')}}">
@endsection

@section('content')
<div class="confirm__content">
    <div class="confirm__heading">
        <h2>Confirm</h2>
    </div>
    <form class="form" action="/thanks" method="post">
        @csrf
        <div class="confirm-table">
            <table class="confirm-table__inner">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__text">
                        <input type="text" name="name" value="{{ $contact['last_name'].'  ' .$contact['first_name']}}" readonly />
                        <input type="hidden" name="first_name" value="{{$contact['first_name']}}"/>
                        <input type="hidden" name="last_name" value="{{$contact['last_name']}}"/>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__text">
                        @if($contact['gender'] == '1')
                        <input class="confirm-table__text" value="男性">
                        @elseif($contact['gender'] == '2')
                        <input class="confirm-table__text" value="女性">
                        @else
                        <input class="confirm-table__text" value="その他">
                        @endif
                        <input type="hidden" name="gender" value="{{$contact['gender']}}"/>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__text">
                        <input type="text" name="email" value="{{ $contact['email'] }}" readonly />
                        <input type="hidden" name="email" value="{{$contact['email']}}"/>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__text">
                        <input type="text" name="tell" value="{{ $tell['tell--1'].$tell['tell--2'].$tell['tell--3']}}" readonly />
                        <input type="hidden" name="tell--1" value="{{$tell['tell--1']}}"/>
                        <input type="hidden" name="tell--2" value="{{$tell['tell--2']}}"/>
                        <input type="hidden" name="tell--3" value="{{$tell['tell--3']}}"/>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__text">
                        <input type="text" name="address" value="{{ $contact['address'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__text">
                        <input type="text" name="building" value="{{ $contact['building'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__text">
                        @foreach($categories as $category)
                            @if($category->id == $contact['category_id'])
                            <input type="text" name="category" value="{{ $category->content }}" readonly />
                            @endif
                        @endforeach
                        <input type="hidden" name="category_id" value="{{$contact['category_id']}}"/>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせ内容</th>
                    <td class="confirm-table__text">
                        <input type="text" name="detail" value="{{ $contact['detail'] }}" readonly >
                    </td>
                </tr>
            </table>
        </div>
        <div class="form__flex">
            <div class="form__button">
                <button class="form__button--submit" type="submit">送信</button>
            </div>
            <div class="form__button">
                <button class="form__button--back" name="back" value="back"><u>修正</u></button>
            </div>
        </div>
    </form>
</div>
@endsection
