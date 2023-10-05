@extends('admin.dash.index')
@section('content')
<div class="container">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-bullhorn"></i>
                  details
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="callout callout-info">
                  <h5>Nome</h5>

                  <p>{{$estimate->name}}</p>
                </div>
                <div class="callout callout-warning">
                  <h5>Prénome</h5>

                  <p>{{$estimate->firstname}}</p>
                </div>
                <div class="callout callout-success">
                  <h5>Email</h5>

                  <p>{{$estimate->email}}</p>                
                </div>
                <div class="callout callout-danger">
                  <h5>Message</h5>

                  <p>{{$estimate->message}}</p>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
</div>
@endsection