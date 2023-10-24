@extends('layouts.backend')
@section('title', 'Category Edit')
@section('content')
    <div class="card">
        <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-header">
                <h4>{{ $page_title }}</h4>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Category Name" value="{{ $category->name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="thumbnail" class="col-sm-3 col-form-label">Thumbnail</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                        <img src="{{ $category->thumbnail }}" alt="Category Image" width="80">
                    </div>
                </div>
                <fieldset class="form-group">
                    <div class="row">
                        <div class="col-form-label col-sm-3 pt-0">Category Type</div>
                        <div class="col-sm-9">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="menu" value="0"
                                    {{ $category->type == 0 ? 'checked':'' }}>
                                <label class="form-check-label" for="menu">
                                    Menu
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="blog" value="1" {{ $category->type == 1 ? 'checked':'' }}>
                                <label class="form-check-label" for="blog">
                                    Blog
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
