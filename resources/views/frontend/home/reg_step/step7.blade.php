<?php
$educationLevel = \App\Models\EducationLevel::all();

$schoolLevels = $school->levels->pluck('id')->toArray();

?>

<fieldset>
    <form method="post" action="{{route("reg.step-six")}}">
        @csrf
        <div class="form-card">
            <div class="row">
                <div class="col-7">
                    <h2 class="fs-title">School Level</h2>
                </div>
                <div class="col-5">
                    <h2 class="steps">Step 6 - 12</h2>
                </div>
            </div>
            <div class="reg-form">
                <div class='res-step-3 row'>

                    @foreach($educationLevel as $level)

                        <div class="col-sm-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="levels[]"
                                       value="{{$level->id}}"
                                       @if(in_array($level->id, $schoolLevels))
                                           checked="checked"
                                    @endif
                                >
                                <label class="form-check-label"
                                       for="inlineCheckbox1">&nbsp;&nbsp;{{$level->name}}</label>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <button name="next" type="submit" class="btn btn-primary next action-button reg-nxt-btn">Next</button>
        <a href="{{route('authenticate.createSchoolAccount', ['step' => 6])}}" name="previous" type="button" class="btn btn-secondary previous action-button-previous reg-bck-btn"
                style=" float: left;">Previous
        </a>
    </form>
</fieldset>
