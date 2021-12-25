<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    
    public function index()
    {
        return view('form-data');
    }

    public function store(Request $request)
    {
        $post = new Post;
        // check that the selected file is image and save it to a folder
        // $post->picture = $request->picture;
        if($request->hasFile('picture')){
            $image = $request->file('picture');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/images'), $image_name);
            $post->picture = $image_name;
        }
        $post->name = $request->name;
        // check that the name is chars only
        if(preg_match("^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z])$^", $post->name) == 0){
           return redirect('form')->with('status-failure', 'First name should be characters only!');
        }
        // check that it is a correct type of emails
        $post->email = $request->email;
        if (!filter_var($post->email, FILTER_VALIDATE_EMAIL)) {
            return redirect('form')->with('status-failure', 'Not a valid email address!');
        }
        // check that it is numbers only
        $post->phone_number = $request->phone_number;
        if(preg_match('@[0-9]@', $post->phone_number) == 0 ){
            return redirect('form')->with('status-failure', 'Phone number must be numbers only!');
        }
        $post->save();
        return redirect('form')->with('status-success', 'Data Has Been Inserted');
    }
}