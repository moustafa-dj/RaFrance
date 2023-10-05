@extends('admin.dash.index')
@section('content')
<style>
  .simg{
    height: 50px;
    width: 50px;
  }
</style>
<div class="container">
  <div class="card mb-2">
    <div class="card-header">
      <h3 class="card-title">List des services</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <a class="btn btn-primary btn-sm mb-2" href="{{ route('admin.service.create') }}">Ajouter Service</a>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Titre</th>
              <th>Grand Titre</th>
              <th> Sous Titre</th>
              <th>Domain</th>
              <th>image</th>
              <th style="width: 40px">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($services as $service)
                <tr>
                    <td>{{$service->id}}</td>
                    <td>{{$service->title}}</td>
                    <td>{{$service->gtitle}}</td>
                    <td>{{$service->stitle}}</td>
                    <td>
                        {{$service->domain->title}}
                    </td>
                    <td>
                        <img src="{{asset('uploads/services/'.$service->image)}}" class="simg">
                    </td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('admin.service.edit', $service->id) }}" class="btn btn-sm btn-success mr-1"><i class="nav-icon fas fa-edit"></i></a>
                            <form action="{{ route('admin.service.delete',['id' => $service->id]) }}" method="POST">
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
        {{ $services->links() }}
      </div> 
    </div>
  </div>
</div>
@endsection