<?php
$user = auth()->user();
$school = $user->school;

?>

<fieldset>
    <form method="post" action="{{route("reg.step-twelve")}}">
        @csrf
        <div class="form-card">
            <div class="row">
                <div class="col-7">
                    <h2 class="fs-title">Activation Status</h2>
                </div>
                <div class="col-5">
                    <h2 class="steps">Step 12 - 12</h2>
                </div>
            </div>
            <div class="reg-form">
                <div class='res-step-6 row'>
                    <div class="col-sm-12">

                        <h4>Account is {{$school->status ? 'Active' : "Not Active"}}</h4>

                    </div>

                </div>
            </div>
        </div>

        <button name="next" type="submit" class="btn btn-primary next action-button reg-nxt-btn"
                @if(!$school->status) disabled="disabled" @endif>Finish
        </button>
        <a href="{{route('authenticate.createSchoolAccount', ['step' => 11])}}" name="previous" type="button" class="btn btn-secondary previous action-button-previous reg-bck-btn"
                style=" float: left;">Previous
        </a>
    </form>
</fieldset>
