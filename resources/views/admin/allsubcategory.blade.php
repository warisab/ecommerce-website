
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
                                      <th>Sub Catagory ID</th>
                                      <th>SubCatagory Name</th>
                                      <th>Catergory name</th>
                                    
                                      <th>Actions</th>
                                  </tr>
                              </thead>   
    
                             @foreach($subcategory as $view_subcategory)
    
                              <tbody>
                                <tr>
                                    <td>{{$view_subcategory->subcategory_id}}</td>
                                    <td class="center">{{$view_subcategory->subcategory_name}}</td>
                                    <td class="center">{{$view_subcategory->category_name}}</td>
    
                                
     
                                    <td class="center">
                                
    
                                    <a href="{{url('/delete-subcategory', $view_subcategory->subcategory_id)}}" type="button"  class="btn btn-block btn-danger btn-sm">Delete</a>
                                    
                                        
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