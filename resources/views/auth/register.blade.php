@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="mb-4 d-flex align-items-center justify-content-between">

            <h1>ثبت نام کاربر </h1>

        </div>

        @if($errors ->any())
            <div class="alert alert-danger">
                <ui>
                    @foreach($errors->all() as $error )
                        <li>
                            {{$error}}
                        </li>
                    @endforeach
                </ui>
            </div>
        @endif

        <form action="{{route('register')}}" method="post">

            @csrf

            <div class="form-group">
                <label for="name">نام :</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <div class="form-group">
                <label for="email">ایمیل :</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="mobile">موبایل :</label>
                <input type="text" class="form-control" id="mobile" name="mobile">
            </div>

            <div class="form-group">
                <label for="password">پسوورد :</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group">
                <label for="password_confirmation">تکرار پسوورد :</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>

            <button type="submit" class="btn btn-primary">ثبت نام</button>
            <a href="{{route('login')}}" class="btn btn-warning">صفحه ورود </a>

        </form>

    </div>
@endsection
