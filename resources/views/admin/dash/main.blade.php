@extends('admin.dash.index')
@section('content')
      <div class="container-fluid">
        <div class="row">
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-info">
                  <div class="inner">
                  @php
                      $tableName = 'domains';
                      $recordCount = countTableRecords($tableName);
                  @endphp
                      <h3>{{ $recordCount }}</h3>
                      <p>Domains</p>
                  </div>
                  <div class="icon">
                      <i class="ion ion-bag"></i>
                  </div>
                  <a href="{{route('admin.domain.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-success">
                  <div class="inner">
                  @php
                      $tableName = 'services';
                      $recordCount = countTableRecords($tableName);
                  @endphp
                      <h3>{{$recordCount}}</h3>

                      <p>Services</p>
                  </div>
                  <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="{{route('admin.service.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-warning">
                  <div class="inner">
                  @php
                      $tableName = 'estimates';
                      $recordCount = countTableRecords($tableName);
                  @endphp
                      <h3>{{$recordCount}}</h3>

                      <p>Devis</p>
                  </div>
                  <div class="icon">
                      <i class="ion ion-person-add"></i>
                  </div>
                  <a href="{{route('admin.estimate.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                  <div class="inner">
                  @php
                      $tableName = 'accessories';
                      $recordCount = countTableRecords($tableName);
                  @endphp
                      <h3>{{$recordCount}}</h3>

                      <p>Accessoires</p>
                  </div>
                  <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="{{route('admin.accessory.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-success">
                  <div class="inner">
                  @php
                      $tableName = 'visitors';
                      $recordCount = countTableRecords($tableName);
                  @endphp
                      <h3>{{$recordCount}}</h3>

                      <p>Visitors</p>
                  </div>
                  <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                  </div>
                  </div>
              </div>
        </div>
        <div class="table-responsive col-md-6">
          <?php 
              $estimates = config('estimates');
          ?>
              <table class="table table-bordered bg-white">
              <thead>
                  <tr>
                  <th>nome</th>
                  <th>prénome</th>
                  <th>Email</th>
                  <th style="width: 40px">Action</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($estimates as $estimate)
                      <tr>
                          <td>{{$estimate->name}}</td>
                          <td>{{$estimate->firstname}}</td>
                          <td>{{$estimate->email}}</td>
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
        </div>
      </div>
  @endsection