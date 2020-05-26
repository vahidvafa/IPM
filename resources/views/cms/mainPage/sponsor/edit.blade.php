@extends('cms.master')
@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <h4 class="card-title">ویرایش خبر</h4>
            </div>

            <div class="card-body table-responsive yourPlan pack-info">
                <div class="row">
                    <div class="col-lg-1 col-md-1 hidden-sm hidden-xs"></div>
                    <div class="col-lg-10 col-md-10 col-sm-12">
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">sync</i>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{route('cms.sponsor.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-lg-12 mb-4">
                                            <label class="col-12">لینک سایت اسپانسر</label>
                                            <input class="form-control" name="url" type="url" placeholder="لینک سایت اسپانسر"
                                                   required>
                                            @if($errors->has('url'))
                                                <div class="error text-danger">{{ $errors->first('url') }}</div>
                                            @endif
                                        </div>

                                        <div class="col-lg-12 mb-4">
                                            <label class="col-12">لوگوی اسپانسر( حداکثر 120px در 120px )</label>
                                            <input class="form-control"
                                                   name="photo" id="photo" type="file"
                                                   required

                                            >
                                            @if($errors->has('photo'))
                                                <div class="error text-danger">{{ $errors->first('photo') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-success" type="submit">ویرایش</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 hidden-sm hidden-xs"></div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">ویرایش گالری</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    @foreach($sponsors as $sponsor)
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="card card-stats">
                                                <div class="card-header card-header-warning card-header-icon">
                                                    <div class="card-icon">
                                                        <i class="material-icons">image</i>
                                                    </div>
                                                    <div class="card-body">
                                                        <form action="{{route('cms.sponsor.del',$sponsor->id)}}" method="post" class="my-2">
                                                            @csrf
                                                            <img src="{{asset('img/sponsor/'.$sponsor->photo)}}" style="width: 150px;height: 150px">
                                                            <button class="btn btn-danger btn-link" type="button" onclick="confirm('{{ __("string.delete.sure") }}') ? this.parentElement.submit() : ''">
                                                                <i class="material-icons">close</i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <script>
        $("#photo").on("input", function () {
            let img = new Image();
            img.src = window.URL.createObjectURL(this.files[0]);
            img.onload = () => {
                if(img.width >= 120 && img.height >= 120){
                    alert("سایز عکس نامناسب است");
                    this.value = "";
                }
            }
        });
    </script>

    @endsection

