@extends('layouts.main')
@section('content')
    <div class="main-box bg-success">
        <div class="row header-title ">
            <div class="col-md-12 main-title">
                <h2>Present a certificate</h2>
            </div>
            <div class="col-md-12 main-description">
                <p>To give a certificate, fill in all the details of this person.</p>
            </div>
        </div>
    </div>

    <div class="container body__content">
        <div class="form-container">
            <form action="{{ route('certificate.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-5">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name">

                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email">
                    </div>
                    <div class="col-md-5">
                        <label for="last_name">Last name</label>
                        <input type="text" name="last_name" class="form-control" id="last_name">

                        <label for="plantation_year">Plantation year</label>
                        <input type="date" name="plantation_year" class="form-control" id="plantation_year">

                    </div>
                </div>

                <div class="card w-25 mt-3 price-per-tree">
                    <img src="{{ asset('images/tree.png') }}" width="100" height="100">
                    <h3>Price per tree</h3>
                    <h1 id="to_be_paid_int">{{$pricePerTree}}$</h1>
                </div>

                <div class="col-md-5 mt-5">
                    <label for="number_of_trees">Number of trees</label>
                    <input type="number" name="number_of_trees" class="form-control" id="number_of_trees">
                </div>



                <div class="col-md-5 mt-5">
                    <label for="to_be_paid">To be paid</label>
                    <input name="to_be_paid" id="to_be_paid" type="number" readonly class="form-control">
                    @if ($errors->any())
                        <div class="mt-2 mb-2">
                            @foreach ($errors->all() as $error)
                                <div class="alert-danger">{{$error}}</div>
                            @endforeach
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="mt-2 mb-2">
                                <div class="alert-success">{{ session('success') }}</div>
                        </div>
                    @endif
                    <button class="btn btn-success btn-buy-now mt-2">Buy a tree now</button>
                </div>

            </form>
        </div>
    </div>

@endsection
