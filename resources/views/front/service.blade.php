@extends('front.home')
@section('home')
<div class="service">
    <div class="container">
        <div class="service-content">
            <img src="{{asset('uploads/services/'.$service->image)}}" class="">
            <h2>{{$service->title}}</h2>
            <p>{{$service->description}}</p>
            <h3>{{$service->stitle}}</h3>
            <p>{{$service->bdescription}}</p>
            <a href="{{route('contact')}}" class="sbtn" >demander un devis</a>
        </div>
    </div>
</div>
@endsection