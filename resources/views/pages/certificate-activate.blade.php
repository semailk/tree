@extends('layouts.main')
@section('content')
    <div class="main-box bg-success">
        <div class="row header-title">
            <div class="col-md-12 main-title">
                <h2>My certificates</h2>
            </div>
            <div class="col-md-12 main-description">
                <p>To activate the certificate enter the ID</p>
            </div>
        </div>
    </div>
    @if (session('errors'))
        <div class="mt-2 mb-2">
            <div class="alert-danger">{{ session('errors') }}</div>
        </div>
    @endif

    @if (session('success'))
        <div class="mt-2 mb-2">
            <div class="alert-success">{{ session('success') }}</div>
        </div>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">First Name</th>
            <th scope="col">Email</th>
            <th scope="col">Plantation Year</th>
            <th scope="col">Number Of Trees</th>
            <th scope="col">Total Price</th>
            <th style="font-size: 12px" scope="col" class="alert-danger">Исключения для проверки, "код" так же он приходит на имейл</th>
            <th>Удалить</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th colspan="8" style="text-align: center" class="alert-success">Активные</th>
        </tr>
        @foreach($certificates as $certificate)
            @if($certificate['status'] == 1)
                <tr>
                    <th scope="row">{{ $certificate['name'] }}</th>
                    <td>{{ $certificate['last_name'] }}</td>
                    <td>{{ $certificate['email'] }}</td>
                    <td>{{ $certificate['plantation_year'] }}</td>
                    <td>{{ $certificate['number_of_trees'] }}</td>
                    <td>{{ $certificate['total_price'] }}</td>
                    <td>{{ $certificate['code'] }}</td>
                    <td><a href="{{ route('certificate.delete',  $certificate['id']) }}">Удалить?</a></td>
                </tr>
            @endif
        @endforeach
        <tr>
            <th colspan="8" style="text-align: center" class="alert-danger">Не активные</th>
        </tr>
        @foreach($certificates as $certificate)
            @if($certificate['status'] == 0)
                <tr>
                    <th scope="row">{{ $certificate['name'] }}</th>
                    <td>{{ $certificate['last_name'] }}</td>
                    <td>{{ $certificate['email'] }}</td>
                    <td>{{ $certificate['plantation_year'] }}</td>
                    <td>{{ $certificate['number_of_trees'] }}</td>
                    <td>{{ $certificate['total_price'] }}</td>
                    <td>{{ $certificate['code'] }}</td>
                    <td><a href="{{ route('certificate.delete',  $certificate['id']) }}">Удалить?</a></td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
    <div class="container body__content">
        <div class="form-container">
            <div class="row mt-5">
                <div class="col-md-5">
                    <form action="{{ route('status') }}" method="POST">
                        @csrf
                        <label for="certificate_id">Certificate ID</label>
                        <input type="text" name="code" class="form-control" id="number_of_trees">
                        <button class="btn btn-success btn-buy-now mt-2">Activate</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
