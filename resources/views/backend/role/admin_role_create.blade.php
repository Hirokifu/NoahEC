@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="container-full">

<section class="content">

<div class="box">
<div class="box-header with-border">
    <h4 class="box-title"><strong>管理者追加</strong></h4>
</div>

<div class="box-body">
    <div class="row">
    <div class="col">
        <form method="post" action="{{ route('admin.user.store') }}" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="col-md-12">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <a>お名前 <span class="text-danger">*</span></a>
                        <div class="controls">
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <a>メールアドレス <span class="text-danger">*</span></a>
                        <div class="controls">
                            <input type="email" name="email" class="form-control">
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <a>携帯電話 <span class="text-danger">*</span></a>
                        <div class="controls">
                            <input type="text" name="phone" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <a>パスワード <span class="text-danger">*</span></a>
                        <div class="controls">
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <a>アバター<span class="text-danger"></span></a>
                        <div class="controls">
                            <input type="file" name="profile_photo_path" class="form-control" id="image">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <img id="showImage" src="{{ url('upload/no_image.jpg') }}" style="width:60px; height:60px;">
                </div>
            </div>

            <hr>

            <h4><strong>管理者の権限設定</strong></h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="controls">
                            <fieldset>
                                <input type="checkbox" id="checkbox_2" name="brand" value="1">
                                <label for="checkbox_2">Brand</label>
                            </fieldset>
                            <fieldset>
                                <input type="checkbox" id="checkbox_3" name="category" value="1">
                                <label for="checkbox_3">Category</label>
                            </fieldset>

                            <fieldset>
                                <input type="checkbox" id="checkbox_4" name="product" value="1">
                                <label for="checkbox_4">Product</label>
                            </fieldset>

                            <fieldset>
                                <input type="checkbox" id="checkbox_5" name="slider" value="1">
                                <label for="checkbox_5">Slider</label>
                            </fieldset>

                            <fieldset>
                                <input type="checkbox" id="checkbox_6" name="coupons" value="1">
                                <label for="checkbox_6">Coupons</label>
                            </fieldset>

                            <fieldset>
                                <input type="checkbox" id="checkbox_17" name="contact" value="1">
                                <label for="checkbox_17">Contact</label>
                            </fieldset>

                            <fieldset>
                                <input type="checkbox" id="checkbox_20" name="contact" value="1">
                                <label for="checkbox_20">Inquiry</label>
                            </fieldset>

                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <div class="controls">
                            <fieldset>
                                <input type="checkbox" id="checkbox_7" name="shipping" value="1">
                                <label for="checkbox_7">Shipping</label>
                            </fieldset>
                            <fieldset>
                                <input type="checkbox" id="checkbox_8" name="blog" value="1">
                                <label for="checkbox_8">Blog</label>
                            </fieldset>

                            <fieldset>
                                <input type="checkbox" id="checkbox_9" name="setting" value="1">
                                <label for="checkbox_9">Setting</label>
                            </fieldset>


                            <fieldset>
                                <input type="checkbox" id="checkbox_10" name="returnorder" value="1">
                                <label for="checkbox_10">Return Order</label>
                            </fieldset>

                            <fieldset>
                                <input type="checkbox" id="checkbox_11" name="review" value="1">
                                <label for="checkbox_11">Review</label>
                            </fieldset>

                            <fieldset>
                                <input type="checkbox" id="checkbox_18" name="news" value="1">
                                <label for="checkbox_18">News</label>
                            </fieldset>

                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <div class="controls">
                            <fieldset>
                                <input type="checkbox" id="checkbox_12" name="orders" value="1">
                                <label for="checkbox_12">Orders</label>
                            </fieldset>
                            <fieldset>
                                <input type="checkbox" id="checkbox_13" name="stock" value="1">
                                <label for="checkbox_13">Stock</label>
                            </fieldset>

                            <fieldset>
                                <input type="checkbox" id="checkbox_14" name="reports" value="1">
                                <label for="checkbox_14">Reports</label>
                            </fieldset>

                            <fieldset>
                                <input type="checkbox" id="checkbox_15" name="alluser" value="1">
                                <label for="checkbox_15">Alluser</label>
                            </fieldset>

                            <fieldset>
                                <input type="checkbox" id="checkbox_16" name="adminuserrole" value="1">
                                <label for="checkbox_16">Adminuserrole</label>
                            </fieldset>

                            <fieldset>
                                <input type="checkbox" id="checkbox_19" name="faq" value="1">
                                <label for="checkbox_19">FAQ</label>
                            </fieldset>

                        </div>
                    </div>
                </div>
            </div>

            <div class="text-xs-right">
                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="追加する">
            </div>

            </div>
        </div>
        </form>

    </div>
    </div>
</div>
</div>

</section>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection
