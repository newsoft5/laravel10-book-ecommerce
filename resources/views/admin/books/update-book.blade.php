@extends("layouts.admin")
@section("content")
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
        <h1 class="h4">Create Book</h1>
    </div>

    <hr>

    <div class="card">
        <div class="card-body">
            <form action="{{ url("/admin/books") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-10">
                        {{-- image --}}
                        <div class="mb-3">
                            <label for="image" class="form-label">Image:</label>
                            <input type="file" name="image" id="image"
                                class="form-control @error("image") is-invalid @enderror">
                            @error("image")
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- name --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error("name") is-invalid @enderror"
                                value="{{ old("name") }}">
                            @error("name")
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- description --}}
                        <div class="mb-3">
                            <label for="description" class="form-label">Description:</label>
                            <textarea name="description" id="description" rows="4"
                                class="form-control @error("description") is-invalid @enderror"></textarea>
                            @error("description")
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="card">
                            <div class="card-header">Categories</div>
                            <div class="card-body">
                                @error("categories")
                                    <div class="text-danger mb-2">{{ $message }}</div>
                                @enderror
                                @foreach($categories as $category)
                                    <div class="form-check">
                                        <input type="checkbox" name="categories[]"
                                            class="form-check-input"
                                            value="{{ $category->id }}" id="category_{{ $category->id }}">
                                        <label class="form-check-label" for="category_{{ $category->id }}">
                                            {{ $category->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Create</button>
            </form>
        </div>
    </div>
@endsection
