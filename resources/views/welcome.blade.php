@extends('layouts.guest')

@section("content")
<div class="row top-content">
    <div class="col-12 ">
        <button class="btn">CREATE AN APP NOW!</button>
    </div>
</div>

<div class="row middle-content">
    <div class="col-md-12">
        <h2>We've made app creation simple for everyone!</h2>
    </div>
    <div class="col-md-6 text-right">
        <img src="{{url('images')}}/price.png">
    </div>
    <div class="col-md-6">
        <ul>
            <li>With some information of your salon, we'll create the App for you</li>
            <li>We deal with managing the App on both Apple and Google</li>
            <li>You get to customize the look of the App to match your salon</li>
            <li>View and easily manage all appointments for all your salons</li>
            <li>Easily manage your stylists and locations</li>
        </ul>
    </div>
</div>

<div class="row" style="margin-top:30px;">
    <div class="col-12 text-center">
        <div class="bottom-content">
            <div class="row">
                <div class="col-md-5 text-right">
                    <img src="{{url('images')}}/phone.png">
                </div>
                <div class="col-md-7 text-left" style="padding-top:20px;">
                    <h3>Salon Owners Join Us</h3>
                    <p>Text for the box goes here</p>
                    <button class="btn">CREATE AN APP NOW!</button>
                </div>
            </div>
        </div>
    </div>
</div>
@stop