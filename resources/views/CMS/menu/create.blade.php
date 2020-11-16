@extends('CMS.main')
@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Menu <small>Add</small></h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <form class="form-horizontal form-label-left" action="{{route('CMS.menus.create_post')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <h2>Menu Title</h2>
                                <div class="col-sm-12">
                                    <input id="title" name="title" type="text" class="form-control" placeholder="Menu Title">
                                </div>
                            </div>
                            <div class="form-group">
                                <h2>Menu Content</h2>
                                <div class="col-sm-12">
                                    <textarea id="summernote" name="content" class="summernote"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <h2>Menu Order</h2>
                                <div class="col-sm-12">
                                    <input id="order" name="order" type="number" class="form-control" placeholder="New Order">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('CMS/vendors/summernote/summernote.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('#summernote').summernote();
        });
    </script>
@endsection

@section('styles')
    <link href="{{asset('CMS/vendors/summernote/summernote.css')}}" rel="stylesheet" type="text/css">
@endsection