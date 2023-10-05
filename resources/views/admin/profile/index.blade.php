@extends('admin.dash.index')
@section('content')
<style>
  .simg{
    height: 50px;
    width: 50px;
  }
</style>
<div class="container">
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">Profile</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th style="width: 40px">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$admin->name}}</td>
                            <td>{{$admin->email}}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('admin.profile.edit', $admin->id) }}" class="btn btn-sm btn-success mr-1"><i class="nav-icon fas fa-edit"></i></a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>  
    </div>
</div>
@endsection