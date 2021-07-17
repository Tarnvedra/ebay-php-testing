@extends('layouts.app')

@section('content')

    <!-- Page Wrapper -->
    <div id="wrapper">
    @include('include/sidebar')
    <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
            @include('include/topbar')
            <!-- Begin Page Content -->
                <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Home') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Welcome to the ebay testing Laravel application ') }}
                </div>
            </div>
        </div>
    </div>
</div>
            </div>
        </div>
    </div>
@endsection
