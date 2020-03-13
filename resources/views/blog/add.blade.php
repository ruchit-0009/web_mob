@extends('layouts.app')
@section('script')
<script src="/js/blog.js"></script>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="well">
                @if($errors->any())
                <div class="alert alert-danger">
                    <p><strong>Opps Something went wrong</strong></p>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                {{ Form::open(['route' => 'blog.store', 'class' => 'form-horizontal', 'method' => 'post']) }}

                <fieldset>

                    <legend>Add Blog</legend>

                    <div class="form-group">
                        {{ Form::label('category', 'Category', ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::select('category', $category,'', ['class' => 'form-control chosen ','id'=>'catList','name'=>'category[]', 'multiple'=>'multiple']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('title', 'Title', ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('title', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter Title']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('description', 'Description', ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                            {{ Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required','rows' => 3, 'placeholder' => 'Enter Description']) }}

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-9">
                            {{ Form::submit('Add Blog', ['class' => 'btn btn-primary ']) }}
                            <a class ='btn btn-secondary ' href="{{ route('blog.index') }}">Close</a>
                        </div>
                    </div>

                </fieldset>

                {{ Form::close() }}

            </div>
        </div>
    </div>
</div>



@endsection