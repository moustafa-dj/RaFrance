@extends('front.home')
@section('home')
<div class="our-domains">
    <div class="container">
        <div class="content">
            <h1 class="head">Nos prestations</h1>
            <h2 class="head">montage de rayonnage, contrôle, vente</h2>
            <div class="holder">
                @foreach($domains as $domain)
                    @foreach($domain->service as $ser)
                        <div class="d-content">
                            <img src="{{asset('uploads/services/'.$ser->image)}}">
                            <h3>{{$ser->title}}</h3>
                            <p>{{$ser->bdescription}}</p>
                            <a href="{{route('contact')}}" class="btn">Demander un devis</a>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="our-site">
    <div class="container">
        <div class="content">
            <div class="img">
                <img src="{{asset('img/front.jpeg')}}">
            </div>
            <div class="desc">
                <h3>Spécialiste du montage de rayonnage</h3>
                <p>Ra France se positionne comme l’expert du montage de rayonnage industriel dans tout le sud de la France.
                     Confiez l’installation de vos équipements à une équipe compétente pour un résultat fiable et conforme aux normes en vigueur.
                    Montage, contrôle, déménagement, vente</p>
                    <a href="{{route('contact')}}" class="btn">Demander un devis</a>
            </div>
        </div>
    </div>
</div>
<div class="our-domains">
    <div class="container">
        <div class="content">
            <h1 class="head">Nos domains</h1>
            <div class="holder">
                @foreach($domainlist as $domain)
                        <div class="d-content">
                            <img src="{{asset('uploads/domains/'.$domain->image)}}">
                            <h3>{{$domain->title}}</h3>
                            <p>{{$domain->description}}</p>
                            <a href="{{route('domaind',['id' => $domain->id])}}" class="btn">voire plus</a>
                        </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection