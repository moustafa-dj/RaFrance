@extends('admin.dash.index')
@section('content')
<div class="container">
    <div class="card mb-2">
      <div class="card-header">
        <h3 class="card-title">List des devis</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>nome</th>
              <th>prénome</th>
              <th>Email</th>
              <th>willaya</th>
              <th>code postale</th>
              <th>numéro télephone</th>
              <th style="width: 40px">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($estimates as $estimate)
                <tr>
                    <td>{{$estimate->name}}</td>
                    <td>{{$estimate->firstname}}</td>
                    <td>{{$estimate->email}}</td>
                    <td>{{$estimate->city}}</td>
                    <td>
                        {{$estimate->pcode}}
                    </td>
                    <td>
                        {{$estimate->phone}}
                    </td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('admin.estimate.detail',$estimate) }}" class="btn btn-sm btn-success mr-1"><i class="nav-icon fas fa-edit"></i></a>
                            <form action="{{ route('admin.estimate.delete',$estimate) }}" method="POST">
                                @csrf
                                <button class="btn btn-sm btn-danger" type="submit">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
        <div class="mt-2">
          {{ $estimates->links() }}
        </div> 
      </div>
    </div>
  </div>
@endsection