<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\BlogModel;
use App\Model\CategoryModel;
use App\Model\BlogCategoryModel;
use DB;
use Redirect;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $blog = BlogModel::select('blog.*',DB::raw('group_concat(c.name) as catName'))
                ->leftJoin('blog_category as bc','bc.blog_id','blog.id')
                ->leftJoin('category as c','bc.category_id','c.id')
                ->groupBy('blog.id')
                ->get();
        return view('blog.list', ['blog' => $blog]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = CategoryModel::pluck('name', 'id')->all();
        return view('blog.add', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
                    'category' => 'required',
                    'title' => 'required',
                    'description' => 'required',
        ]);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return Redirect::to('blog/create')
                            ->withErrors($validator)
                            ->withInput($request->all());
        } else {
           $blog = BlogModel::create($request->all()); 
           foreach ($request->all()['category'] as $cat){
               $blogCat['blog_id'] = $blog['id']; 
               $blogCat['category_id'] = $cat; 
               BlogCategoryModel::create($blogCat);
           }
           return Redirect('blog');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /*
     * 
     */
    public function getBlogDateWise(){
        $blog = BlogModel::select('blog.*',DB::raw('group_concat(c.name) as catName'))
                ->leftJoin('blog_category as bc','bc.blog_id','blog.id')
                ->leftJoin('category as c','bc.category_id','c.id')
                ->whereDate('blog.created_at', date('Y-m-d', strtotime($_REQUEST['date'])))
                ->groupBy('blog.id')
                ->get();
        return json_encode(array('data'=>$blog));
    }
}
