<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;


class AuthController extends Controller
{

    public $path;
    public $dimensions;
    public $user;

    public function __construct()
    {
        $this->path = public_path().'/img/user/auth';
        $this->dimensions = 500;
        $this->user = Auth::user();
    }

    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $password = $request->password;
        if($request->password2 != $password) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Confirm Password'
            ]);
        }
        $user->password = Hash::make($password);
        $user->phone_number = "+62".$request->phone;
        $user->api_token = Str::random(25);
        $user->class = $request->class;
        $user->majors = $request->major;
        $user->address = $request->address;
        // if($request->hasFile('picture') && $request->file('picture') != null) {
        if(!File::isDirectory($this->path)) {
            File::makeDirectory($this->path);
        }
        $picture = $request->file('picture');
        $pictureName = Carbon::now()->timestamp.'_'.uniqid().'.'.$picture->getClientOriginalExtension();
        $canvas = Image::canvas($this->dimensions, $this->dimensions);
        $resizePicture = Image::make($picture)->resize($this->dimensions, null, function($constraint) {
            $constraint->aspectRatio();
        });
        $canvas->insert($resizePicture, 'center');
        $canvas->save($this->path.'/'.$pictureName, 80);
        $user->picture = $pictureName;
        // }
        $user->level = "Admin";
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil',
        ]);
    }

    public function login(Request $request)
    {
        if(Auth::attempt($request->only('email', 'password'))) {
            $this->user;
            return response()->json([
                'success' => true,
                'message' => 'Berhasil',
                'data' => $this->user
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal'
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
