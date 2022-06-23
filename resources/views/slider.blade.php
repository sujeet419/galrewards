@extends('admin.admin_master')
@section('admin')
<div class="content">							<div class="breadcrumb-wrapper">
    <h1>Slider</h1>
    
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
<li class="breadcrumb-item" aria-current="page">Slider</li>
</ol>
</nav>

</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>
                    <button type="button" class="btn bg-primary text-white btn-pill mb-3 mb-md-0" data-toggle="modal" data-target="#exampleModalForm" style="float: right;">
                      Add Slider <i class="mdi mdi-library-plus"></i></button>
                </h2>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th style="width:15%;">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                            @php
                                $sno = 1;
                            @endphp
                          
                        @foreach ($slider as $item)
                
                        <tr>
                
                            <td>{{ $sno++ }}</td>
                            
                            <td><img src="{{ asset($item->image) }}" style=" width:60px; height:50px;"></td>
                            <td>
                            @if ($item->slider_status == 1)
                                <span class="badge badge-pill badge-success" style="background-color: green;">Active</span>
                            @else
                            <span class="badge badge-pill badge-danger" style="background-color: red;">Inactive</span>
                            @endif
                
                            </td>
                            <td>
                            @if ($item->slider_status == 1)
                            <a href="{{ route('slider.inactive',$item->id)}}" class="btn btn-danger" title="inactive now">
                                <i class="fa fa-arrow-down"></i></a>
                        @else
                        <a href="{{ route('slider.active',$item->id)}}" class="btn btn-success" title="active now">
                            <i class="fa fa-arrow-up"></i></a>
                        @endif
                        <button class="btn btn-danger editslider" value="{{ $item->id }}" title="Edit Slider" data-toggle="modal" data-target="#exampleModalFormedit">
                            <i class="fa fa-pencil"></i></button>
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
                <h5 class="modal-title" id="exampleModalFormTitle">Add Slider Image&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (<span class="text-danger">*</span> Fields Required)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
        <form method="POST" action="{{ route('add.slider')}}" name="submitform" id="submitform" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <img src="" id="store_image">
                        <label for="exampleFormControlFile1"><span class="text-danger">* &nbsp</span>Image</label>
                        <input type="file" onChange="mainThamUrl(this)" class="form-control-file" id="exampleFormControlFile1" name="image" required>
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
                <h5 class="modal-title" id="exampleModalFormedit">Edit Slider Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('update.slider') }}" name="submitform" id="submit_edit_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="slider_id">
                    <input type="hidden" name="image_id" id="slider_img">  
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Image</label>
                        <input type="file" class="form-control-file" id="image" name="image" onChange="mainThamUrl(this)">
                        <img id="store_image" src="" alt="preview" height="80" width="80">
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
    $(document).on('click', '.editslider', function(e){
    e.preventDefault();
  var slider = $(this).val();

    $("#editslider").modal("show");
    $.ajax({
    type: "GET",
    url: "{{ url('/edit/slider') }}"+slider,
    dataType: "json",
    success: function (response) {
       // console.log(response.slider);
      $("#slider_id").val(slider);
      $("#slider_img").val(response.slider.image);
      $("#store_image").attr('src', "('/') }}"+"/"+response.slider.image);

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
				$('#store_image').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}	
</script>
@endsection