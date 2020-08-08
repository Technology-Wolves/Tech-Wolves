@extends('layouts.dashboard.dashboardLayout')
@section('title', 'All Contacts Messages')
@section('main-section')
    @if(Session::has('success-message'))
        <p class="container mt-3 alert col-md-7 text-center {{ Session::get('alert-class', 'alert-info') }}"><i class="fas fa-check-circle"></i> {{ Session::get('success-message') }}</p>
    @endif

    @if(Session::has('error-message'))
        <p class="container mt-3 alert col-md-7 text-center {{ Session::get('alert-class', 'alert-info') }}"><i class="fas fa-times-circle"></i> {{ Session::get('error-message') }}</p>
    @endif
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid col-md-8 mt-3">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0 text-dark title-text">Contact Messages</h1>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid col-md-9">
                <div class="row">
                    @foreach($contacts as $contact)
                    <div class="jumbotron pb-2">
                        <img src="{!! asset('/uploads/profileImage/default.png') !!}" height="100px" width="100px" class="float-left mr-3 pb-3" style="border-radius: 50%;">
                        <h1 class="display-6">{!! $contact->name !!}</h1>
                        <span class="form-text text-secondary">{!! $contact->email !!}</span>
                        <hr class="my-4">
                        <p>{!! $contact->subject !!}</p>
                        <p class="lead text-justify">{!! $contact->message !!}</p>
                        <p class="lead float-right mt-4">
                            <a class="btn btn-primary" href="mailto: {{$contact->email}}?subject=Hello from the techwolves.">Reply <i class="fas fa-reply"></i></a>
                            <a class="btn btn-danger text-light" href="{!! url('/deleteContacts', $contact->id) !!}">Delete <i class="fas fa-trash-alt"></i></a>
                        </p>
                    </div>
                    @endforeach
                    {{--Pagination Begins--}}
                    <div class="paginations">
                        {{ $contacts->links() }}
                    </div>
                    {{--Pagination Ends--}}
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
