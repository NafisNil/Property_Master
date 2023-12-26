@extends('layouts.master')

@push('css')

@endpush

@section('content')

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('notes.index') }}">{{__('notes')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('notes')}}</li>
        </ol>
    </nav>

    <x-content>
        <x-slot name="header">
            <h4>{{__('notes')}}</h4>
            <a href="{{route('notes.create')}}" class="btn btn-primary">Create</a>
        </x-slot>

        <div class="row">

            @foreach($notes as $note)
                <div class="col-sm-4 my-2 card-item">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div>
                                <div class="card-title">
                                    {{ $note->title }}
                                </div>
                                <div>
                                    Date: {{$note->date}}
                                </div>
                            </div>
                            <div>
                                <div class="dropdown">
                                    <button class="btn btn-secondary btn-sm btn-icon dropdown-toggle" type="button"
                                            data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-chevron-down"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('notes.edit', $note->id)}}">Edit</a>
                                        <a class="dropdown-item delete-note-btn" href="javascript:void(0)"
                                           data-href="{{route('notes.destroy', $note->id)}}">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            {{$note->content}}
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <div>
            {!! $notes->links() !!}
        </div>
    </x-content>
@endsection

@push('js')

    <script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
    {!! Toastr::message() !!}
    <script>
        $(document).on('click', '.delete-note-btn', function (event) {

            let url = $(this).data('href');

            let el = $(this).closest('.card-item');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#4e90bd',
                confirmButtonText: 'Yes, delete it!'
            }).then(({isConfirmed}) => {

                if (isConfirmed) {

                    $.ajax({
                        url: url,
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (data) {

                            let {status, message} = data;

                            if (status === 'success') {
                                el.remove();
                                toastr.success(message);
                            } else {
                                toastr.danger(message);
                            }
                        }
                    })
                }
            })
        });
    </script>
@endpush
