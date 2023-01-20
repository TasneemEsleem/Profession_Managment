@extends('cms.parent')
@section('title','Create')
@section('styles')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">{{__('cms.Create-User')}}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <section id="basic-horizontal-layouts">
            <div class="row match-height">

                <div class="col-md-12 col-12">
                    <div class="card" style="height: 501.406px;">
                        <div class="card-header">
                            <h4 class="card-title">{{__('cms.You will be charged')}}
                                ${{ number_format($plan->price, 2) }} for {{ $plan->name }} {{__('cms.Plan')}}
                            </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form  id="payment-form" action="{{ route('subscription.create') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="plan" id="plan" value="{{ $plan->id }}">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-sm-8 col-12">
                                                <div class="form-group">
                                                    <label for="name">{{__('cms.Name')}}</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text" id="card-holder-name" class="form-control" placeholder="{{__('cms.EnterUserName')}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-4">
                                                <div class="form-group">
                                                    <label for="">{{__('cms.Card details')}}</label>
                                                    <div id="card-element"></div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12">
                                                <hr>
                                                <button type="submit" class="btn btn-primary" id="card-button" data-secret="{{ $intent->client_secret }}">Purchase</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        @endsection
                        @section('scripts')
                        <script src="https://js.stripe.com/v3/"></script>
                        <script>
                            const stripe = Stripe('{{ env('STRIPE_KEY') }}')

                            const elements = stripe.elements()
                            const cardElement = elements.create('card')

                            cardElement.mount('#card-element')

                            const form = document.getElementById('payment-form')
                            const cardBtn = document.getElementById('card-button')
                            const cardHolderName = document.getElementById('card-holder-name')

                            form.addEventListener('submit', async (e) => {
                                e.preventDefault()

                                cardBtn.disabled = true
                                const {
                                    setupIntent,
                                    error
                                } = await stripe.confirmCardSetup(
                                    cardBtn.dataset.secret, {
                                        payment_method: {
                                            card: cardElement,
                                            billing_details: {
                                                name: cardHolderName.value
                                            }
                                        }
                                    }
                                )

                                if (error) {
                                    cardBtn.disable = false
                                } else {
                                    let token = document.createElement('input')
                                    token.setAttribute('type', 'hidden')
                                    token.setAttribute('name', 'token')
                                    token.setAttribute('value', setupIntent.payment_method)
                                    form.appendChild(token)
                                    form.submit();
                                }
                            })
                        </script>
                        @endsection