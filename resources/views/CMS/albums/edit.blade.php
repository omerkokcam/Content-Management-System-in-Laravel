@extends('CMS.main')
@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Album <small>Edit</small></h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <form role="form" class="form-horizontal form-label-left" action="{{route('CMS.albums.edit_album', $album->id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <img style="width: 50%;" src="{{asset('images/albums/' . \App\Models\Albums::find($album->id)->title. "/". \App\Models\Albums::find($album->id)->img_url)}}" alt="image">
                        </div>
                        <div class="form-group">
                            <h2>New Album Image</h2>
                            <div class="col-sm-12">
                                <input type="file"name="image" class="btn btn-default btn-sm" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <h2>New Title</h2>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="title" name="title" value="{{$album->title}}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success">Edit/Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

