@extends('layouts.app')

@section('content')
<div class="container">
<?php echo $site_url=URL::to('/');?>
  <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <!-- <div class="page-title">
              <div class="title_left">
                <h3>Form Elements</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div> -->
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Profile</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                    @if(session('success'))
                        <div class="alert alert-success alert-block">
                        	<button type="button" class="close" data-dismiss="alert">×</button>	
                            <strong>Success </strong> {{ session('success') }}
                        </div>
                    @endif
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="user_detail_form" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{ $site_url.'/users/'. $user->id .'/update' }}">
                      @csrf
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="name" required="required" class="form-control col-md-12 col-xs-12" value="{{ $user->name }}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="email" name="email" required="required" class="form-control col-md-12 col-xs-12" value="{{ $user->email }}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="address1" class="control-label col-md-3 col-sm-3 col-xs-12">Address Line #1</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="address1" class="form-control col-md-12 col-xs-12" type="text" name="address1" value="{{ $user->address1 }}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="address2" class="control-label col-md-3 col-sm-3 col-xs-12">Address Line #2</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="address2" class="form-control col-md-12 col-xs-12" type="text" name="address2" value="{{ $user->address2 }}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="city" class="control-label col-md-3 col-sm-3 col-xs-12">City</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="city" class="form-control col-md-12 col-xs-12" type="text" name="city" value="{{ $user->city }}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="state" class="control-label col-md-3 col-sm-3 col-xs-12">State</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="state" class="form-control col-md-12 col-xs-12" type="text" name="state" value="{{ $user->state }}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="country" class="control-label col-md-3 col-sm-3 col-xs-12">Country</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="country" class="form-control col-md-12 col-xs-12" name="country">
                            <option value="0">-- Select --</option>
                            @foreach($countries as $index => $country)
                              <option value="{{ $country->id }}" {{ ($country->id==$user->country_id) ? 'Selected' : '' }}>{{ $country->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="gender" value="male"> &nbsp; Male &nbsp;
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="gender" value="female"> Female
                            </label>
                          </div>
                        </div>
                      </div>
                      <!-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                        </div>
                      </div> -->
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Back</button>
                    <!-- <button class="btn btn-primary" type="reset">Reset</button> -->
                          <input type="submit" class="btn btn-success" value="Update" />
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
</div>
@endsection
