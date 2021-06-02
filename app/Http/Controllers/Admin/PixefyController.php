<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\Blogs;
use App\Models\Pixefy;
use App\Models\PixefyTopic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PixefyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // show pixefy topics
    public function pixefyTopic()
    {
        $topics = PixefyTopic::where('is_deleted',0)->orderBy('id', 'desc')->get();
        return view('backend.pixefy.topics.create',compact('topics'));
    }

    // topic create

    public function topicCreate(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ]);

        $blogCate= New PixefyTopic();
        $blogCate->name = $request->name;
        $blogCate->save();
        $notification = array(
            'messege' => 'Insert Success!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // topic Status Change
    public function topicChangeStatus($id)
    {
        $topic = PixefyTopic::findOrFail($id);
        if($topic){
            if($topic->status == 1){
                $topic->status = 0;
                $topic->save();
                $notification = array(
                    'messege' => 'Deactive Success!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }else{
                $topic->status = 1;
                $topic->save();
                $notification = array(
                    'messege' => 'Active Success!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
        }else{
            $notification = array(
                'messege' => 'Status Change Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
       
    }

    // Topic Edit

    public function topicEdit($id)
    {
        $topics = PixefyTopic::where('is_deleted',0)->orderBy('id', 'desc')->get();
        $topic = PixefyTopic::findOrFail($id);
        return view('backend.pixefy.topics.update',compact('topics','topic'));
    }

    // Topic Update

    public function topicUpdate(Request $request , $id)
    {
        $request->validate([
            'name'=>'required',
        ]);
        $blogCate=PixefyTopic::findOrFail($id);
        $blogCate->name = $request->name;
        $blogCate->save();
        $notification = array(
            'messege' => 'Update Success!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.pixefy.topics')->with($notification);
    }

    // Topic delete

    public function topicDelete($id)
    {
        $blogCate=PixefyTopic::findOrFail($id);   
        if($blogCate){
            $blogCate->is_deleted = 1;
            $blogCate->save();
            $notification = array(
                'messege' => 'Delete Success!',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.pixefy.topics')->with($notification);
        }else{
            $notification = array(
                'messege' => 'Category Delete Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }


    
    // show pixefiy items

    public function pixefyIndex()
    {
        $pixefyes = Pixefy::with(['topic','creadedby'])->where('is_deleted',0)->orderBy('id', 'desc')->get();
        return view('backend.pixefy.index',compact('pixefyes'));
    }

    // show Pixefy create page
    public function pixefyCreate(Request $request)
    {
        $topics = PixefyTopic::where('is_deleted',0)->orderBy('id', 'desc')->get();
        return view('backend.pixefy.create',compact('topics'));
    }

    //  Pixefy Store 
    public function pixefyStore(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'topic'=>'required',
            'details'=>'required',
        ]);

        $pixefy = new Pixefy();
        $pixefy->title = $request->title;
        $pixefy->topic_id = $request->topic;
        $pixefy->details = $request->details;
        $pixefy->created_by = Auth::user()->id;
        $pixefy->save();
        $notification = array(
            'messege' => 'About Pixefy Created Success!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.pixefy.index')->with($notification);
    }

    // change pixefy status

    public function pixefyStatus($id)
    {
        
        $pixefy = Pixefy::findOrFail($id);
        if($pixefy){
            if($pixefy->status ==1){
                $pixefy->status = 0;
                $pixefy->save();
                $notification = array(
                    'messege' => 'Deactive Success!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);

            }else{
                $pixefy->status = 1;
                $pixefy->save();
                $notification = array(
                    'messege' => 'Active Success!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
        }else{
            $notification = array(
                'messege' => 'Status Change Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    // edit pixefy page
    public function pixefyEdit($id)
    {
        $topics = PixefyTopic::where('is_deleted',0)->orderBy('id', 'desc')->get();
        $pixefy = Pixefy::findOrFail($id);
        return view('backend.pixefy.update',compact('topics','pixefy'));
    }

    // Pixefy update

    public function pixefyUpdate (Request $request,$id)
    {
        $request->validate([
            'title'=>'required',
            'topic'=>'required',
            'details'=>'required',
        ]);

        $pixefy = Pixefy::findOrFail($id);
        $pixefy->title = $request->title;
        $pixefy->topic_id = $request->topic;
        $pixefy->details = $request->details;
        $pixefy->created_by = Auth::user()->id;
        $pixefy->save();
        $notification = array(
            'messege' => 'About Pixefy Updated Success!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.pixefy.index')->with($notification);
    }


    // Pixefy delete

    public function pixefyDelete($id)
    {
        $blog = Pixefy::findOrFail($id);
        if($blog){
            $blog->delete();
            $notification = array(
                'messege' => 'About Pixefy Deleted Success!',
                'alert-type' => 'success'
            );
        return redirect()->route('admin.pixefy.index')->with($notification);
        }else{
            $notification = array(
                'messege' => 'About Pixefy Deleted Faild!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

}
