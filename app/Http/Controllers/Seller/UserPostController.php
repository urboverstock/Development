<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserPostStoreRequest;
use App\Http\Requests\UserPostUpdateRequest;
use Illuminate\Support\Facades\Crypt;
use App\Models\UserPost;
use App\Models\UserPostFile;
use Auth, Validator;

class UserPostController extends Controller
{
    public $uploadImagePath = '/assets/images/userPost';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        if(!empty($search))
        {
            $data['userPosts'] = UserPost::with('getUserPostFile')->where('title', 'like', '%' . $search . '%')->where('user_id', Auth::user()->id)->get()->toArray();
        }
        else
        {
            $data['userPosts'] = UserPost::where('user_id', Auth::user()->id)->with('getUserPostFile')->get()->toArray();
        }
        return view('seller.userPost.userPostList', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('seller.userPost.addUserPost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserPostStoreRequest $request)
    {
        // print_r($request->all());die();
        $extensions = $request->extension;

        if(isset($extensions))
        {
            foreach ($extensions as $key => $value) {
            // print_r($value);die();
                if($value != 'jpg' && $value != 'jpeg' && $value != 'png')
                {
                    return redirect()->back()->with('error', 'The image file must be jpg, jpeg, png');
                }
            }
        }

        $userPost = new UserPost;
        $userPost->user_id = Auth::id();
        $userPost->title = $request->title;
        $userPost->description = $request->description;        
        
        if($userPost->save()){

            if(isset($request['image']) && !empty($request['image'])){

                $files = $request->image;
                // print_r($files);die();
                if (count($files)>0) {
                    foreach ($files as $key => $file) {
                        // $extension = $file->getClientOriginalExtension();
                
                        // $picture = uniqid() . date('YmdHis') . '.' . $extension;
                        // $destinationPath = base_path() . '/public'.$this->uploadImagePath;
                        
                        // $file->move($destinationPath, $picture);

                        $picture = $file.'.png';

                        $image = file_get_contents($file);

                        $fileName = uniqid() . date('YmdHis') . '.png';

                        file_put_contents( 'assets/images/userPost/'.$fileName, $image);

                        $image = new UserPostFile;
                        $image->user_post_id = $userPost->id;
                        $image->file = '/assets/images/userPost/'.$fileName;
                        $image->file_type = 'I';
                        $image->save();
                    }
                }
            }

            return redirect()->route('sellerUserPost')->with('success', 'User Post added successfully');
        }else{
            return redirect()->back()->with('error', COMMON_ERROR);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $userPost = UserPost::with('getUserPostFile')->find($id);
        return view('seller.userPost.viewUserPost', compact('userPost'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $userPost = UserPost::with('getUserPostFile')->find($id);
        return view('seller.userPost.addUserPost', compact('userPost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserPostUpdateRequest $request)
    {
        // print_r($request->all());die();
        $extensions = $request->extension;
        if(isset($extensions))
        {
            foreach ($extensions as $key => $value) {
            // print_r($value);die();
                if($value != 'jpg' && $value != 'jpeg' && $value != 'png')
                {
                    return redirect()->back()->with('error', 'The image file must be jpg, jpeg, png');
                }
            }    
        }
        
        $userPost = UserPost::find($request->id);
        $userPost->user_id = Auth::id();
        $userPost->title = $request->title;
        $userPost->description = $request->description;
        
        if($userPost->save()){

            if(isset($request['image']) && !empty($request['image'])){

                $files = $request->image;
                // print_r($files);die();
                if (count($files)) {
                    foreach ($files as $key => $file) {
                        // $extension = $file->getClientOriginalExtension();
                        // $picture = uniqid() . date('YmdHis') . '.' . $extension;
                        // $destinationPath = base_path() . '/public'.$this->uploadImagePath;
                        
                        // $file->move($destinationPath, $picture);
                        $picture = $file.'.png';
                        // print_r($picture);die();
                        $image = file_get_contents($file);

                        $fileName = uniqid() . date('YmdHis') . '.png';

                        file_put_contents( 'assets/images/userPost/'.$fileName, $image);

                        $image = new UserPostFile;
                        $image->user_post_id = $userPost->id;
                        $image->file = '/assets/images/userPost/'.$fileName;
                        $image->file_type = 'I';
                        $image->save();
                    }
                }
            }

            return redirect()->route('sellerUserPost')->with('success', 'User Post updated successfully');
        }else{
            return redirect()->back()->with('error', COMMON_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $userPost = UserPost::find($id);
        if($userPost->delete())
        {
            $postFile = UserPostFile::where('user_post_id', $id)->delete();
            
            return redirect()->route('sellerUserPost')->with('success', 'User Post deleted successfully');
        }
        else
        {
            return redirect()->back()->with('error', COMMON_ERROR);
        }
    }

    //Delete particular post file
    public function deleteUserPostFile($id)
    {
        $id = Crypt::decrypt($id);
        $postFile = UserPostFile::find($id);
        if($postFile->delete())
        {
            return back()->with('success', 'File deleted successfully');
        }
        else
        {
            return redirect()->back()->with('error', COMMON_ERROR);
        }
    }

    
}
