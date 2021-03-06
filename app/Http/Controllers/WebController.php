<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Slider;
use App\Models\HowToPlay;
use App\Models\AboutUs;
use App\Models\WhyChooseUs;
use App\Models\Order;
use Auth;
use Hash;

class WebController extends Controller
{
    public function index ()
    {
        $categories = Category::where('status', 1)->get(['slug']);
        $data = [];
        foreach($categories as $category){
            $data[$category->slug] = Product::where('draw_ends', '>=', date('Y-m-d'))->where('category_slug', $category->slug)->where('status',1)->get();
        }
        $howtoplays = HowToPlay::where('status',1)->get();
        $sliders = Slider::where('status',1)->get();
        return view('website.index', compact('data','howtoplays','sliders'));
    }

    public function singleProduct($slug)
    {
        $product = Product::where('slug', $slug)->first();

        return view('website.products.single-product', compact('product'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
        ]);

        do{
            $verify_token = uniqid();
        }while(User::where('verify_token', $verify_token)->first());
        do{
            $user_id = rand(1000, 9999);
        }while(User::where('user_id', $user_id)->first());

        $input = $request->all();
        $input['user_id'] = $user_id;
        $input['verify_token'] = $verify_token;
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole("User");

        $details = [
            'from' => 'verify',
            'title' => "We're excited to have you get started. First, you need to confirm your account. Just press the button below.",
            'body' => "If you have any questions, just reply to this email???we're always happy to help out.",
            'verify_token' => $user->verify_token,
        ];
        return redirect()->back()->with('message', 'Register Successfully');

       /*  \Mail::to($user->email)->send(new \App\Mail\Email($details)); */

       // return redirect()->back()->with('message', 'We have sent verification email. Click on link and get activation');
    }
    public function verifyEmail($token)
    {
        $user = User::where('verify_token', $token)->first();
        if(!empty($user)){
            $user->verify_token = null;
            $user->email_verified_at = date('Y-m-d H:i:s');
            if(!empty($user->temprary_email)){
                $user->email = $user->temprary_email;
                $user->temprary_email = null;
            }
            $user->update();

            return redirect()->route('login')->with('message', 'You are welcome. You can login from here.');
        }else{
            return redirect()->back()->with('error', 'Your token is expired');
        }
    }

    public function login()
    {
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        $page_title = 'Log In';
        return view('auth.login', compact('page_title'));
    }

    public function logOut()
    {
        Auth::logout();
        return redirect()->route('website.login');
    }
    public function authenticate(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if(!empty($user) && $user->status==1 && $user->hasRole($request->user_type)){
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                return redirect()->route('dashboard');
            }
            return redirect()->back()->with('error', 'Failed to login try again.!');
        }elseif(!empty($user) && $user->status==0){
            return redirect()->back()->with('error', 'Your account is not active verify your email we have sent you verification link.!');
        }else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function forgotPassword()
    {
        $page_title = 'Forgot Password';
        return view('web-views.login.forgot-password', compact('page_title'));
    }
    public function passwordResetLink(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
        ]);

        $user = User::where('email', $request->email)->where('status', 1)->first();
        if(!empty($user)){
            $page_title = 'Change Password';
            do{
                $verify_token = uniqid();
            }while(User::where('verify_token', $verify_token)->first());

            $user->verify_token = $verify_token;
            $user->update();

            $details = [
                'from' => 'password-reset',
                'title' => "Hello!",
                'body' => "You are receiving this email because we recieved a password reset request for your account.",
                'verify_token' => $user->verify_token,
            ];

            \Mail::to($user->email)->send(new \App\Mail\Email($details));

            return redirect()->route('login')->with('message', 'We have emailed your password reset link!');
        }else{
            return redirect()->back()->with('error', 'Your email address is not matched.');
        }
    }
    public function resetPassword($verify_token)
    {
        $page_title = 'Reset Password';
        return view('web-views.login.change-password', compact('page_title', 'verify_token'));
    }
    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|same:confirm-password',
        ]);

        $user = User::where('verify_token', $request->verify_token)->where('status', 1)->first();
        $user->password = Hash::make($request->password);
        $user->verify_token = null;
        $user->update();

        if($user){
            return redirect()->route('login')->with('message', 'You have updated password. You can login again.');
        }else{
            return redirect()->back()->with('error', 'Something went wrong try again');
        }
    }
    public function sendEmail(Request $request)
    {
        if(!isset($request->type)){
            $this->validate($request, [
                'email' => 'required|email|unique:users,email',
            ]);
        }

        $user = User::where('email', Auth::user()->email)->first();

        do{
            $verify_token = uniqid();
        }while(User::where('verify_token', $verify_token)->first());

        $user->temprary_email = $request->email;
        $user->verify_token = $verify_token;
        $user->update();

        $details = [
            'from' => 'verify',
            'title' => "We have recieved update email request. First, you need to confirm your account. Just press the button below.",
            'body' => "If you have any questions, just reply to this email???we're always happy to help out.",
            'verify_token' => $user->verify_token,
        ];

        \Mail::to($request->email)->send(new \App\Mail\Email($details));

        return redirect()->back()->with('message', 'We have sent verification email. Click on link and get activation');
    }
  public function aboutUs ()
  {
      $abouts = AboutUs::where('status',1)->take(1)->first();
      $chooses = WhyChooseUs::where('status',1)->get();
    return view('website.about-us', compact('abouts','chooses'));
  }
  public function billingAddress ()
  {
    return view('website.billing-address');
  }
  public function cart ()
  {
    return view('website.cart');
  }
  public function checkOut ()
  {
    $Items = \Cart::getContent();
    if(sizeof($Items)==0){
        if(Auth::check()){
            return redirect()->route('index');
        }else{
            return redirect()->route('login');
        }
    }
    return view('website.check-out', compact('Items'));
  }
  public function faqs ()
  {
    $questions = Faq::where('status',1)->get();
    return view('website.faqs' , compact('questions'));
  }
  public function userlogin ()
  {
    if(Auth::check()){
        return redirect()->route('dashboard');
    }
    $page_title = 'Log In';
    return view('website.login', compact('page_title'));
  }
  public function lostPassword()
  {
      return view('website.lost-password');
  }
  public function privacyPolicy()
  {
      return view('website.privacy-policy');
  }
  public function registration()
  {

     return view('website.registration');

  }
  public function result()
  {
      return view('website.result');
  }
  public function resultinner()
  {
      return view('website.resultinner');
  }
  public function shippingAddress()
  {
      return view('website.shipping-address');
  }
  public function soldOut()
  {
      return view('website.sold-out');
  }
  public function termsAndConditions()
  {
      return view('website.terms-and-conditions');
  }
  public function winner()
  {
      return view('website.winner');
  }

  public function getProductId(){
    $product_ids = Product::where('status',1)->get(['id', 'draw_ends']);
    return response()->json($product_ids);
  }

}
