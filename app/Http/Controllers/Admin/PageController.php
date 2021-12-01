<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Page;
use Auth;
use Session;
use Validator;
use Illuminate\Support\Facades\Crypt;

class PageController extends Controller
{
    public function index()
    {
    	$pages = Page::get()->toArray();
    	return view('admin.page.list', compact('pages'));
    }

    public function create()
    {
    	return view('admin.page.create');
    }

    public function store(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

    	$page = new Page;
    	$page->title = $request->title;
    	$page->content = $request->content;
    	$page->user_id = Auth::user()->id;

    	$slug = \Str::slug($request->title);
       	$count = Page::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
        $slug = $count ? "{$slug}-{$count}" : $slug;

        $page->slug = $slug;

        if($page->save())
        {
	   		return redirect()->route('admin.page.list')->with('success', 'Page added successfully');
            
        }
        else
        {
            return redirect()->back()->with('error', COMMON_ERROR);
        }
    }

    public function edit($id)
    {
    	$id = Crypt::decrypt($id);
    	$page = Page::find($id);
    	return view('admin.page.create', compact('page'));
    }

    public function update(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

    	$page = Page::find($request->id);
    	$page->title = $request->title;
    	$page->content = $request->content;
    	$page->user_id = Auth::user()->id;

    	$slug = \Str::slug($request->title);
       	// $count = Page::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
        // $slug = $count ? "{$slug}-{$count}" : $slug;

        $page->slug = $slug;

        if($page->save())
        {
	   		return redirect()->route('admin.page.list')->with('success', 'Page updated successfully');
        }
        else
        {
            return redirect()->back()->with('error', COMMON_ERROR);
        }
    }
}
