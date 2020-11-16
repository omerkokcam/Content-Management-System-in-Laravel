@extends('CMS.main')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Album <small>Add</small></h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <form class="form-horizontal form-label-left" action="{{route('CMS.albums.create_album')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}

                        @if ($errors->has('title'))
                            <div class="">
                                {{ $errors->first('title') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <h2>New Album Cover Photo</h2>
                            <div class="col-sm-12">
                                <input type="file" name="image" class="btn btn-default btn-sm" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <h2>New Title</h2>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="title" name="title" placeholder="New Title" required>
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
@endsection
