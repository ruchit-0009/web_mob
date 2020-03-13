@extends('layouts.app')
@section('script')
<script src="/js/blog.js"></script>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span>Blog List</span>
                    <a href="/blog/create" class="text-right btn btn-primary pull-right" >Add</a>
                </div>
                <!--<img src="component(2).png">-->
                
                <div class="card-body" >
                    <div class="form-group">
                        <!--{{ Form::label('title', 'Title', ['class' => 'col-lg-2 control-label']) }}-->
                        <label class=" col-lg-2 control-label">Date</label>
                        <div class="col-lg-3">

                            <input type="text" id="date" class="form-control" readonly="">
                        </div>
                    </div>
                    <table  class="table table-bordered" style="margin-top: 50px">
                        <thead class="thead-dark">
                            <tr>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Date</th>
                            </tr>
                        </thead> 
                        <tbody id="blogTbody">

                            @foreach($blog as $row)
                            <tr >
                                <td >{{ $row['catName'] }}</td>
                                <td >{{ $row['title'] }}</td>
                                <td >{{ $row['description'] }}</td>
                                <td >{{ $row['created_at'] }}</td>

                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addEmployeModel" tabindex="-1" role="dialog" aria-labelledby="addCompanyModel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="alert alert-danger" style="display:none"></div>

            {{ Form::open(['route' => 'blog.store', 'class' => 'form-horizontal','id'=>'addEmployeeFrm', 'method' => 'post']) }}

            <div class="modal-body">

                <div class="form-group">

                    {{ Form::label('name', 'Full Name') }}

                    {{ Form::text('fullName', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter Name']) }}
                </div>

                <div class="form-group">

                    {{ Form::label('emailAddress', 'Email Address') }}
                    {{ Form::email('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter Email']) }}

                </div>

                <div class="form-group">

                    {{ Form::label('phone', 'Phone Number') }}
                    {{ Form::number('phone', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter Phone Number']) }}

                </div>

            </div>
            <div class="modal-footer">
                {{ Form::button('Close', ['class' => 'btn btn-secondary ','data-dismiss'=>'modal']) }}
                {{ Form::submit('Add', ['class' => 'btn btn-primary ','id'=>'addEmployeeBtn']) }}

            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>


@endsection