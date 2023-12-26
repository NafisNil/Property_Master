@extends('layouts.master')


@section('content')
    <x-content>
        <x-slot name="header">
            <h4>Invoice Tuition Setting</h4>
        </x-slot>

        <div>
            <x-form action="{{route('generate-tuition-invoice')}}">
                <button type="submit">Generate Auto Invoice</button>
            </x-form>

        </div>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Date</th>
                <th>Due Date</th>
                <th>Program</th>
                <th>Grade Year</th>
                <th>Late Fee</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($invoiceSettings as $inv)
                <tr>
                    <td>{{$inv->date ?? ''}}</td>
                    <td>{{$inv->due_date ?? ''}}</td>
                    <td>{{$inv->program->program_name ?? ''}}</td>
                    <td>{{$inv->gradeYear->program_name ?? ''}}</td>
                    <td>{{$inv->late_fee ?? 0}}</td>
                    <td>
                        @if($inv->status)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-warning">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <button
                            class="btn btn-info view-item"
                            data-href="{{route('tuition-invoice-settings.show', $inv->id)}}">View
                        </button>
                        <a
                            href="{{route('tuition-invoice-settings.edit', $inv->id)}}"
                            class="btn btn-primary">Edit</a><a
                            href="{{route('tuition-invoice-settings.destroy', $inv->id)}}"
                            class="btn btn-danger"
                            onclick="return confirm('Are you sure you want to Remove?');">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </x-content>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $('#has_late_fee').on('change', function () {
                let value = this.value;
                if (value && parseInt(value) === 1) {
                    $('#late_fee_container').removeClass('d-none');
                } else {
                    $('#late_fee_container').addClass('d-none');
                }
            })

            $(document).on('click', '#has_cumulative_late_fee', function () {
                let value = this.value;

                if (value && parseInt(value) === 1) {
                    $('.cumulative-late-fee').removeClass('d-none');
                } else {
                    $('.cumulative-late-fee').addClass('d-none');
                }
            })

        })
    </script>
@endpush
