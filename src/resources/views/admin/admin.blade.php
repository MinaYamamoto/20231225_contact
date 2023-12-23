@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css')}}">
@endsection

@section('header')
<form class="logout" action="/logout" method="post">
    @csrf
    <button class="logout__button">logaut</button>
</form>
@endsection

@section('content')
<div class="admin__content">
    <div class="admin-heading">
        Admin
    </div>
    <form class="admin-form" action="/admin/search" method="get">
        @csrf
        <div class="search-form__item">
            <input class="search-form__item-input" type="search" name="keyword" placeholder="名前やメールアドレスを入力してください"/>
            <select onchange="submit(this.form)" class="search-form__item-gender" name="gender">
                <option value="">性別</option>
                <option value="1">男性</option>
                <option value="2">女性</option>
                <option value="3">その他</option>
                <option value="0">全て</option>
            </select>
            <select onchange="submit(this.form)" class="search-form__item-category" name="category_id">
                <option value="">お問い合わせの種類</option>
                @foreach($categories as $category)
                <option value="{{ $category['id']}}" @if(old('category_id') == "$category->id") selected @endif {{ $category['content'] }}</option>
                @endforeach
            </select>
            <input onchange="submit(this.form)" name="date" type="date" class="search-form__item-day" value="日付を入力してください"/>
        </div>
        <div class="flex__contents">
            <div class="export__button">
                <button  class="export__button-submit">エクスポート</button>
            </div>
            <div class="form__paginate">
                {{ $paginate->links() }}
            </div>
        </div>
        <div class="form__contact">
            <table>
                <tr>
                    <th>お名前</th>
                    <th>性別</th>
                    <th>メールアドレス</th>
                    <th>お問い合わせの種類</th>
                    <th></th>
                </tr>
                <tr>
                @foreach($contacts as $contact)
                    <td>{{$contact->last_name}} {{$contact->first_name}}</td>
                    @if($contact['gender'] == '1')
                    <td>男性</td>
                    @elseif($contact['gender'] == '2')
                    <td>女性</td>
                    @else
                    <td>その他</td>
                    @endif
                    <td>{{$contact->email}}</td>
                    @foreach($categories as $category)
                    @if($category->id == $contact['category_id'])
                    <td>{{ $category->content }}</td>
                    @endif
                    @endforeach
                    <td>
                    @livewire('modal', ['contact'=>$contact , 'category'=>$category])
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="reset__button">
            <input class="reset__button-submit" type="submit" onclick="location.href='$reset'" value="リセット" />
        </div>
    </form>
</div>
@endsection

