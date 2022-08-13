@extends('layout.index')
@section('main')
<section class="midium-banner">
    <div class="container-fluid">
        <div class="row">
            <!-- Single Banner  -->
            <div class="col-12 mt-5">
                <h3>Familias</h3>
            </div>
            @foreach ($allCategories as $categories)
            <div class="col-lg-4 col-md-4 col-12 mt-3 mb-5">
                <div class="single-banner">
                    <img src="https://via.placeholder.com/600x370" alt="#">
                    <div class="content">
                        <h3>{{$categories->familia}}
                        <a href="">Ver tudo</a>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- /End Single Banner  -->
        </div>
    </div>
</section>
<!-- End Midium Banner -->
    
@endsection