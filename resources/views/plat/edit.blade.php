@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-body bg-light">
                        <div class=" d-flex justify-content-between">
                            <a href="home" class="btn btn-secondary">
                                <i class="fas fa-home "> </i> </a>
                            <button type="button float-right " class="btn btn-primary " id="add_new_article"> <i
                                    class="fa fa-plus"></i> add new article</button>
                        </div>
                        <div class=" m-4 border border-black">

                            <small id="helpId" class="form-text text-muted">inter your meal information</small>
                            <form method="post" action="{{ route('plats.update', $plat->id) }}"
                                enctype="multipart/form-data" data-parsley-validate>
                                @csrf
                                @method('PUT')
                                <div id="formParent">

                                    <div class="m-2 p-3 bg-primary  bg-opacity-10 border border-info  rounded">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Name</label>
                                            <input type="text" value="{{ old('name', $plat->name) }}"
                                                class="form-control form-control-sm" name="name" id=""
                                                aria-describedby="helpId" placeholder="" required>
                                        </div>
                                        <div class="border border-black">
                                            <label for="" class="form-label">old Image</label>
                                            <img src="http://localhost/bistro/public/images/{{ $plat->img }}"
                                                alt="" srcset="" style="width: 3rem;">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Image</label>

                                            <input type="file" value="" class="form-control form-control-sm"
                                                name="image" id="" aria-describedby="helpId" placeholder=""
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">price</label>
                                            <input type="number" value="{{ old('name', $plat->price) }}"
                                                class="form-control form-control-sm" name="price" id=""
                                                aria-describedby="helpId" placeholder="" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label">Category</label>
                                            <select class="form-select form-select-lg" name="category_id" id=""
                                                required>
                                                {{ $cat_id = $plat->meal_category_id }}
                                                <option value="0" @if ($cat_id == 0) selected @endif>
                                                    food</option>

                                                <option value="1" @if ($cat_id == 1) selected @endif>
                                                    drink</option>
                                            </select>
                                        </div>
                                        <div class="mb-0">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" name='description' rows="2" id="task-description" required>{{ old('description', $plat->discretion) }}</textarea>
                                        </div>

                                    </div>

                                </div>
                                <div class="m-2">
                                    <button type="submit" class=" btn btn-primary" name="submit"> update </button>
                                </div>

                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
