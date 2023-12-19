@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css')}}">
@endsection

@section('header')
<form class="register">
    <button class="register__button" type="submit" onclick="/register">register</button>
</form>
@endsection

@section('content')
<div class="login__content">
    <div class="login-heading">
        login
    </div>
    <form class="login__form" action="/login" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
            </div>
            <div class="form__group--content">
                <div class="form__input--text">
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="例：test@example.com"/>
                </div>
                <div class="form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">パスワード</span>
            </div>
            <div class="form__group--content">
                <div class="form__input--text">
                    <input type="password" name="password" value="{{ old('password') }}" placeholder="例：coachtech1106"/>
                </div>
                <div class="form__error">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">ログイン</button>
        </div>
    </form>
</div>
@endsection
