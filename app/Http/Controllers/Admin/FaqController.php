<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FaqStoreRequest;
use App\Http\Requests\FaqUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Faq;
use Auth, Validator;
use Illuminate\Support\Facades\Crypt;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        //echo 'hi';die;
        $search = $request->search;
        if(!empty($search))
        {
            $data['faqs'] = FAQ::where('question', 'like', '%' . $search . '%')
            ->where('user_id', Auth::user()->id)->get()->toArray();
        }
        else
        {
            $data['faqs'] = FAQ::get()->toArray();
        }
        $data['faqs'] = FAQ::get()->toArray();
        return view('admin.faq.faqList', $data);
    }

    public function create(Request $request)
    {
        return view('admin.faq.addFaq');
    }

    public function store(FaqStoreRequest $request)
    {
        $faq = new Faq;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        
        if($faq->save()){
            return redirect()->route('adminFaq')->with('success', 'Faq added successfully');
        }else{
            return redirect()->back()->with('error', COMMON_ERROR);
        }
    }

    public function editFaq($id)
    {
        $id = Crypt::decrypt($id);
        $faq = Faq::find($id);
        return view('admin.faq.addFaq', compact('faq'));
    }

    public function update(FaqUpdateRequest $request)
    {
        $faq = Faq::find($request->id);
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        
        if($faq->save()){
            return redirect()->route('adminFaq')->with('success', 'Faq update successfully');
        }else{
            return redirect()->back()->with('error', COMMON_ERROR);
        }
    }

    public function show($id)
    {
    	$address = Faq::find($id);
    }

    public function delete($id)
    {
        $id = Crypt::decrypt($id);
        $address = Faq::find($id);
        if($address->delete())
        {
            return redirect()->route('adminFaq')->with('success', 'Faq deleted successfully');
        }
        else
        {
            return redirect()->back()->with('error', COMMON_ERROR);
        }
    }
}
