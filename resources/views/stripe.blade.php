<link rel="stylesheet" href="{{ asset('/css/style.css') }}" />
<script src="https://js.stripe.com/v3/"></script>
<div class="container">
    @if (Session::has('success'))
    <div class="alert alert-success text-center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
        <p>{{ Session::get('success') }}</p>
    </div>
    @endif
    <div class="row">
        <h3>Payment send</h3>
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif
        <form method="POST" id="payment-form" action="{{url('checkoutstripe')}}">
            <div class="form-row">
                <input type="hidden" name="user_id" vlaue="{{ Auth::user()->id}}">
                <p> Total Amount:- <input type="text" name="price" placeholder="Enter Amount"
                        value="{{ Cart::getTotal() }}" /></p>
                <p>User Email:- <input type="email" name="email" placeholder="Enter Email"
                        value="{{ Auth::user()->email}}" /></p>
                <label for="card-element">
                    Credit or debit card
                </label><br><br>
                <div id="card-element">
                    <div id="card_number">
                        <input type="text" name="card_number">
                    </div>
                    <div id="card_expiry"> <input type="text" name="card_expiry"></div>
                    <div id="card_cvv"></div>
                </div>
                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
            </div>
            <input type="hidden" name="token-account" id="token-account">
            <input type="hidden" name="stripeToken" id="stripeToken">
            <p><button type="submit" id="card-button">Submit Payment</button></p>

            {{ csrf_field() }}
        </form>

        <script src="https://js.stripe.com/v1/payment_intents/"></script>
        <script src="{{ asset('/js/card.js') }}"></script>
    </div>
</div>