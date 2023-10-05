@extends('front.home')
@section('home')
<div class="contact">
    <div class="container">
        <div class="contact-content">
            <div class="form">
                <form action="{{ route('estimate.send')}}" method="post">
                    @csrf
                    <div class="form-in">
                        <div class="form-row">
                            <label for="name">nome:</label>
                            <input type="text" id="name" placeholder="Entrez votre nom" name ="name">
                        </div>
                        <div class="form-row">
                            <label for="email">prénome:</label>
                            <input type="text" id="email" placeholder="Entrez votre prénom" name ="firstname">
                        </div>
                        <div class="form-row">
                            <label for="email">Email:</label>
                            <input type="email" id="email" placeholder="Entrez votre  email" name ="email">
                        </div>
                        <div class="form-row">
                            <label for="email">Vile:</label>
                            <input type="text" id="email" placeholder="Entrez votre prénom vile" name ="city">
                        </div>
                        <div class="form-row">
                            <label for="email">code postale:</label>
                            <input type="number" id="email" placeholder="Entrez votre code postale" name ="pcode">
                        </div>
                        <div class="form-row">
                            <label for="phone">télephone:</label>
                            <input type="tel" id="phone" placeholder="Entrez votre télephone Ex: +33 ......" name ="phone">
                        </div>
                        <div class="form-row">
                            <label for="message">Message:</label>
                            <textarea id="message" placeholder="Entrez votre message" name ="message" row="5"></textarea>
                        </div>
                        <div class="form-row">
                            <button type="submit">envoyer</button>
                        </div>
                    </div>
                </form>
            </div>  
            <div class="info">
                <div class="info-d">
                    <h3>télephone</h3>
                    <p>+33 7 84 38 88 49</p>
                </div>
                <div class="info-a">
                    <h3>adress</h3>
                    <p>18 rue des barres Sully sur Loire 45600</p>
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection