<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use Mail;

class DashboardController extends Controller
{
    //Get home view
    public function index(Request $request)
    {
      //Home
      $countries = DB::table('countries')->get();
      $professions = DB::table('professions')->get();
      return view('welcome', ['countries' => $countries, 'professions' => $professions]);
    }

    //Get dashboard view
    public function dashboard(Request $request)
    {
      //Dashboard
      // $users = DB::table('users')->get();
    //   return view('dashboard');
      return redirect()->route('user_profile');
    }

    //Show user profile with details
    public function userProfile(Request $request)
    {
      //User Profile page
      $user = DB::table('users')->where('id', Auth::user()->id)->first();
      $countries = DB::table('countries')->get();
      return view('myprofile', ['user' => $user, 'countries' => $countries]);
    }

    //Update User profile detail
    public function updateProfile(Request $request)
    {
      //User Profile page
      $name = $request->input('fullname');
      $address1 = $request->input('address1');
      $address2 = $request->input('address2');
      $city = $request->input('city');
      $state = $request->input('state');
      $country = $request->input('country');
      $user = DB::table('users')->where('id', Auth::user()->id)->update(['name' => $name, 'address1' => $address1, 'address2' => $address2, 'city' => $city, 'state' => $state, 'country_id' => $country]);
      return redirect()->route('user_profile')->withSuccess('Profile Updated Successfully!');
    }

    //Upload user image
    public function uploadUserImage(Request $request)
    {
      //User Profile page
      $this->validate($request, [
              'user_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
              // 'user_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

      if ($request->hasFile('user_image')) {
          $image = $request->file('user_image');
          $name = time().'.'.$image->getClientOriginalExtension();
          $destinationPath = public_path('/images/user_images');
          $image->move($destinationPath, $name);

          $image_uploaded = DB::table('users')->where('id', Auth::user()->id)->update(['image' => $name]);
          return back()->withSuccess('Image Upload successfully!');
      }
      return redirect()->route('user_profile')->withError('Could not upload image!');
    }

    //Login authentication
    public function login(Request $request)
    {
      $name = $request->input('email');
      $password = $request->input('password');
      if (Auth::attempt(['email' => $name, 'password' => $password]) ) {
        return redirect()->route('dashboard')->withSuccess('Logged in successfully!');
      } else {
        return redirect()->route('welcome')->withError('Could not find user with credentials provided!');
      }
    }

    //Login authentication
    public function register(Request $request)
    {
      //Register new user
     echo $name = $request->input('name');
      $email = $request->input('email');
      $password = $request->input('password');
      $confirm_password = $request->input('confirm_password');
      $address1 = $request->input('address1');
      $address2 = $request->input('address2');
      $city = $request->input('city');
      $state = $request->input('state');
      $country = $request->input('country');
	  //die;
      
      $email_check = DB::table('users')->where('email', $email)->first();
      if($email_check)
        return redirect()->route('welcome')->withError('Email already exist!');

      $user = User::create([
                            'name' => $name,
                            'email' => $email,
                            'password' => Hash::make($password),
                          ]);

      $user
         ->roles()
         ->attach(Role::where('name', 'user')->first());
     $updated = User::where('id', $user->id)->update([
                                'address1' => $address1,
                                'address2' => $address2,
                                'city' => $city,
                                'state' => $state,
                                'country_id' => $country,
                              ]);
      $content = "Hello ". $name ." \r\n You are registered seccessfully! \r\n You can login with your credentials you enetered while registering.";
      //Send mail to new user
    //   Mail::send(['text' => 'view'], $data, $callback);
   /* mail($email, "Welcome to Ebook!", $content);*/
      return redirect()->route('welcome');
    }

    public function getQuestionnaire(Request $request, $cid)
    {
      //Questions list
      // $questionnaires = Questionaire::where('profession_id', $cid);
      $questionnaires = array();
    //   $questions = DB::table('questionaires')->where(['profession_id' => $cid, 'option_id' => null])->get();
      $questions = DB::table('questionaires')->get();
      foreach ($questions as $index => $question) {
        $question->options = DB::table('questionnaire_options')->where('question_id', $question->id)->get();
        for($i = 0; $i < count($question->options); $i++) {
          $option = $question->options[$i];
          if ($option->is_split) {
            $split_ques = DB::table('questionaires')->where(['profession_id' => $cid, 'option_id' => $option->id])->first();
            $split_ques->options = DB::table('questionnaire_options')->where('question_id', $split_ques->id)->get();
            $question->options[$i]->split_ques = $split_ques;
          }
        }
        $questionnaires[] = $question;
      }
      return response()->json($questionnaires, 200);
    }
    
    public function getPaymentHistory(Request $request)
    {
      $user = Auth::user();
      $userid = $user->id;
      $payments = DB::table('payment_details')->where('user_id', $userid)->get();
    //   foreach ($questions as $index => $question) {
    //     $question->options = DB::table('questionnaire_options')->where('question_id', $question->id)->get();
    //     for($i = 0; $i < count($question->options); $i++) {
    //       $option = $question->options[$i];
    //       if ($option->is_split) {
    //         $split_ques = DB::table('questionaires')->where(['profession_id' => $cid, 'option_id' => $option->id])->first();
    //         $split_ques->options = DB::table('questionnaire_options')->where('question_id', $split_ques->id)->get();
    //         $question->options[$i]->split_ques = $split_ques;
    //       }
    //     }
    //     $questionnaires[] = $question;
    //   }
      return view('payment_history', ['payement_details' => $payments]);
    }
    
    public function getSavedEbooks(Request $request)
    {
      $user = Auth::user();
      $userid = $user->id;
      $ebook_ids = [1,3];
      $ebooks = DB::table('ebooks')->join('professions', 'ebooks.professions_id', '=', 'professions.id')->whereIn('ebooks.id', $ebook_ids)->select('ebooks.*', 'professions.cat_name')->get();
    //   foreach ($questions as $index => $question) {
    //     $question->options = DB::table('questionnaire_options')->where('question_id', $question->id)->get();
    //     for($i = 0; $i < count($question->options); $i++) {
    //       $option = $question->options[$i];
    //       if ($option->is_split) {
    //         $split_ques = DB::table('questionaires')->where(['profession_id' => $cid, 'option_id' => $option->id])->first();
    //         $split_ques->options = DB::table('questionnaire_options')->where('question_id', $split_ques->id)->get();
    //         $question->options[$i]->split_ques = $split_ques;
    //       }
    //     }
    //     $questionnaires[] = $question;
    //   }
      return view('saved_ebook', ['ebooks' => $ebooks]);
    }
}
