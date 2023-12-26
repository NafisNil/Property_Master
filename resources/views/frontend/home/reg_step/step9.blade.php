<fieldset>
    <form method="post" action="{{route("reg.step-eight")}}">
        @csrf
        <div class="form-card">
            <div class="row">
                <div class="col-7">
                    <h2 class="fs-title">Service Contract </h2>
                </div>
                <div class="col-5">
                    <h2 class="steps">Step 9 - 12</h2>
                </div>
            </div>
            <div class="reg-form">
                <div class='res-step-5 row'>
                    <div class="col-sm-12">
                        <table class="table table-bordered ">
                            <thead class="thead-light">

                            </thead>
                            <tbody>
                            <tr>
                                <td>Contract</td>
                                <td>No 6788655. Date {{date_format(now(),"M d,Y")}}</td>
                            </tr>
                            <tr>
                                <td>Service Request Start Date</td>
                                <td>{{date_format(now(),"l, M d, Y")}}</td>
                            </tr>
                            <tr>
                                <td>Service Request End Date</td>
                                <td>{{date('l, M d, Y', strtotime('+1 year'))}}</td>
                            </tr>
                            <tr>
                                <td>Duration</td>
                                <td>One Year</td>
                            </tr>
                            <tr>
                                <td>Expiry Date</td>
                                <td>{{date('l, M d, Y', strtotime('+1 year'))}}</td>
                            </tr>
                            <tr>
                                <td>Renew Date</td>
                                <td>{{date('l, M d, Y', strtotime('+1 year'))}}</td>
                            </tr>
                            <tr>
                                <td>Charging Period</td>
                                <td>Monthly / Yearly</td>
                            </tr>
                            <tr>
                                <td>Currency</td>
                                <td>USD</td>
                            </tr>
                            <tr>
                                <td>Amount</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Payment Method</td>
                                <td>Credit Card / Online Banking</td>
                            </tr>
                            <tr>
                                <td>Payment info</td>
                                <td>Please download for 100 an fax it to (888)88..</td>
                            </tr>
                            <tr>
                                <td>Business Term</td>
                                <td>7 days in Advance</td>
                            </tr>
                            <tr>
                                <td>Charging Date</td>
                                <td>Thursday, November 24, 2022</td>
                            </tr>
                            <tr>
                                <td>Late Payment fee</td>
                                <td>2% Monthly</td>
                            </tr>
                            <tr>
                                <td>Cancellation Notice</td>
                                <td>One month in advance</td>
                            </tr>
                            <tr>
                                <td>Cancellation fee</td>
                                <td>US$500</td>
                            </tr>
                            <tr>
                                <td>Re-Connection Services Fee</td>
                                <td>US$150.00</td>
                            </tr>
                            <tr>
                                <td>Re-Connection Services Period</td>
                                <td>Between 2-3 business Days</td>
                            </tr>
                            <tr>
                                <td>NSF Fees</td>
                                <td>US$45.00</td>
                            </tr>
                            <tr>
                                <td>Payments Refundable</td>
                                <td>NO</td>
                            </tr>
                            <tr>
                                <td>Other Contract Clauses</td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                        <!--                    <button class="btn btn-primary btn-lg">Agree</button>
                                            <button class="btn btn btn-danger btn-lg">Decline</button>-->
                    </div>

                </div>
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-between">
            <a href="{{route('authenticate.createSchoolAccount', ['step' => 8])}}" type="button" class="btn btn-secondary">Previous</a>
            <button name="next" type="submit" class="btn btn-primary" style="width: auto">Agree And Continue</button>
        </div>
    </form>
</fieldset>
