@extends('layouts.master')

@section('page_title')
    Schedule 
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
        <h3>Schedule</h3>

    </x-slot>
</x-content>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div id="htmlContent">
            <img src="{{ asset('frontend/assets/img/about.jpg') }}" alt="" style="height: 50px;width:50px">
            <h2 style=”color: #0094ff”>{{ $scheduleop->stype->name }}</h2>
            <h3>{{ $scheduleop->amount }} Tk</h3>
            <p>{!! $scheduleop->description !!}</p>
            <br>
            <p>Recurring Cycle : <b>{{ $scheduleop->recurring_cycle->name }}</b></p>
            <h6>Property : <b>{{ $scheduleop->property_id }}</b></h6>
            <h5>Start Date : <b>{{ $scheduleop->start_date }}</b></h5> - <h5>End Date : <b>{{ $scheduleop->end_date }}</b></h5>
            <h6>Next One : <b>{{ $scheduleop->next_one }}</b></h6>
            <h6>Instruction : <b>{!! $scheduleop->instruction !!}</b></h6><br>
            <h6>Contact Person : <b>{{ $scheduleop->contact_person }}</b></h6>
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


