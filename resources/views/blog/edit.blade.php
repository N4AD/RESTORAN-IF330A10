@extends('layouts.backend')
@section('title', 'Blog Edit')
@section('content')
    <div class="card">
        <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-header">
                <h4>{{ $page_title }}</h4>
            </div>
            <div class="card-body">
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="title" value="{{ $blog->title }}">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                    <div class="col-sm-12 col-md-7">
                        <select name="category_id" class="form-control selectric">
                            @foreach ($categories as $item)
                            @if ($item->id == $blog->category_id)
                            <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                            @else
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                    <div class="col-sm-12 col-md-7">
                        <textarea name="description" class="summernote-simple">{{ $blog->description }}"</textarea>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                    <div class="col-sm-12 col-md-7">
                        <div style="background-image: url({{ asset($blog->thumbnail) }});background-size: cover; background-position: center;" id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="thumbnail" id="image-upload" />
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                    <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="status">
                            <option {{ $blog->status == 1 ? 'checked':'' }} value="1">Publish</option>
                            <option {{ $blog->status == 0 ? 'checked':'' }} value="0">Draft</option>
                        </select>
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
    <script src="{{ asset('assets/js/page/features-post-create.js') }}"></script>
@endsection