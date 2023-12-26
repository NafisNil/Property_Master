<fieldset>
    <form method="post" action="{{route('reg.step-nine')}}">
        @csrf
        <div class="form-card">
            <div class="row">
                <div class="col-7">
                    <h2 class="fs-title">Users Agreement</h2>
                </div>
                <div class="col-5">
                    <h2 class="steps">Step 10 - 12</h2>
                </div>
            </div>
            <div class="reg-form">
                <div class='res-step-6 row'>
                    <div class="col-sm-12">
                        <div class="form-group mb-3">
                            <label for="exampleFormControlTextarea1">Users Agreement</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                      style="min-width: 100%"></textarea>
                        </div>

                        <!--                        <button class="btn btn-primary btn-lg">Agree</button>
                                                <button class="btn btn btn-danger btn-lg">Deny</button>-->
                    </div>

                </div>
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-between">
            <a href="{{route('authenticate.createSchoolAccount', ['step' => 9])}}" type="button" class="btn btn-secondary">Previous</a>
            <button name="next" type="submit" class="btn btn-primary" style="width: auto">Agree And Continue</button>
        </div>
    </form>
</fieldset>
