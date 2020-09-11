
@extends('layouts.app')

@section('content')

    <div class="container mt-5">
    @if(count($issues) > 0)

            <table class="table table-bordered mb-5">
                <thead>
                    <tr class="table-success">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th id="create" scope="col">Created At</th>
                        <th id="due" scope="col">Due Date</th>
                        <th scope="col">Title</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Content</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($issues as $issue)
                    <tr>
                        <th scope="row"></th>
                        <td><a href="{{ URL::route('issues', [$issue->customer_id]) }}">{{ $issue->customer->name }} </a></td>
                        <td>{{ $issue->created_at }}</td>
                        <td>{{ $issue->due_date }}</td>
                        <td>{{ $issue->title }}</td>
                        <td>{{ $issue->subject }}</td>
                        <td>{{ $issue->content }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
