@extends('layouts.master')

@push('css')
<link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
Marks Structure
@endsection

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('marksStructure.index') }}">Marks Structure</a></li>
        <li class="breadcrumb-item active" aria-current="page">Marks Structure</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="text-right">
                    <a href="{{ route('marksStructure.create') }}">
                        <button type="button" class="btn btn-primary mb-2 text-right">Add Marks Structure</button>
                    </a>
                </div>
                <h6 class="card-title">Marks Structure Table</h6>
                <div class="table-responsive">


                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Assesment Type</th>
                                <th class="text-center">Course</th>
                                <th class="text-center">School</th>
                                <th class="text-center">Grade</th>
                                <th class="text-center">Percent</th>
                                <th class="text-center">Passing Marks</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($marksStructure) && !empty($marksStructure)) 

                            <?php $i = 1; ?>
                            @foreach($marksStructure as $key => $row)

                            <tr>
                                <?php
                                if ($row->assesment_type):
                                    $assesment_type = \App\Models\AssesmentType::where('id', $row->assesment_type)->first();
                                    ?>
                                    <td class="text-left">{{$assesment_type->name}}</td>
                                    <?php
                                else:
                                    ?>
                                    <td class="text-left"></td>
                                <?php
                                endif;
                                ?>
                                
                                <?php
                                if ($row->course):
                                    $course = App\Models\CourseOutlines::where('id', $row->course)->first();
                                    ?>
                                    <td class="text-left">{{$course->name}}</td>
                                    <?php
                                else:
                                    ?>
                                    <td class="text-left"></td>
                                <?php
                                endif;
                                ?>
                                    <td class="text-left">{{$school_info->name}}</td>
                                <td class="text-center">{{$row->grade}}</td>
                                <td class="text-center">{{$row->percent}}</td>
                                <td class="text-center">{{$row->passing_marks}}</td>
                                <td style=" text-align: center;"><a href="{{route('marksStructure.edit', $row->id)}}" class="btn btn-primary">Edit</a><a href="{{route('marksStructure.destroy', $row->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to Remove?');">Delete</a></td>

                            </tr>
                            <?php $i++; ?>
                            @endforeach
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
{!! Toastr::message() !!}
<script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('js/datatable_custom.js') }}"></script>
@endpush
