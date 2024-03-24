@extends('artisan.layouts.tpp')

@section('content')
<div class="container">
    <a href="/artisan/command" class="btn btn-secondary">Commands</a>
    <a href="/artisan/produits" class="btn btn-danger">Produits</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in as Artisan!') }}
                    {{Auth::guard('artisan')->user()->nom }}

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
