@extends('layouts.app')

@section('content')

<div class="container">
<div class="col-md-8">
	<div class="card">
			  <div class="card-header">
				Edit Book Record
			  </div>
			  
			  <div class="container">
			  <div class="col-md-12 mt-3 mb-3">
				<form action="/book/update" method="post" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="id" value="{{$data->id}}">
				<div class="form-group row">
				  <div class="col-sm-4 col-form-label"> 
				  <img src="{{asset('uploads/'.$data->photo)}}" />
				  </div>
				</div>
				
				
				  <div class="form-group row">
				  <label class="col-sm-4 col-form-label">Title</label>
				  <div class="col-sm-8">
					<input type="text" class="form-control" name="title" value="{{$data->title}}" placeholder="Enter book title">
				  </div>	
				  </div>
				  
				<div class="form-group row">
				  <label class="col-sm-4 col-form-label">Description</label>
				  <div class="col-sm-8">
					<textarea  name="description" class="form-control" rows="2"> {{$data->description}} </textarea>
				  </div>	
				  </div>    
				  
				<div class="form-group row">
				  <label class="col-sm-4 col-form-label">Author Name</label>
				  <div class="col-sm-8">
					<input type="text" class="form-control" name="author_name" value="{{$data->author_name}}" placeholder="Enter author name">
				  </div>	
				  </div> 

				<div class="form-group row">
				  <label class="col-sm-4 col-form-label">Category</label>
				  <div class="col-sm-8">
							<select name="category" class="form-control">
							  <option value="computer" {{($data->category=="computer")? "selected" : "" }}>Computer</option>
							  <option value="business" {{($data->category=="business")? "selected" : "" }}>Business</option>
							  <option value="knowledge" {{($data->category=="knowledge")? "selected" : "" }}>Knowledge</option>
							</select>

				  </div>	
				  </div>  

				<div class="form-group row">
				  <label class="col-sm-4 col-form-label">Cover Photo</label>
				  <div class="col-sm-8">
					 <input type="file" name="photo" >
					
				  </div>	
				  </div>   				  
	

				  <button type="submit" class="btn btn-primary mr-3">Update</button>
				  
				  <a href="/dashboard">Cancel</a>
				</form>
			</div>		
			 </div>
				 
	</div>
</div>
</div>

@endsection