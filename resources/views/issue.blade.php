@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Submit Issue') }}</div>

                <div class="card-body">              

                        {!! Form::open(['url' => 'issue/submit']) !!}
                        <div class="form-group">
                            {{Form::label('name', 'Name')}}
                            {{Form::text('name', '', ['class' => 'form-control'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('email', 'E-Mail')}}
                            {{Form::text('email', '', ['class' => 'form-control'])}}            
                        </div>
                        <div class="form-group">
                            {{Form::label('title', 'Title')}}
                            {{Form::text('title', '', ['class' => 'form-control'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('subject', 'Subject')}}
                            {{Form::text('subject', '', ['class' => 'form-control'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('content', 'Content')}}
                            {{Form::textarea('content', '', ['class' => 'form-control'])}}
                        </div>
                        <div class="form-group">
                            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                        </div>
        
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection