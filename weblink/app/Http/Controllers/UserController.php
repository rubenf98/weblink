<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Http\Resources\UsersResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\QueryFilters\UserFilters;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Follow;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        $filters = UserFilters::hydrate($request->query());
        return view('users.index')->with('users', UsersResource::collection(User::filterBy($filters)->get()));
    }

    //
    public function show($id)
    {
        $user= new UserResource(User::find($id));
        // Calc Number of Views!
        $views = 0;
        foreach ($user->post as $post) {
            $views+=$post->views;
        }

        //Calc Number of likes!
        $likes = 0;
        foreach ($user->post as $post) {
            $likes+=$post->likes->count();
        }
        //Verify Follow
        $follow= false;
        if (Auth::user()) {
            $follow = Follow::where([
            ['follower', Auth::user()->id],
            ['followed', $id],])->first();
        }
        if ($follow) {
            $follow = true;
        } else {
            $folow = false;
        }

        //Verify how many followers and how many followings
        $followers = Follow::where('followed', $id)->count();
        $following = Follow::where('follower', $id)->count();
        ;

        
        if (User::find($id)) {
            //return new UserResource(User::find($id));
            return view('users.show')
            ->with('user', $user)
            ->with('likes', $likes)
            ->with('views', $views)
            ->with('follow', $follow)
            ->with('followers', $followers)
            ->with('following', $following);
        } else {
            return 'Error';
        }
    }

    


    public function storeImage($user)
    {
        if (request()->has('image')) {
            $custumer->update([
                'image'=>request()->image->store('uploads', 'public')
            ]);
            
            $image=Image::make(public_path('profileImages'.$user->image))->fit(150, 150, null, 'center');
        }
    }

    public function update(Request $request)
    {
        // Saving image!!
        $image = $request['image-upload'];
        
        if ($image!=null) {
            $id=Auth::user()->id;
            //Saving image
            $imagename = $_FILES['image-upload']["name"];
            $imagetype = $_FILES['image-upload']['type'];
            $imageerror = $_FILES['image-upload']['error'];
            $imagetemp = $_FILES['image-upload']['tmp_name'];
            $imagePath = "images/profileImages/";
            $saveimagename="".Auth::user()->id."-".$imagename = $_FILES['image-upload']["name"];
            if (is_uploaded_file($imagetemp)) {
                if (move_uploaded_file($imagetemp, $imagePath . $saveimagename)) {
                    echo "Sussecfully uploaded your image.";
                }
            } else {
                echo "error";
            }
        }
        $name = $request->input("update-name-input");
        $email = $request->input("update-email-input");
        $description = $request->input("update-description-input");
        $country = $request->input("update-country-input");
        $bb = $request->input("update-birthday-input");
        if ($image != null) {
            $img= "".$imagePath."".$saveimagename;
        }

        $id = Auth::user()->id;
        //Validation
        $request->validate([
                'update-name-input' => 'required | min:5 | max: 100',
                'update-email-input'=> "required|email|unique:users,email,$id",
                'update-description-input'=> '',
                'update-country-input'=> 'required|',
                'update-birthday-input'=> 'required|date_format:Y-m-d|before:today',
            ]);

        $update_user = User::find($id);
        $update_user->name = $name;
        $update_user->email = $email;
        $update_user->description = $description;
        $update_user->country = $country;
        $update_user->b_day = $bb;
        $update_user->save();

        return redirect('/user/'.$id.'');
    }
}
