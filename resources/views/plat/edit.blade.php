<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <form method="POST" action="{{route('plats.update',['plat'=>$plat->id])}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class=" container">
            <!-- <div class="mb-3 mt-3">
                <label for="formFileLg" class="form-label">Large file input example</label>
                <input class="form-control form-control-lg" id="formFileLg" type="file">
            </div> -->
            <img src="{{asset('/storage/'.$plat -> picture)}}" style="width:25%; height:auto" class="img-thumbnail" height="100" />
            <div class="mb-3 mt-3">
                <label for="formFile" class="form-label">Picture</label>
                <input class="form-control" type="file" id="PictureInput" name="picture" value="">
                <div id="ValidatePicture" class="text-success"></div>
                <small></small>
            </div>

            <div class="mb-3 ">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{old ('title',$plat->title)}}">
            </div>


            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" id="DescriptionInput" name="description" rows="3" value="">{{old ('description',$plat->description)}}</textarea>
                <div id="ValidateDescription" class="text-warning"></div>
            </div>
            <div class="mb-3">
                <label class="col-form-label">Date</label>
                <input type="date" class="form-control" id="TitleInput" name="date" value="{{old ('date',$plat->date)}}" />
                <div id="ValidateDate"></div>
                <small></small>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong> Please check the form below for errors</strong>

                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <button type="submit" class="btn btn-outline-primary">Update Plat</button>
        </div>
    </form>

</x-app-layout>