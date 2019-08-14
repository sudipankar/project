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
                    <h2>Manage Questionnaires</h2>
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
                    <form id="add_ques_form" method="post" action="{{ route('add_question') }}" data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                    @if($option_id)
                      <input type="hidden" name="option_id" value="{{ $option_id }}" />
                    @endif
                    <input type="hidden" name="cat_id" value="{{ $professions[0]->id }}" />
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <!--<div class="form-group">-->
                        <!--  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category">Select Category </label>-->
                        <!--  <div class="col-md-6 col-sm-6 col-xs-12">-->
                        <!--    <select name="category" id="select_category">-->
                        <!--      @foreach ($professions as $index => $profession)-->
                        <!--        <option value="{{ $profession->id }}">{{ $profession->cat_name }}</option>-->
                        <!--      @endforeach-->
                        <!--    </select>-->
                        <!--  </div>-->
                        <!--</div>-->
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Add Question</h2>
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
                            <br />

                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Question Title <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="ques_title" name="ques_title" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Question Description
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <textarea id="ques_desc" name="ques_desc" class="form-control" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10"></textarea>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Question Type</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <div id="ebook_type" class="btn-group">
                                    <label class="btn btn-primary">
                                      <input type="radio" class="question_type" checked name="question_type" value="1"> &nbsp; Regular Question &nbsp;
                                    </label>
                                    <label class="btn">
                                      <input type="radio" class="question_type" name="question_type" value="2"> Splitting Question
                                    </label>
                                  </div>
                                </div>
                              </div>
                              <div class="clearfix"></div>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Option 1 <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="option1" name="option1" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Option 2 <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="option2" name="option2" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Option 3 </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="option3" name="option3" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Option 4 </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="option4" name="option4" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                              <div class="ln_solid"></div>
                              <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                  <a class="btn btn-primary" href="{{ route('questionnaires') }}">Back</a>
                                  <button class="btn btn-primary" type="button">Clear</button>
                                  <button type="submit" class="btn btn-success">Add Question</button>
                                </div>
                              </div>
                          </div>
                        </div>
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
<script>
  $(document).ready(function() {
    $(".question_type").change(function() {
      $(".question_type").parent().toggleClass("btn-primary");
    });
  });
</script>
@endsection
