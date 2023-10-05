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
                <h3 class="card-title">List des Accessoires</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <a class="btn btn-primary btn-sm mb-2" href="{{ route('admin.accessory.create') }}">Ajouter Accessoire</a>
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>nome</th>
                      <th>description</th>
                      <th>type</th>
                      <th>image</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($accessories as $accesssorie)
                        <tr>
                            <td>{{$accesssorie->id}}</td>
                            <td>{{$accesssorie->title}}</td>
                            <td>{{$accesssorie->desc}}</td>
                            <td>{{$accesssorie->type->title}}</td>
                            <td>
                                <img src="{{asset('uploads/accessorys/'.$accesssorie->image)}}" class="simg">
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('admin.accessory.edit', $accesssorie->id) }}" class="btn btn-sm btn-success mr-1"><i class="nav-icon fas fa-edit"></i></a>
                                    <form action="{{ route('admin.accessory.delete',['id' => $accesssorie->id]) }}" method="POST">
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
                  {{ $accessories->links() }}
                </div> 
              </div>
              <!-- /.paginate links -->

            </div>
          </div>
@endsection