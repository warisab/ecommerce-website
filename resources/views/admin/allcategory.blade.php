<style>
.box-header{
    margin-left: 50px;
}
</style>
@extends('adminlayout')
@section('admin_content')

		
<
			<p class="alert-success">
					<?php
					   $message=Session()->get('message');
					   if($message)
					   {
						   echo $message;
						   Session()->put('message',null);
					   }
					   
					?>

			<div id="docoment" class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Catagory</h2>
						
					</div>					
					<div class="box-content">					
					</p>
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Catagory ID</th>
								  <th>Catagory Name</th>
								  <th>Catagory Description</th>
								
								  <th>Actions</th>
							  </tr>
						  </thead>   

                         @foreach($category as $view_category)

						  <tbody>
							<tr>
								<td>{{$view_category->category_id}}</td>
								<td class="center">{{$view_category->category_name}}</td>
								<td class="center">{{$view_category->category_description}}</td>

							

								<td class="center">
                                    <a href="{{url('/edit-category', $view_category->category_id)}}" type="button"  class="btn btn-block btn-primary btn-sm">Update</a>
                                </a>

								<a href="{{url('/delete-category', $view_category->category_id)}}" type="button"  class="btn btn-block btn-danger btn-sm">Delete</a>
                                
									
									</a>
								</td>
							</tr>
						
							
						  </tbody>

						  @endforeach
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

			
			</div><!--/row-->
    


@endsection