<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\PaymentDetail;
use App\Role;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_count = DB::table('users')->count();
        return view('home', ['user_count' => $user_count]);
    }
    
    public function isLoggedIn(Request $request) {
        return response()->json(['userid' => 0], 200);
        // if(\Auth::check()) {
        //     $user = Auth::user();
        //     return response()->json(['userid' => $user->id], 200);
        // } else {
        //     return response()->json(['userid' => 0], 200);
        // }
    }
    
    public function payForEbook(Request $request)
    {
        $email = $request->input('user_email');
        $name = $request->input('user_name');
        $card_number = $request->input('card_number');
        $card_expiry = $request->input('card_expiry');
        $card_cvv = $request->input('card_cvv');
        $userid = $request->input('userid');
        $cat_id = $request->input('cat_id');
        
        $ebook_details = DB::table('ebooks')->where('professions_id', $cat_id)->first();
        
        if(!$userid) {
            //Create new user with detail
            $user = User::create([
                                    'name' => $name,
                                    'email' => $email,
                                    'password' => Hash::make('Gbt3fC79ZmMEFUFJ'),
                                  ]);

              $user
                 ->roles()
                 ->attach(Role::where('name', 'user')->first());
        $userid = $user->id;
        }
        //Stripe payment API implementation here and get its status
        $data = [
                    'card_number' => $card_number,
                    'card_expiry' => $card_expiry,
                    'card_cvv' => $card_cvv,
                    'paid_on' => date("Y-m-d H:m:s", time()),
                    'paid_amount' => $ebook_details->price,
                    'status' => 1,   //0 => Unpaid, 1 => Paid, 2 => Failed
                    'user_id' => $userid,
                    'ebook_id' => $ebook_details->id,
                ];
        // return response()->json(['status' => true, 'ebook' => $data], 200);
        $detail = DB::table("payment_details")->insert($data);
        
        return response()->json(['status' => true, 'ebook' => $ebook_details], 200);
    }
}
