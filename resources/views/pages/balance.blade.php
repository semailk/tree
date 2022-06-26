@extends('layouts.app')
@section('content')
    <h1 class="m-5">Пополнине Баланса</h1>
    <form action="{{ route('add-balance') }}" class="w-50 m-5" method="POST">
        @csrf
        <label for="balance">Пополнине баланса</label>
        <input type="number" name="balance" class="form-control">

        <button class="btn btn-primary mt-2">Пополнить</button>
    </form>
@endsection
