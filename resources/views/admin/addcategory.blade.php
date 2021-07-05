<style>
    .breadcrumb{
margin-left: 200px;
    }
    .row-fluid{
        margin-left: 200px;
    }
</style>

@extends('adminlayout')
@section('admin_content')


<ul class="breadcrumb">
				
				<p class="alert-success">
					<?php
					   $message=Session()->get('message');
					   if($message)
					   {
						   echo $message;
						   Session()->put('message',null);
					   }
					   
					?>
			</ul>
	
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Catagory </h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					
					<div class="box-content">
						<form class="form-horizontal" action="{{ url('/addcategory')}}" method="post">
                            @csrf 
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="date01">Catagory Name</label>
							  <div class="controls">
								<input type="text" class="input-type" id="date01" name="category_name" required>
							  </div>
							</div>

						
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Catagory Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="category_description" id="textarea2" rows="3" required></textarea>
							  </div>
                            </div>
							
                            

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save changes</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->
@endsection