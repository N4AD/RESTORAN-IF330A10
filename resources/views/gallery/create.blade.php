@extends('layouts.backend')
@section('title', 'Gallery Create')
@section('content')
    <div class="card">
        <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-header">
                <h4>{{ $page_title }}</h4>
            </div>
            <div class="card-body">
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Caption</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="caption">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                    <div class="col-sm-12 col-md-7">
                        <div style="background-image: url();" id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="thumbnail" id="image-upload" />
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Type</label>
                    <div class="col-sm-12 col-md-7">
                        <select name="type" class="form-control selectric" id="type">
                            <option selected value="0">Photo</option>
                            <option value="1">Video</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-4 d-none" id="video_link">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Video Link</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="video_link">
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
