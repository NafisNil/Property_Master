@extends('layouts.master')

@section('page_title')
    Todo List 
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
        <h3>Todo List</h3>
        <a href="{{ route('todo.create') }}">
            <button type="button" class="btn btn-primary mb-2 text-right">
                <i class="fa fa-plus mr-2"></i>
                Add Todo List
            </button>
        </a>
    </x-slot>
</x-content>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div id="htmlContent">
           
            <h2 style=”color: #0094ff”>{{ $todo->subject }}</h2>
            <h3>{{ $todo->posted_by }}</h3>
            <p>{!! $todo->description !!}</p>
            <p>{!! $todo->objectives !!}</p>
            <br>
            <p>Priority : <b>{{ $todo->priority }}</b></p>
            <hr>
            <h4>Contact Person</h4>
            <h6>Name : <b>{{ $todo->ch_name }}</b></h6>
            <h6>Office : <b>{{ $todo->ch_office }}</b></h6>
            <h6>Cellphone : <b>{{ $todo->ch_cellphone }}</b></h6>
            <h6>Email : <b>{{ $todo->ch_email }}</b></h6>
            <hr>
            <h5>Deadline : <b>{{ $todo->deadline }}</b></h5>
            <h6>Location : </h6> : <p>{!! $todo->location !!}</p>

            <h6>Instruction : </h6> : <p>{!! $todo->instruction !!}</p>
           <hr>
           <h4>First Remainder </h4>
           <h5>Date : <b>{{ $todo->room_date_one }}</b></h5>
           <h6>Time : </h6> : <p>{!! $todo->room_time_one !!}</p>
           <hr>

           <hr>
           <h4>Second Remainder </h4>
           <h5>Date : <b>{{ $todo->room_date_two }}</b></h5>
           <h6>Time : </h6> : <p>{!! $todo->room_time_two !!}</p>
           <hr>

           <hr>
           <h4>Third Remainder </h4>
           <h5>Date : <b>{{ $todo->room_date_three }}</b></h5>
           <h6>Time : </h6> : <p>{!! $todo->room_time_three !!}</p>
           <hr>
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


