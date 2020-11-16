@extends('CMS.main')
@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Submenu <small>Add</small></h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <form class="form-horizontal form-label-left" action="{{route('CMS.albums.create_photo')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group">
                            <h2>Select Album</h2>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <select name="album_id" class="form-control">
                                    @foreach($albums as $album)
                                        <option value="{{$album->id}}">{{$album->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <h2>New Photo</h2>
                            <div class="col-sm-12">
                                <input type="file" name="image" class="btn btn-default btn-sm" required>
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
