<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Questionaire;
use App\QuestionnaireOption;

class QuestionnaireController extends Controller
{
    //Get all auestionnaires
    public function getQuestionnaires(Request $request)
    {
      //Professions list
      $professions = DB::table('professions')->get();
      return view('auth.questionnaires', ['professions' => $professions]);
    }

    public function getQuestions(Request $request, $cid)
    {
      //Questions list
      // $questionnaires = Questionaire::where('profession_id', $cid);
      $questionnaires = array();
    //   $questions = DB::table('questionaires')->where('profession_id', $cid)->get();
      $questions = DB::table('questionaires')->get();
      foreach ($questions as $index => $question) {
        if ($question->option_id) {
          $question->parent_option = DB::table('questionnaire_options')->where('id', $question->option_id)->first();
          $question->parent_question = DB::table('questionaires')->where('id', $question->parent_option->question_id)->first();
        }
        $question->options = DB::table('questionnaire_options')->where('question_id', $question->id)->get();

        $questionnaires[] = $question;
      }
      return response()->json($questionnaires, 200);
    }

    public function addQuestionForm(Request $request, $option_id = null)
    {
      //Professions list
      $professions = DB::table('professions')->get();
      return view('auth.add_question', ['professions' => $professions, 'option_id' => $option_id]);
    }

    //Add new question
    public function addQuestion(Request $request)
    {
      $cat_id = $request->input('cat_id');
      $ques_title = $request->input('ques_title');
      $ques_desc = ($request->input('ques_desc')) ? $request->input('ques_desc') : ' ';
      $ques_type = $request->input('question_type');
      $option_id = $request->input('option_id');
      $options[0] = $request->input('option1');
      $options[1] = $request->input('option2');
      $options[2] = $request->input('option3');
      $options[3] = $request->input('option4');

      $data = ['profession_id'=> $cat_id,'question_title'=> $ques_title,'question_desc'=> $ques_desc,'ques_type'=> $ques_type,'status'=> true, 'option_id' => $option_id];
      //Insert question detail
      $insert_ques = DB::table('questionaires')->insert($data);
      $ques_id = DB::getPdo()->lastInsertId();
      if ($insert_ques) {
        foreach ($options as $key => $option) {
          if ($option != "") {
            $insert_options = DB::table('questionnaire_options')->insert(['question_id'=> $ques_id,'option_text'=> $option]);
          }
        }
      }
      if ($option_id) {
        $option = QuestionnaireOption::where('id', $option_id)->first();
        $option->is_split = true;
        $option->save();
      }
      return redirect()->route('questionnaires');
    }

    //Delete question
    public function deleteQuestion(Request $request, $ques_id)
    {
      //Delete question detail
      $deleted = Questionaire::where('id', $ques_id)->delete();
      $deleted = QuestionnaireOption::where('question_id', $ques_id)->delete();
      return redirect()->route('questionnaires');
    }
}
