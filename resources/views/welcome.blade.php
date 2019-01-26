@extends('layouts.welcome-layout')

@section('content')
<ul class="sidenav" id="mobile-demo">
    <li><a href="#"><i class="material-icons left">home</i>Home</a></li>
    <li><a href="#"><i class="material-icons left">info_outline</i>About Us</a></li>
    <li><a href="#"><i class="material-icons left">contact_mail</i>Contact Us</a></li>
    <li class="divider"></li>
    <li><a class="dropdown-trigger" href="#!" data-target="dropdown2">Account<i class="material-icons right">arrow_drop_down</i></a></li>
</ul>
    <div class="parallax-container">
        <div class="section no-pad-bot">
            <div class="container">
                <br><br>
                <h1 class="header center" style="color: #1393FF;font-weight:bolder;">Ecospotless Car Wash</h1>
                <div class="row center">
                    <h5 class="header col s12" style="font-weight:bolder;color:white!important;">Quality Waterless Car Wash by experts.
                    </h5>
                </div>
                <div class="row center">
                    <a href="{{url('login')}}" id="download-button" class="btn btn-large">Book Now</a>
                </div>
                <br><br>

            </div>
        </div>
        <div class="parallax"><img src="/img/soft-touch-washing.jpg"></div>
    </div>
    <div class="section white">
        <div class="row container">
            <h2 class="header" style="text-align: center;">Welcome</h2>
            <p  style="text-align: justify;color:black!important;font-size: 16px!important;">Washing your vehicle with waterless based techniques is a good step in the right direction
                to save water and our environment.
                We use quality commercially tested waterless products that have been successfully used around the globe. Some of the inherent benefits of waterless car wash products are as below:
                Our services are economical, fast, versatile, reqarding and quality is 100% guaranteed.
            </p>


            {{--<ul style="list-style: circle!important;">--}}
                {{--<li>Economical - We don't require to carry around water around in big trucks. This drastically reduces our expenses and we inherently lower the cost of our service.</li>--}}
                {{--<li>Fast - Depending on size of vehicle and condition, an average exterior service can be carried out in 15-20 minutes using between 100ml – 160ml of product. </li>--}}
                {{--<li>Versatile - Your vehicle can be cleaned at any place and at any time by our mobile teams. The service and results are astounding without causing any disruption or pollution to the surrounding environment,--}}
                    {{--over-spray to neighbouring vehicles or requiring precious time allocation from the vehicle owner.</li>--}}
                {{--<li>Rewarding - By using waterless car washing products and techniques we will be saving 1000's of litres of water. </li>--}}
                {{--<li>Quality - We strive to ensure that we provide urivalled quality service to your satisfaction.</li>--}}
            {{--</ul>--}}
        </div>
        <div class="row container">
            <h4 style="text-align: center;">Why Waterless Car Wash</h4>
            <div class="col s12 m6">
                <div class="card hoverable">
                    <div class="card-content ">
                        <span class="card-title" style="color:black!important;font-weight: 400">Traditional Car Wash</span>
                           <li>Leaves pools of mud and chemicals</li>
                           <li>Resource Consuming - Water, Electricity & kerosene</li>
                           <li>Potential waterway pollution throudh contaminated rinse off</li>
                           <li>Not compatible for indoor operations</li>

                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card hoverable">
                    <div class="card-content">
                        <span class="card-title" style="color:black!important;font-weight: bold;font-weight: 400">Waterless Car Wash</span>
                        <li>No Mess or indication that a valeting operation was present</li>
                        <li>No effect to nearby vehicles, peoples or areas</li>
                        <li>No pollution, water, air or noise</li>
                        <li>Indoor friendly</li>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="container row">
    <h4 style="text-align: center;">Pricing</h4>
    <div class="col s12">

    <table class="">
        <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Vehicle</th>
            <th>Price</th>
        </tr>
        </thead>
        <tbody>

            @foreach($prices as $price)
                <tr>
                    <td>{{$price->service}}</td>
                    <td>{{$price->description}}</td>
                    <td>{{$price->vehicle->name}}</td>
                    <td>{{'R '.$price->price}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>

<h4 style="text-align: center;">Employment Opportunities</h4>
<div id="employment-opportunities" class="parallax-container">
    <div class="section no-pad-bot">
        <div class="container">
            <br/>
            <br/>
            <div class="row center" style="margin-top:7em;">
                <h5 class="header col s12" style="font-weight:bolder;color:#fff!important;">Partner with us - Great franchisee opportunities</h5>
                <h5 class="header col s12" style="font-weight:bolder;color:#fff!important;">Be our Car Valet - Attend to client requests.</h5>
            </div>
            <div class="row center">
                <a href="#" id="download-button" class="btn btn-large">Apply Now</a>
            </div>
        </div>
    </div>
    <div class="parallax"><img src="/img/job-opportunities-logo.jpg" ></div>
</div>

<div class="row container" id="contact-us">
    <h4 style="text-align: center;">Contact Us</h4>
    <div class="col s12 center" >
        <div class="row">
            <form class="col s12">
                <div class="row">
                    <div class="input-field col m6 col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="first_name" type="text" class="validate">
                        <label for="first_name">First Name</label>
                    </div>
                    <div class="input-field col m6 col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="last_name" type="text" class="validate">
                        <label for="last_name">Last Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col m6 col s12">
                        <i class="material-icons prefix">email</i>
                        <input id="email" type="email" class="validate">
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field col m6 col s12">
                        <i class="material-icons prefix">phone</i>
                        <input id="contact_number" type="tel" class="validate">
                        <label for="contact_number">Contact Number</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">mode_edit</i>
                        <textarea id="message" class="materialize-textarea"></textarea>
                        <label for="message">Message</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
</div>

@endsection
        