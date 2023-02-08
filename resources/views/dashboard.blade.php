<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div> -->
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ $message }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif 
<div class="my-5 mx-3">
    <div class="card-header border-bottom">
   

        <div class=" d-flex justify-content-between">
            <div class="col-auto align-self-center">
                <h5 class="mb-0">All Plats</h5>
            </div>
            <div class="justify-content-end">
                <a class="btn rounded-pill btn-success px-lg-3" onclick="" data-bs-toggle="modal" data-bs-target="#platModal">
                    <i class="fas fa-plus mr-2"></i>
                    <b>Add Plat</b>
                </a>
            </div>
        </div>
    </div>

    <div class="mt-4 table-responsive scrollbar">
        <table id="postsTable" class="table table-striped  bg-white rounded shadow-sm  table-hover ">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Picture</th>
                    <th scope="col">title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date</th>
                    <th class="text-end" scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <!-- <tr class="align-middle" id="">
                                                <td class="col-1">HI</td>
                                                
                                                <td id="" class="text-nowrap">HH</td>
                                                <td id="" class="text-nowrap">NOO</td>
                                                <td id="" class="text-nowrap">JIII</td>
                                                <td class="text-end">
                                                  
                                                <a onclick="" class="btn btn-sm btn-warning">Edit</a>
                                                <a href=""><span class="btn btn-sm btn-danger">Delete</span></a>
                                                </td>
                                                
                                            </tr> -->

                
                <!-- if (empty($plats))
                   echo '<tr class="align-middle"><th class="col-3">No result found.</th> </tr>';
                else { -->
                    @foreach ($plats as $plat)

                        <tr class="align-middle" id="">
                            <td class="col-1">{{$plat->id}}</td>
                            <td class="text-nowrap">

                                <img id="" src="../assets/uploads/<{{$plat -> picture}}" style="width:3rem;" />
                            </td> 
                           
                            <td id="" class="text-nowrap">{{$plat -> title}}</td>
                            <td id="" class="text-nowrap">{{$plat -> description}}</td>
                            <td id="" class="text-nowrap">{{$plat -> date}}</td>


                            <td class="text-end">
                                <a href="{{route('plats.edit',['plat'=>$plat->id])}}" class="btn btn-sm btn-warning" >Edit</a>

                                <form method="POST" action="{{route('plats.destroy',['plat'=>$plat->id])}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                                </form>

                            </td>

                        </tr>
                @endforeach
               
            </tbody>

        </table>
    </div>
</div>
<!-- Plat Modal -->
<div class="modal fade" id="platModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mt-3 mb-1">
        <div class="modal-content background ">
            <div class="modal-header">
                <h5 class="" id="TitleModal">Add Plat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-0 pb-1">
                <form  id="form"  method="POST" action="{{route('plats.store')}}"  enctype="multipart/form-data">
                    @csrf
                    <div id="allForms">
                        <div id="form1">
                                <!-- <input type="hidden" id="IdInputhidden" name="id" value="" /> -->

                                <!-- <img src="" alt="" id="image-edite" class="img-circle img-thumbnail" style="height: 35px; width: 35px;"> -->
                                <img hidden src="" alt="" id="image-edite" class="img-circle img-thumbnail" style="width:100px; height:100px; border-color: blue;">

                                <div class="mb-3">
                                <label for="formFile" class="form-label">Picture</label>
                                <input class="form-control" type="file" id="PictureInput" name="picture" value="{{old ('picture')}}">
                                <div id="ValidatePicture" class="text-success"></div>
                                <small></small>
                                </div>

                                <div class="mb-3">
                                        <label class="col-form-label">title</label>
                                        <input type="text" class="form-control" id="TitleInput" name="title" value="{{old ('title')}}" />
                                        <div id="ValidateTitle"></div>
                                        <small></small>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">description</label>
                                    <textarea class="form-control" id="ContentInput" name="description" rows="3" value="">{{old ('description')}}</textarea>
                                    <div id="ValidateDescription" class="text-warning"></div>
                                </div>
                                <div class="mb-3">
                                        <label class="col-form-label">Date</label>
                                        <input type="date" class="form-control" id="TitleInput" name="date" value="{{old ('date')}}"/>
                                        <div id="ValidateDate"></div>
                                        <small></small>
                                    </div>

                                
                        </div>
                   
                    </div>
                    <!-- <div id="anothetModel">
      
                    </div> -->
                    </div>
                    <div class="modal-footer">
                    
                        <button type="reset" class="btn btn-outline-light text-black" data-bs-dismiss="modal">Cancel</button>
                        <button id="savePost" type="submit" name="savePost" class="btn btn-outline-primary">Save</button>
                        
                        <div id="editPosts" >
                            <button style="display: none" id="updatePost" type="submit" name="updatePostForm" class="btn btn-warning text-black">Update</button>
                        </div>
                    </div>
                </form>
            </div>


      
      
    </div>
    
</div>
</x-app-layout>