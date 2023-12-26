<fieldset>
    <x-form action="{{route('reg.step-eleven')}}" files="true">
        <div class="form-card">
            <div class="row">
                <div class="col-7">
                    <h2 class="fs-title"> Upload Documents </h2>
                </div>
                <div class="col-5">
                    <h2 class="steps">Step 11 - 12</h2>
                </div>
            </div>
            <div class="reg-form">
                <div class='res-step-5 row'>
                    <div class="col-sm-12">
                    </div>

                    <div class="col-12">

                        <x-form.input
                            type="file"
                            name="files[]"
                            label="Upload Documents"
                            accept="image/*, application/pdf"
                            multiple
                        />

                    </div>

                </div>
            </div>
        </div>
        <button name="next" type="submit" class="btn btn-primary next action-button reg-nxt-btn">Next</button>
        <a href="{{route('authenticate.createSchoolAccount', ['step' => 10])}}" name="previous" type="button" class="btn btn-secondary previous action-button-previous reg-bck-btn"
                style=" float: left;">Previous
        </a>
    </x-form>
</fieldset>
