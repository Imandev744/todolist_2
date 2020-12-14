@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="mb-4 d-flex align-items-center justify-content-between">

            <h1>ورود کاربر </h1>

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

        <form action="{{route('login')}}" method="post">

            @csrf

            <div class="form-group">
                <label for="email">ایمیل :</label>
                <input type="email" class="form-control" id="email" name="email">

            </div>

            <div class="form-group">
                <label for="password">پسوورد :</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            @if(session('error'))
                <div class="mt-3 ">
                    <p class="alert alert-danger">    {{session('error')}}</p>
                </div>
            @endif

            <button type="submit" class="btn btn-primary">ورود </button>

        </form>

    </div>
@endsection
