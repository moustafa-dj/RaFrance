@extends('front.home')
@section('home')
<div class="accessory">
    <div class="container">
    @foreach($types as $type)
        <div class="holder">
                <h2 class="head">{{$type->title}}</h2>
                <p class="h">{{$type->desc}}</p>
                <div class="acc-list">
                    @foreach($type->accessory as $acc)
                        <div class="acc-content">
                            <img src="{{asset('uploads/accessorys/'.$acc->image)}}">
                            <h3>{{$acc->title}}</h3>
                            <p>{{$acc->desc}}</p>
                            <a href="{{route('contact')}}" class="btn">Demander un devis</a>
                        </div>
                    @endforeach
                </div>
        </div>
    @endforeach
    </div>
</div>
@endsection