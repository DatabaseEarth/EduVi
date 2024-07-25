@extends('clients.layout.layout')

@section('title')
    Quên mật khẩu
@endsection
@section('content')
<div class="container mt-5">
    <h2>Quên mật khẩu</h2>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('forgot.password.submit') }}" class="mb-4">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label fw-semibold">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <button type="submit" class="btn btn-primary">Gửi email xác nhận</button>
    </form>
</div>
@endsection

@section('css')
    <style>

    </style>
@endsection
@section('script')
@endsection
