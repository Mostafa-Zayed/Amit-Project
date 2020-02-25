<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        dd($pages);
        return view('index',compact('pages',$pages));
    }

    public function about(){
        $pages = Page::all();
        //dd($pages);
        return view('about',compact('pages',$pages));
    }

    //public function contact(){
        //$pages = Page::all();
        //return view('contact',compact('pages',$pages));
    //}
    //public function jobs(){
        //$pages = Page::all();
        //return view('jobs',compact('pages',$pages));
    //}

    //public function categories(){
        //$pages = Page::all();
        //return view('categories',compact('pages',$pages));
    //}
    //public function blog(){
        //$pages = Page::all();
        //return view('blog',compact('pages',$pages));
    //}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
}
