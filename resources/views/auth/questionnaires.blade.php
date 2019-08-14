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
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category">Select Category </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="category" id="select_category">
                            @foreach ($professions as $index => $profession)
                              <option value="{{ $profession->id }}">{{ $profession->cat_name }}</option>
                            @endforeach
                          </select>
                          <a class="btn btn-primary" href="{{ route('add_question_form') }}">Add Question</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2><i class="fa fa-align-left"></i>Questions List<small></small></h2>
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

                          <!-- start accordion -->
                          <div class="accordion ques_list" id="accordion" role="tablist" aria-multiselectable="true">

                          </div>
                          <!-- end of accordion -->
                        </div>
                      </div>
                    </div>
                  </div>
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
    populateQuestions();
    $(".question_type").change(function() {
      $(".question_type").parent().toggleClass("btn-primary");
    });
    $('#select_category').change(function() {
      populateQuestions();
    });
    function populateQuestions() {
      var cat_id = $('#select_category').val();
      $.ajax({
        url:'/questionnaires/'+ cat_id +'/get_ques',
        type:'GET',
        // data:'_token = {{ csrf_token() }}',
        success:function(data) {
          $('div.list_item').remove();
          if (data) {
            $.each(data, function(index, val) {
              var mydata = $.parseJSON(JSON.stringify(val));
              var options_html = '';
              $.each(mydata.options, function(ind, value) {
                options_html += '<li>'+ value.option_text;
                if (val.ques_type == 2) {
                  if (value.is_split) {
                    options_html += ' <a class="btn btn-default" href="/questionnaires/add_question_form/'+ value.id +'">Edit Split Question</a>';
                  } else {
                    options_html += ' <a class="btn btn-default" href="/questionnaires/add_question_form/'+ value.id +'">Add Split Question</a>';
                  }
                }
                options_html += '</li>';
              });
              var ques_data = '<div class="panel list_item">\
                                <a href="/questionnaires/'+ val.id +'/delete" name="delete_question"><i class="fa fa-close"></i></a>';
              if (val.parent_question) {
                ques_data += '<p>Parent Question: '+ val.parent_question.question_title +'</p>';
              }
              if (val.parent_option) {
                ques_data += '<p>Parent Question: '+ val.parent_option.option_text +'</p>';
              }
              ques_data +=  '<a class="panel-heading" role="tab" id="heading'+ val.id +'" data-toggle="collapse" data-parent="#accordion" href="#collapse'+ val.id +'" aria-expanded="true" aria-controls="collapse'+ val.id +'">\
                              <h4 class="panel-title">'+ mydata.question_title +'</h4>\
                            </a>\
                            <div id="collapse'+ val.id +'" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading'+ val.id +'">\
                              <div class="panel-body">\
                                <p>'+ mydata.question_desc +'</p>\
                                <ul>'+ options_html +'</ul>\
                              </div>\
                            </div>\
                          </div>';
              $('.ques_list').append(ques_data);
            });
          } else {
            var no_rows = '<p>No Question Added</p>';
            $('.ques_list').append(no_rows);
          }
        },
        error: function(err) {
          alert(JSON.stringify(err));
        }
      });
    }
  });
</script>
@endsection
