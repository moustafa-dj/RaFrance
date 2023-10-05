@extends('front.home')
@section('home')
<div class="domain">
    <div class="container">
        <div class="domain-content">
            <h2>dans {{$domain->title}} nous avons</h2>
            <div class="services">
                @foreach($services as $service)
                    <div class="service-content">
                        <img src="{{asset('uploads/services/'.$service->image)}}">
                        <div class="info">
                            <p>{{$service->title}}</p>
                            <a href="{{route('service',['id' => $service->id])}}" class="ln" >voir plus</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection