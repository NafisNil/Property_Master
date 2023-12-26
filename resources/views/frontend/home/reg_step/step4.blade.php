<fieldset>
    <form method="post" action="{{route("reg.save-payment")}}">
        @csrf
        <div class="form-card">
            <div class="row">
                <div class="col-7">
                    <h2 class="fs-title">Create Account</h2>
                </div>
                <div class="col-5">
                    <h2 class="steps">Step 4 - 14</h2>
                </div>
            </div>
            <div class="reg-form">

                <input type="hidden" name="school_id" value="{{$school->id ?? ''}}"
                />

                <div class='res-step-2 row'>
                    <div class="col-12">
                        <h4 class="reg-form-title">Payment Information</h4>
                    </div>
                    <div class="col-12">
                        <x-form.input
                            name="card_no"
                            label="credit-or-debit-card-no"
                            value="{{$payment->card_no ?? ''}}"
                        />
                    </div>

                    <div class="col-12">
                        <div class="d-flex align-items-center p-2">
                            <label class="radio border d-flex align-items-center p-2">
                                <input type="radio" name="card_type" value="MALE" checked="">
                                <span class="d-flex justify-content-between mx-2">VISA</span>
                            </label>
                            <label class="radio border d-flex align-items-center p-2">
                                <input type="radio" name="card_type" value="master_card">
                                <span class="d-flex justify-content-between mx-2">MASTER CARD</span>
                            </label>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <x-form.input
                            name="expiration"
                            label="expiration"
                            type="date"
                            value="{{$payment->expiration ?? ''}}"
                        />
                    </div>
                    <div class="col-sm-6">
                        <x-form.input
                            name="cvv"
                            label="cvv"
                            value="{{$payment->cvv ?? ''}}"
                        />
                    </div>
                    <div class="col-12">
                        <x-form.input
                            name="card_holder_name"
                            label="card-holder-name"
                            value="{{$payment->card_holder_name ?? ''}}"
                        />
                    </div>
                    <div class="col-12">
                        <x-form.input
                            name="billing_address"
                            label="billing-address"
                            value="{{$payment->billing_address ?? ''}}"
                        />
                    </div>

                    @include('partials.recaptcha')

                </div>
            </div>
        </div>
        <button name="next" type="submit" class="btn btn-primary next action-button reg-nxt-btn">Next</button>
        <a href="{{route('authenticate.createSchoolAccount', ['step' =>3])}}" type="button" class="btn btn-secondary previous action-button-previous reg-bck-btn"
                disabled
                style=" float: left;">Previous
        </a>
    </form>
</fieldset>
