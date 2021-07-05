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
                            <h2><i class="halflings-icon user"></i><span class="break"></span>All Brands</h2>
                            
                        </div>					
                        <div class="box-content">					
                        </p>
                            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                              <thead>
                                  <tr>
                                      <th>Brand ID</th>
                                      <th>Brand Name</th>
                                      
                                    
                                      <th>Actions</th>
                                  </tr>
                              </thead>   
    
                             @foreach($brand as $view_brand)
                              <tbody>
                                <tr>
                                    <td>{{$view_brand->brand_id}}</td>
                                    <td class="center">{{$view_brand->brand_name}}</td>
                                   
    
                                
    
                                    <td class="center">
                                        <a href="{{url('/edit-brand', $view_brand->brand_id)}}" type="button"  class="btn btn-block btn-primary btn-sm">Update</a>
                                    </a>
    
                                    <a href="{{url('/delete-brand', $view_brand->brand_id)}}" type="button"  class="btn btn-block btn-danger btn-sm">Delete</a>
                                    
                                        
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                              </tbody>
                            
                             
                          </table>            
                        </div>
                    </div><!--/span-->
                
                </div><!--/row-->
    
                
                </div><!--/row-->
        
    
    
    @endsection