@extends('admin.admin_master')
@section('admin')
<div class="content">							<div class="breadcrumb-wrapper">
    <h1>Revolving Image</h1>
    
<nav aria-label="breadcrumb">
<ol class="breadcrumb p-0">
<li class="breadcrumb-item">
<a href="{{ route('dashboard')}}">
<span class="mdi mdi-home"></span>                
</a>
</li>
<li class="breadcrumb-item">
components
</li>
<li class="breadcrumb-item" aria-current="page">Revolving Image</li>
</ol>
</nav>

</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>
                    <button type="button" class="btn bg-primary text-white btn-pill mb-3 mb-md-0" data-toggle="modal" data-target="#exampleModalForm" style="float: right;">
                      Add Revolving Image <i class="mdi mdi-library-plus"></i></button>
                </h2>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Image</th>
                            <th>Title English</th>
                            <th>Title French</th>
                            <th>Description English</th>
                            <th>Description French</th>
                            <th>Status</th>
                            <th style="width:15%;">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                            @php
                                $sno = 1;
                            @endphp
                          
                        @foreach ($rimage as $item)
                
                        <tr>
                
                            <td>{{ $sno++ }}</td>
                            
                            <td><img src="{{ asset($item->image) }}" style=" width:60px; height:50px;"></td>
                            <td>{{ $item->title_en ?? '' }}</td>
                            <td>{{ $item->title_fr ?? '' }}</td>
                            <td>{{ $item->description_en ?? '' }}</td>
                            <td>{{ $item->description_fr ?? '' }}</td>
                
                
                            <td>
                            @if ($item->revol_image_status == 1)
                                <span class="badge badge-pill badge-success" style="background-color: green;">Active</span>
                            @else
                            <span class="badge badge-pill badge-danger" style="background-color: red;">Inactive</span>
                            @endif
                
                            </td>
                            <td>
                            @if ($item->revol_image_status == 1)
                            <a href="{{ route('rimage.inactive',$item->id)}}" class="btn btn-danger" title="inactive now">
                                <i class="fa fa-arrow-down"></i></a>
                        @else
                        <a href="{{ route('rimage.active',$item->id)}}" class="btn btn-success" title="active now">
                            <i class="fa fa-arrow-up"></i></a>
                        @endif
                        <button class="btn btn-danger editrimage" value="{{ $item->id }}" title="Edit " data-toggle="modal" data-target="#exampleModalFormedit">
                            <i class="fa fa-eye"></i></button>
                            {{-- <a href="" class="btn btn-danger" title="inactive now" data-toggle="modal" data-target="#exampleModalFormedit">
                            <i class="fa fa-trash"></i></a> --}}
                            </td>
                        </tr>
                
                        @endforeach
                
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
						
</div>



{{-- add model --}}

<div class="modal fade" id="exampleModalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalFormTitle">Add Revolving Image&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (<span class="text-danger">*</span> Fields Required)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
        <form method="POST" action="{{ route('store.rimage')}}" name="submitform" id="submitform" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <img src="" id="mainthmb">
                        <label for="exampleFormControlFile1"><span class="text-danger">* &nbsp</span>Image (size 780*200)</label>
                        <input type="file" onChange="mainThamUrl(this)" class="form-control-file" id="exampleFormControlFile1" name="image" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"><span class="text-danger">* &nbsp</span>Title English :</label>
                        <input type="test" class="form-control" id="exampleInputPassword1" placeholder="Category Name" name="title_en" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"><span class="text-danger">* &nbsp</span>Title French :</label>
                        <input type="test" class="form-control" id="exampleInputPassword1" placeholder="Category Name" name="title_fr" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1"><span class="text-danger">* &nbsp</span>Description English :</label>
                        <input type="test" class="form-control" id="exampleInputPassword1" placeholder="Category Name" name="description_en" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"><span class="text-danger">* &nbsp</span>Description French :</label>
                        <input type="test" class="form-control" id="exampleInputPassword1" placeholder="Category Name" name="description_fr" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
                <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
                
            </div>
        </div>
    </div>
</div>

{{-- edit model --}}

<div class="modal fade" id="exampleModalFormedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormedit" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalFormedit">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('update.rimage') }}" name="submitform" id="submit_edit_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="rid_id">
                    <input type="hidden" name="rimage_id" id="rimg_img">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                        <img id="store_image" src="" alt="preview" height="80" width="80">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Title English :</label>
                        <input type="test" class="form-control" id="title_en" placeholder="Category Name" name="title_en">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Title French :</label>
                        <input type="test" class="form-control" id="title_fr" placeholder="Category Name" name="title_fr">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Description English :</label>
                        <input type="test" class="form-control" id="description_en" placeholder="Category Name" name="description_en">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description French :</label>
                        <input type="test" class="form-control" id="description_fr" placeholder="Category Name" name="description_fr">
                    </div>
                            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
        </form>

                <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
$.ajaxSetup({ 
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$(document).ready(function () {
$(document).on('click', '.editrimage', function(e){
    e.preventDefault();
  var rid = $(this).val();
  //console.log(brandidname);
    $.ajax({
    type: "GET",
	url: "{{ url('/edit/rimage') }}"+rid,
    dataType: "json",
    success: function (response) {
        console.log(response.rimage);
      $("#rid_id").val(rid);
      $("#rimg_img").val(response.rimage.image);
      $("#title_en").val(response.rimage.title_en);
      $("#title_fr").val(response.rimage.title_fr);
      $("#description_en").val(response.rimage.description_en);
      $("#description_fr").val(response.rimage.description_fr);
      $("#store_image").attr('src', "{{ url('/public') }}"+"/"+response.rimage.image);

    }
  });
  });
});
</script>
<script type="text/javascript">
	function mainThamUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainthmb').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}	
</script>
@endsection