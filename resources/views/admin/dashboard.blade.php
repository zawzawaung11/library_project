@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
	<div class="col-md-3 mb-3">
	<div class="card mb-3">
			  <div class="card-header">
				Welcome <b>{{ Auth::user()->name }} </b>
			  </div>
			  <ul class="list-group list-group-flush">
				<li class="list-group-item"><a href="/dashboard">Book List</a></li>
				<li class="list-group-item"><a href="/book/add">Add Book</a></li>
			  </ul>
			</div>
			
		    <div class="card p-3">
			<form class="form-inline active-cyan-4" action="/book/search" method="get">
			  <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search"
				aria-label="Search" name="search">			   
			   <button type="submit" class="btn btn-success btn-sm btn-rounded"><i class="fa fa-search"
				aria-hidden="true"></i></button>			   
			</form>
			</div>		
			
	</div>
        <div class="col-md-9">
			 <table class="table table-hover">
			  <thead>
				<tr>
				  <th scope="col">#</th>
				  <th scope="col">Cover</th>
				  <th scope="col">Title</th>
				  <th scope="col">Author</th>
				  <th scope="col">Category</th>
				  <th scope="col">Action</th>
				</tr>
			  </thead>
			  <tbody>
			  <?php $i = -4; $skipped = $data->currentPage() * $data->perPage(); ?>
			  @foreach($data as $book)
				<tr>
				  <th scope="row">
				  	{{ $skipped + $i }}
				    <?php $i++; ?>
				  </th>
				  <td> 
				  <img src="{{asset('uploads/'.$book->photo)}}" />
				  </td>
				  <td>{{$book->title}}</td>
				  <td>{{$book->author_name}}</td>
				  <td>{{$book->category}}</td>
				  <td>

				  <a href="/book/edit/{{$book->id}}">	
				  <i class="fa fa-edit mr-3"></i>
				  </a>
				  
				  <a href="/book/delete/{{$book->id}}" class="del">	
				  <i class="fa fa-trash"></i>
				  </a>  

				  
				  </td>
				</tr>
			@endforeach
			  </tbody>
			</table>
			{{ $data->links() }}
        </div>
    </div>
</div>
@endsection

@section('extra-script')
<script>  
$(document).ready(function(){
  $(".del").click(function(){
    if (!confirm("Do you want to delete this item?")){
      return false;
    }
  });
});
</script>
@endsection
