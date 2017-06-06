@extends('layouts.landlord')

@section('content')

    <div class="container">
        <div class="row centered-form">
            <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please add tenant for house </h3>
                    </div>
                    <div class="panel-body">
                        <form  action="{{route('landlord.tenants.store',$house->id)}}" method="post" role="form">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control input-sm" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="phone" id="phone" class="form-control input-sm" placeholder="Phone">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
                            </div>

                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input   type="hidden" name="role_id" value="3" class="form-control input-sm" placeholder="Role">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="password"  class="form-control input-sm" placeholder="Password">
                                    </div>
                                </div>
                            </div>

                            <input type="submit" value="Add" class="btn btn-info btn-block">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection