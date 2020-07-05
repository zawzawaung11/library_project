<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;

use Illuminate\Support\Facades\Validator;

use Image;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
	
	public function search(Request $request)
    {
       
	     $search = $request->get("search");

         $book= Book::orderBy('created_at','desc')
		 ->where('title','like','%'.$search.'%')
		 ->orWhere('author_name','like','%'.$search.'%')
		 ->orWhere('category','like','%'.$search.'%')
		 ->paginate(5);
		 
		 return view('admin.dashboard',['data'=>$book]);
	   
	   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		return view('book.add');
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
		
	     $validator = Validator::make($request->all(), [
         'title' => 'required',
		 'description' => 'required',
		 'author_name' => 'required',
		 'category' => 'required',
		 'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }		
		
		   $file = $request->file('photo');
		   $filename = $file->getClientOriginalName();
		   $img = Image::make($file);
		   $img->fit(80, 80)->save(public_path('uploads/'.$filename));
		
		$book = new Book;
		$book->title = $request->input('title');
		$book->description = $request->input('description');
		$book->author_name = $request->input('author_name');
		$book->category = $request->input('category');
		$book->photo = $filename;
		$book->save();
		
		return redirect('dashboard')->with('toast_success','Book created!');
		
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
		$book = Book::find($id);
		
		return view('book.edit',['data'=>$book]);
		
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
	    $validator = Validator::make($request->all(), [
         'title' => 'required',
		 'description' => 'required',
		 'author_name' => 'required',
		 'category' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }	

	if($request->hasFile('photo')){
		   $file = $request->file('photo');
		   $filename = $file->getClientOriginalName();
		   $img = Image::make($file);
		   $img->fit(80, 80)->save(public_path('uploads/'.$filename));
		
		
		$book = Book::find($request->id);
		$book->title = $request->input('title');
		$book->description = $request->input('description');
		$book->author_name = $request->input('author_name');
		$book->category = $request->input('category');
		$book->photo = $filename;
		$book->save();
	}

    else
	{

			$book = Book::find($request->id);
			$book->title = $request->input('title');
			$book->description = $request->input('description');
			$book->author_name = $request->input('author_name');
			$book->category = $request->input('category');
			$book->save();

	}		
	
		return redirect('dashboard')->with('toast_success','Book updated!');
		
		
		
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
		$book = Book::find($id);
		$book->delete();
		
		return redirect('dashboard')->with('toast_success','Book deleted!');
    }
}
