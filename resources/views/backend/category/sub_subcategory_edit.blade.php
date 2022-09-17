@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="container-full">

    <!-- Main content -->
    <section class="content">
    <div class="row">

        {{-- Edit Sub SubCategory Page --}}
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title">Edit Sub-SubCategory</h3>
                </div>

                <div class="box-body">
                    <div class="table-responsive">

                    <form method="post" action="{{ route('subsubcategory.update') }}" >
                        @csrf

                        <input type="hidden" name="id" value="{{ $subsubcategories->id }}">

                        <div class="form-group">
                            <h5>Category Select <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="category_id" class="form-control" >
                                    <option value="" selected="" disabled="">Select Category</option>

                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $subsubcategories->category_id ? 'selected':'' }}>{{ $category->category_name_jp }}</option>
                                    @endforeach

                                </select>
                                @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <h5>SubCategory Select <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="subcategory_id" class="form-control" >
                                    <option value="" selected="" disabled="">Select Category</option>

                                    @foreach($subcategories as $subsub)
                                    <option value="{{ $subsub->id }}" {{ $subsub->id == $subsubcategories->subcategory_id ? 'selected':'' }}>{{ $subsub->subcategory_name_jp }}</option>
                                    @endforeach

                                </select>
                                @error('subcategory_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <h5>Sub-SubCategory Japanese <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="subsubcategory_name_jp" class="form-control" value="{{ $subsubcategories->subsubcategory_name_jp }}">
                                @error('subsubcategory_name_jp')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <h5>Sub-SubCategory Chinese <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="subsubcategory_name_cn" class="form-control" value="{{ $subsubcategories->subsubcategory_name_cn }}">
                                @error('subsubcategory_name_cn')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                        </div>
                    </form>

                    </div>
                </div>

            </div>
        </div>

    </div>
    </section>

</div>


@endsection