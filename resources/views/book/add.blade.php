@extends('layouts.app')

@section('content')

<div class="container">
<div class="col-md-8">
	<div class="card">
			  <div class="card-header">
				Entry Book Record
			  </div>
			  
			  <div class="container">
			  <div class="col-md-12 mt-3 mb-3">
				<form action="/book/store" method="post" enctype="multipart/form-data">
				@csrf
				  <div class="form-group row">
				  <label class="col-sm-4 col-form-label">Title</label>
				  <div class="col-sm-8">
					<input type="text" class="form-control" name="title" value="{{old('title')}}" placeholder="Enter book title">
				  </div>	
				  </div>
				  
				<div class="form-group row">
				  <label class="col-sm-4 col-form-label">Description</label>
				  <div class="col-sm-8">
					<textarea  name="description" class="form-control" rows="2"> </textarea>
				  </div>	
				  </div>    
				  
				<div class="form-group row">
				  <label class="col-sm-4 col-form-label">Author Name</label>
				  <div class="col-sm-8">
					<input type="text" class="form-control" name="author_name" value="{{old('author_name')}}" placeholder="Enter author name">
				  </div>	
				  </div> 

				<div class="form-group row">
				  <label class="col-sm-4 col-form-label">Category</label>
				  <div class="col-sm-8">
							<select name="category" class="form-control">
							  <option value="computer">Computer</option>
							  <option value="business">Business</option>
							  <option value="knowledge">Knowledge</option>
							</select>

				  </div>	
				  </div>  

				<div class="form-group row">
				  <label class="col-sm-4 col-form-label">Cover Photo</label>
				  <div class="col-sm-8">
					 <input type="file" name="photo" >
					
				  </div>	
				  </div>   				  
	

				  <button type="submit" class="btn btn-primary mr-3">Submit</button>
				  
				  <a href="/dashboard">Cancel</a>
				</form>
			</div>		
			 </div>
				 
	</div>
</div>
</div>

@endsection