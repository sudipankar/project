@extends('layouts.app')

@section('content')
<div class="container">
  <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <!-- <div class="page-title">
              <div class="title_left">
                <h3>Users List</h3>
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
                    <h2>Add Profession</h2>
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
                    <div class="x_content">
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Profession Name</label>

                        <div class="col-sm-9">
                          <!-- <div class="input-group">
                            <span class="input-group-btn">
                                              <button type="button" class="btn btn-primary">Go!</button>
                                          </span>
                            <input type="text" class="form-control">
                          </div> -->
                          <div class="input-group">
						  <?php $site_url=URL::to('/');?>
						  <?php if(isset($ind_profession)){?>
                            <form id="user_detail_form" class="form-horizontal" method="post" action="{{ route('add_prof') }}">
						  <?php }else{?>
						    <form id="user_detail_form" class="form-horizontal" method="post" action="{{ route('edit_prof') }}">
						  <?php } ?>	
                                @csrf
                                <input type="text" class="form-control" name="prof_name" id="prof_name" value="<?php if(isset($ind_profession)){ echo $ind_profession;}else { echo "";}?>">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary"><?php if(isset($ind_profession)){ echo "Add Profession";}else{ echo "Edit Profession";}?></button>
                                </span>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="x_title">
                    <h2>Professions List</h2>
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
                  </div>
                  <div class="x_content">

                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($professions as $index => $profession)
                          <tr>
                            <td>{{ $profession->cat_name }}</td>
                            <td>
                              <input type="checkbox" class="js-switch" {{ ($profession->status) ? 'checked' : '' }} />
                              <input type="hidden" name="prof_id" id="prof_id" value="{{ $profession->id }}" />
                            </td>
                            <td>
                              <a href="{{ $site_url.'/professions/'.$profession->id }}/edit" class="btn btn-xs btn-default"><i class="fa fa-edit"></i>Edit</a>
                              <a href="{{ $site_url.'/professions/'.$profession->id }}/delete" class="btn btn-xs btn-default"><i class="fa fa-close"></i>Delete</a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
</div>
<script>
  $(document).ready(function() {
    $(document).on("click", "span.switchery-default", function() {
      var pid = $(this).next("#prof_id").val();
      $.ajax({
        url:'/professions/'+ pid +'/changestatus',
        type:'GET',
        // data:'_token = {{ csrf_token() }}',
        success:function(data) {
          alert(JSON.stringify(data));
        },
        error: function(err) {
          alert(JSON.stringify(err));
        }
      });
    });

    //Validate Add Profession form
    $("#user_detail_form").validate({
      // Specify validation rules
      rules: {
        // The key name on the left side is the name attribute
        // of an input field. Validation rules are defined
        // on the right side
        prof_name: "required"
      },
      // Specify validation error messages
      messages: {
        prof_name: "Please enter your firstname"
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function(form) {
        form.submit();
      }
    });
  });
</script>
@endsection
