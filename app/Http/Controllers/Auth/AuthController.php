<?php
    namespace ChopBox\Http\Controllers\Auth;

    use ChopBox\User;
    use Validator;
    use ChopBox\Http\Controllers\Controller;
    use Illuminate\Foundation\Auth\ThrottlesLogins;
    use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class AuthController extends Controller
    {
        /*
        |--------------------------------------------------------------------------
        | Registration & Login Controller
        |--------------------------------------------------------------------------
        |
        | This controller handles the registration of new users, as well as the
        | authentication of existing users. By default, this controller uses
        | a simple trait to add these behaviors. Why don't you explore it?
        |
        */

        use AuthenticatesAndRegistersUsers, ThrottlesLogins;
        protected $loginPath = '/login';
						  protected $registerPath = '/register';
        /**
         * Create a new authentication controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            $this->middleware('guest', ['except' => 'getLogout']);
        }

        /**
         * Authenticate users.
         *
         * @param  array  $request
         * @return User
         */
        public function doLogin(Request $request)
        {

            // If the class is using the ThrottlesLogins trait, we can automatically throttle
            // the login attempts for this application. We'll key this by the username and
            // the IP address of the client making these requests into this application.
            $throttles = $this->isUsingThrottlesLoginsTrait();

            if ($throttles && $this->hasTooManyLoginAttempts($request)) {
                return $this->sendLockoutResponse($request);
            }

            $credentials = $this->getCredentials($request);
            $field = (filter_var($credentials['email'], FILTER_VALIDATE_EMAIL)) ? "email" : "username";
            if (Auth::attempt([$field => $credentials['email'], 'password' => $credentials['password'],
            		'status'=>TRUE ],$request->has('remember'))) {
                return $this->handleUserWasAuthenticated($request, $throttles);
            }

            // If the login attempt was unsuccessful we will increment the number of attempts
            // to login and redirect the user back to the login form. Of course, when this
            // user surpasses their maximum number of attempts they will get locked out.
            if ($throttles) {
                $this->incrementLoginAttempts($request);
            }

            return redirect($this->loginPath())
            ->withInput($request->only($this->loginUsername(), 'remember'))
            ->withErrors([
                    $this->loginUsername() => $this->getFailedLoginMessage(),
            ]);
        }

						/**
							* Handle a registration request for the application.
							*
							* @param  \Illuminate\Http\Request  $request
							* @return \Illuminate\Http\Response
							*/
						public function doRegister(Request $request)
						{
								$validator = $this->validator($request->all());

								if ($validator->fails()) {
										return redirect($this->registerPath)->withErrors($validator);
								}

								Auth::login($this->create($request->all()));
								return redirect($this->redirectPath());
						}

        /**
         * Get a validator for an incoming registration request.
         *
         * @param  array  $data
         * @return \Illuminate\Contracts\Validation\Validator
         */
        protected function validator(array $data)
        {
            return Validator::make($data, [
                'name' => 'required|max:255|unique:users,username',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|confirmed|min:8',
            ]);
        }

        /**
         * Create a new user instance after a valid registration.
         *
         * @param  array  $data
         * @return User
         */
        protected function create(array $data)
        {
        	  return User::create([
                'email' => $data['email'],
            		'username' => $data['name'],
                'password' => bcrypt($data['password']),
            		'status' =>TRUE,
            		'profile_state' => FALSE
            ]);
        }
    }
