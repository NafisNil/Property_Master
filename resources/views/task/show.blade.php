@extends('layouts.master')

@section('page_title')
    Task 
@endsection

@section('content')
<style>
    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 50%;
    margin: 0px auto;
    }
    #htmlContent{
    text-align: center;
    }
    td, th, button {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }
    button {
    border: 1px solid black;
    }
    tr:nth-child(even) {
    background-color: #dddddd;
    }
    </style>
    
<x-content>
    <x-slot name="header">
        <h3>Task</h3>
        <a href="{{ route('announcement.create') }}">
            <button type="button" class="btn btn-primary mb-2 text-right">
                <i class="fa fa-plus mr-2"></i>
                Add Task
            </button>
        </a>
    </x-slot>
</x-content>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div id="htmlContent">
            <img src="{{ asset('frontend/assets/img/about.jpg') }}" alt="" style="height: 50px;width:50px">
            <h2 style=”color: #0094ff”>{{ $task->subject }}</h2>
            <h3>{{ $task->posted_by }}</h3>
            <p>{!! $task->details !!}</p>
            <br>
            <p>Priority : <b>{{ $task->priority }}</b></p>
            <h6>Action : <b>{{ $task->required_action }}</b></h6>
            <h5>Receivers : <b>{{ $task->receivers }}</b></h5>
            <h6>Acknowledge By : <b>{{ $task->acknowledge }}</b></h6>
            <h6>Due Date : <b>{{ $task->due_date }}</b></h6>
            </div>
           
            <center>
         <br>
                <button onclick="generatePDF()" class="btn btn-sm btn-outline-secondary">Generate PDF</button>
                 
          
            </center>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

    <script>
     

        function generatePDF() {
            // Get the content element
            var content = document.getElementById('htmlContent');

            // Options for pdf generation
            var options = { margin: 10, filename: 'generated.pdf', image: { type: 'jpeg', quality: 0.98 }, html2canvas: { scale: 2 }, jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' } };

            // Use html2pdf library to generate PDF
            html2pdf(content, options);
        }
        
       
   </script>
</div>
@push('js')

    <script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>


    <script src="{{ asset('js/datatable_custom.js') }}"></script>

   

@endpush
@endsection


