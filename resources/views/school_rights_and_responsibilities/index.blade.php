@extends('layouts.master')

@section('page_title')
    Rights and Responsibilities {{$school_info->name}}
@endsection

@section('content')
    <div class="mt-bootstrap-tables">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" style="padding: 0!important;">
                    <div class="portlet light bordered" style="padding-top: 15px;">
                        <div class="col-md-12">
                            <h2 class="card-title">Rights and Responsibilities {{$school_info->name}}</h2>
                        </div>
                        <div class="portlet-body col-md-12" style="padding: 30px 15px;">
                            @if(isset($school_info->rights_and_responsibilities) && !empty($school_info->rights_and_responsibilities))
                                <p>{{$school_info->rights_and_responsibilities}}</p>
                            @else
                                <p>School Information not found</p>
                            @endif

                            <p class="text-right"><a href="{{route('SchoolRightsAndResponsibilities.messageEdit', $school_info->id)}}"><button class="btn btn-primary btn-lg">Edit</button></a></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


