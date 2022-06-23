@extends('admin.admin_master')
@section('admin')

<div class="content">							<div class="breadcrumb-wrapper">
    <h1>Product View</h1>
    
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
<li class="breadcrumb-item" aria-current="page">Products View</li>
</ol>
</nav>

</div>
    

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
            <div class="row justify-content-between">
                <h3>{{ $pr_view->product_name_en}}</h3>
                <div> 
                    <a href="{{ route('view_product')}}" class="btn btn-primary" > Back</a>
                    </div>
            </div>
            </div>
            <div class="card-body">
                <div class="content">	
                <div class="row no-gutters">
                <div class="col-lg-6 col-xl6">
                    <span><b>Category Name English</b></span>: &nbsp;&nbsp;&nbsp;
                    <span><h4>{{$pr_view['category']['categories_name_en']}}</h4></span><br><br>

                    <span><b>SubCategory Name English</b></span>: &nbsp;&nbsp;&nbsp;
                    <span><h4>{{$pr_view['subcategory']['subcategories_name_en']}}</h4></span><br><br>
					
					
                    @php
                        $id = $pr_view->id;
                        $name = $pr_view->country_id;
                        $str_arr = explode (",", $name); 
                        //dd($str_arr);

                        $data = \DB::table("products")

                            ->select("products.id",\DB::raw("GROUP_CONCAT(countries.country_name_en) as country_name_en"),\DB::raw("GROUP_CONCAT(countries.country_name_fr) as country_name_fr"))

                            ->leftjoin("countries",\DB::raw("FIND_IN_SET(countries.id,products.country_id)"),">",\DB::raw("'0'"))

                            ->where('products.id', '=', $id)

                            ->groupBy("products.id")

                            ->get();

                        //dd($data);
                       
                    @endphp
					

                    <span><b>Country Name English</b></span>: &nbsp;&nbsp;&nbsp;
                     <span><h4>{{ $pr_view->country_id }}</h4></span><br><br>

                    <span><b>Product Name English</b></span>: &nbsp;&nbsp;&nbsp;
                    <span><h4>{{$pr_view->product_name_en}}</h4></span><br><br>


                    <span><b>Product Image</b></span>: &nbsp;&nbsp;&nbsp;
                    <span><img src="{{ asset($pr_view->product_thambnail) }}" height="50px" width="50px"></span><br><br>
               
                    <span><b>Product Start Date</b></span>: &nbsp;&nbsp;&nbsp;
                    <span><h4>{{$pr_view->product_start_date}}</h4></span><br><br>
                </div>
                <div class="col-lg-6 col-xl6">
                    <span><b>Category Name French</b></span>: &nbsp;&nbsp;&nbsp;
                     <span><h4>{{$pr_view['category']['categories_name_fr']}}</h4></span><br><br>

                    <span><b>SubCategory Name French</b></span>: &nbsp;&nbsp;&nbsp;
                    <span><h4>{{$pr_view['subcategory']['subcategories_name_fr']}}</h4></span><br><br>

                    <span><b>Country Name French</b></span>: &nbsp;&nbsp;&nbsp;
                   <span><h4>{{ $pr_view->country_id }}</h4></span><br><br>

                    <span><b>Product Name French</b></span>: &nbsp;&nbsp;&nbsp;
                    <span><h4>{{$pr_view->product_name_fr}}</h4></span><br><br>

                    <span><b>Product Points</b></span>: &nbsp;&nbsp;&nbsp;
                    <span><h4>{{$pr_view->points}}</h4></span><br><br>

                    <span><b>Special Deal</b></span>: &nbsp;&nbsp;&nbsp;

                @if ($pr_view->special_deals == 1)
                <span><h4>In Deal</h4></span><br><br>
                @else
                <span><h4>Out Deal</h4></span><br><br>
                @endif

                    <span><b>Product End Date</b></span>: &nbsp;&nbsp;&nbsp;
                    <span><h4>{{$pr_view->product_end_date}}</h4></span><br><br>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

					
</div>

{{-- add model --}}
@endsection