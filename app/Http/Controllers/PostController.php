<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryPost;
use App\Models\Notification;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Log;
use Image;
use Illuminate\Support\Str;




class PostController extends Controller
{


    public function index()
    {
        //
        $data['title'] = 'Blog';
        $data['blog'] = Post::with('category')->get();
        // return $data;
        return view('admin.blog.index', $data);
    }
    public function create()
    {
        //
        $data['title'] = 'Add Blog';
        $data['category'] = CategoryPost::all();
        return view('admin.blog.add', $data);
    }
    public function store(Request $request)
    {
        //
        // return $request;
        $request->validate(
            [
                'title' => 'required',
                'category_post_id' => 'required',
                'post_date' => 'required',
                'image' => 'required | mimes:jpeg,jpg | max:1000'
            ],
            [
                'title.required' => 'Post Title Must not be empty',
                'category_post_id.required' => 'Category Must be selected',
                'post_date.required' => 'Post date must be selected',
            ]
        );

        $in = $request->except('_token');
        $in['slug'] = Str::slug($request->title, '-');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = 'post_' . time() . '.jpg';
            $location = 'asset/thumbnails/' . $filename;
            Image::make($image)->save($location);
            $in['image'] = $filename;
        }
        $res = Post::create($in);
        if ($res) {
            $users = User::where('status', 1)->get();
            foreach ($users as $user) {
                Notification::create([
                    'user_id' => $user->id,
                    'title' => 'Viral Share Post For Today has been Posted',
                    'msg' => 'VIRAL SHARE Post for today has been posted. Kindly Go to the VIRAL SHARE Post to Share and Earn for today.',
                    'is_read' => 0
                ]);
            }
            return back()->with('success', 'Post was created Successfully!');
        } else {
            return back()->with('alert', 'Problem creating post');
        }
    }

    public function edit($id)
    {
        //
        $data['title'] = 'Edit Blog';
        $post = $data['post'] = Post::find($id);
        $data['category'] = CategoryPost::all();
        return view('admin.blog.edit', $data);
    }
    public function update(Request $request, $id)
    {
        // return $request;
        try {
            $post = Post::find($id);
            $request->validate(
                [
                    'title' => 'required',
                    'category_post_id' => 'required',
                    'details' => 'required',
                    'image' => 'nullable | mimes:jpeg,jpg,png | max:1000'
                ],
                [
                    'title.required' => 'Post Title Must not be empty',
                    'category_post_id.required' => 'Category Must be selected',
                    'details.required' => 'Post Details  must not be empty',
                ]
            );


            $in = $request->except('_token');
            $in['slug'] = Str::slug($request->title, '-');
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = 'post_' . time() . '.jpg';
                $location = 'asset/thumbnails/' . $filename;
                Image::make($image)->save($location);
                $path = './asset/thumbnails/';
                File::delete($path . $post->image);
                $in['image'] = $filename;
            }
            $res = $post->update($in);

            if ($res) {
                return back()->with('success', 'Updated Successfully!');
            } else {
                return back()->with('alert', 'Problem With Updating Article');
            }
        } catch (Exception $e) {
            Log::info('Error: ' . $e->getMessage());
            return back()->with('alert', 'Problem With Updating Article');
        }
        // return $data;
    }

    public function destroy($id)
    {
        // return $id;
        $data = Post::findOrFail($id);
        $path = './asset/thumbnails/';
        File::delete($path . $data->image);
        $res =  $data->delete();
        if ($res) {
            return back()->with('success', 'Post Delete Successfully!');
        } else {
            return back()->with('alert', 'Problem With Deleting Post');
        }
    }

    public function unpublish($id)
    {
        $blog = Post::find($id);
        $blog->update(['status' => 0]);
        return back()->with('success', 'Article has been unpublished.');
    }
    public function publish($id)
    {
        $blog = Post::find($id);
        $blog->update(['status' => 1]);
        return back()->with('success', 'Article was successfully published.');
    }
}
