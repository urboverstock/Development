<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserPostStoreRequest;
use App\Http\Requests\UserPostUpdateRequest;
use Illuminate\Support\Facades\Crypt;
use App\Models\UserPost;
use App\Models\PostLike;
use App\Models\PostComment;
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
            $data['userPosts'] = UserPost::with('getUserPostFile', 'getPostLike')->where('title', 'like', '%' . $search . '%')->where('user_id', Auth::user()->id)->get()->toArray();
        }
        else
        {
            $data['userPosts'] = UserPost::where('user_id', Auth::user()->id)->with('getUserPostFile', 'getPostLike')->get()->toArray();
            // print_r($data['userPosts']);die();
        }
        return view('userPost.userPostList', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('userPost.addUserPost');
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
        $userPost = new UserPost;
        $userPost->user_id = Auth::id();
        $userPost->title = $request->title;
        $userPost->description = $request->description;        
        
        if($userPost->save()){

            if(isset($request['file']) && !empty($request['file'])){

                $files = $request->file;
                // print_r($files);die();
                if (count($files)>0) {
                    foreach ($files as $key => $file) {
                        $extension = $file->getClientOriginalExtension();
                
                        $picture = uniqid() . date('YmdHis') . '.' . $extension;
                        $destinationPath = base_path() . '/public'.$this->uploadImagePath;
                        
                        $file->move($destinationPath, $picture);
                        $image = new UserPostFile;
                        $image->user_post_id = $userPost->id;
                        $image->file = $this->uploadImagePath . '/' .$picture;
                        $image->file_type = 'I';
                        $image->save();
                    }
                }
            }

            return redirect()->route('buyerUserPost')->with('success', 'User Post added successfully');
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
        $userPost = UserPost::with('getUserPostFile','getPostLike', 'getPostComments')->find($id);
        // echo "<pre>";
        // print_r($userPost);die();
        return view('userPost.viewUserPost', compact('userPost'));
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
        return view('userPost.addUserPost', compact('userPost'));
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
        $userPost = UserPost::find($request->id);
        $userPost->user_id = Auth::id();
        $userPost->title = $request->title;
        $userPost->description = $request->description;
        
        if($userPost->save()){

            if(isset($request['file']) && !empty($request['file'])){

                $files = $request->file;
                if (count($files)) {
                    foreach ($files as $key => $file) {
                        $extension = $file->getClientOriginalExtension();
                        $picture = uniqid() . date('YmdHis') . '.' . $extension;
                        $destinationPath = base_path() . '/public'.$this->uploadImagePath;
                        
                        $file->move($destinationPath, $picture);
                        $image = new UserPostFile;
                        $image->user_post_id = $userPost->id;
                        $image->file = $this->uploadImagePath . '/' .$picture;
                        $image->file_type = 'I';
                        $image->save();
                    }
                }
            }

            return redirect()->route('buyerUserPost')->with('success', 'User Post updated successfully');
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
            
            return redirect()->route('buyerUserPost')->with('success', 'User Post deleted successfully');
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

    public function likePost($post_id)
    {
        if(!Auth::check()){
            $response["status"] = 0;
            $response["message"] = "Please login first";
        }else{
            $postLike = PostLike::where(['user_id' => Auth::user()->id, 'post_id' => $post_id])->first();

            if(empty($postLike))
            {
                $post = new PostLike;
                $post->post_id = $post_id;
                $post->like_status = 1;
            }
            else
            {
                $post = PostLike::find($postLike->id);
                $likeStatus = $post->like_status == 0 ? 1 : 0;
                $post->like_status = $likeStatus;
            }

            $post->user_id = Auth::user()->id;

            if($post->save()){

                $like = $post->like_status == 1 ? 'Like' : 'Unlike';
           
                $button = $post->like_status == 1 ? 'Unlike' : 'Like';
                $response["status"] = 1;
                $response['like_status'] = $button;
                $response["message"] = "You have ". $like ." Successfully";
            }else{
                $response["status"] = 0;
                $response["message"] = "Something went wrong";
            }

            return $response;
        }
    }

    public function commentPost(Request $request)
    {
        if(!Auth::check()){
            $response["status"] = 0;
            $response["message"] = "Please login first";
            return $response;
        }else{
            // $postLike = PostComment::where(['user_id' => Auth::user()->id, 'post_id' => $request->post_id])->first();

            // if(empty($postLike))
            // {
                $post = new PostComment();
                $post->user_id = Auth::user()->id;
                $post->comment = $request->comment;
                $post->post_id = $request->post_id;

                if($post->save()){
                    $response["status"] = 1;
                    $response["message"] = "You have commented successfully";
                }else{
                    $response["status"] = 0;
                    $response["message"] = "Something went wrong";
                }
            // }
            // else
            // {
            //     $response["status"] = 0;
            //     $response["message"] = "You have already comment";
            // }

                return $response;            
        }
    }

    public function allPost()
    {
        $user_posts = UserPost::with('getUserPostFile', 'getUser', 'getPostLike')->latest()->paginate(4);

        return view('seller.userPost.allpost', compact('user_posts'));
    }
}
