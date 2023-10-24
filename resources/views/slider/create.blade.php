@extends('layouts.backend')
@section('title', 'Slider Create')
@section('content')
    <div class="card">
        <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-header">
                <h4>{{ $page_title }}</h4>
            </div>
            <div class="card-body">
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="title">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sub Title</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="sub_title">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                    <div class="col-sm-12 col-md-7">
                        <div style="background-image: url();" id="image-preview" class="image-preview w-100">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="thumbnail" id="image-upload" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
    <script>
        $('#type').on('change', function () {
            const val = $(this).val();

            if (val == 1) {
                $('#video_link').removeClass('d-none');
            }else{
                $('#video_link').addClass('d-none');
            }
        });
    </script>
    <script src="{{ asset('assets/js/page/features-post-create.js') }}"></script>
@endsection
