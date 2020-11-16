@extends('CMS.main')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Albums <small>List</small></h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_content">
                        <table class="table table-striped projects">
                            <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 40%">Album Name</th>
                                <th style="width: 40%">Photo</th>
                                <th style="width: 10%">Created Date</th>
                                <th style="width: 10%">Updated Date</th>
                                <th style="width: 15%">Edit/Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php {{$i=1;}} @endphp
                            @php {{$x=1;}} @endphp
                            @foreach($albums as $album)
                                <tr>
                                    <td style="width: 5%">{{$i}}</td>
                                    <td style="width: 40%">
                                        <a>{{$album->title}} Album Cover</a>
                                    </td>
                                    <td style="width: 40%">
                                        <img style="width: 50%;" src="{{asset('images/albums/' . \App\Models\Albums::find($album->id)->title. "/". \App\Models\Albums::find($album->id)->img_url)}}" width="200" height="200">
                                    </td>
                                    <td style="width: 10%">
                                        <small>{{$album->created_at}}</small>
                                    </td>
                                    <td style="width: 10%">
                                        <small>{{$album->updated_at}}</small>
                                    </td>
                                    <td style="width: 15%">
                                        <a href="{{route('CMS.albums.edit', $album->id)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                        <a href="{{route('CMS.albums.delete_album', $album->id)}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                    </td>
                                </tr>

                                @foreach(\App\Models\Photos::where('album_id', $album->id)->get() as $photos)
                                    <tr>
                                        <td style="width: 5%">{{$i}}.{{$x}}</td>
                                        <td style="width: 40%">
                                            <a>{{$album->title}} Photo {{$x}}</a>
                                        </td>
                                        <td style="width: 40%">
                                            <img style="width: 50%;" src="{{asset('images/albums/' . \App\Models\Albums::find($album->id)->title. "/". \App\Models\Photos::find($photos->id)->img_url)}}" width="200" height="200">
                                        </td>
                                        <td style="width: 10%">
                                            <small>{{$photos->created_at}}</small>
                                        </td>
                                        <td style="width: 15%">
                                            <a href="{{route('CMS.albums.edit_photo_screen', $photos->id)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                            <a href="{{route('CMS.albums.delete_photo', $photos->id)}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                        </td>
                                    </tr>
                                    @php $x=$x+1; @endphp
                                @endforeach

                                @php $i=$i+1; @endphp
                                @php $x=1; @endphp
                            @endforeach
                            </tbody>
                        </table>
                        <!-- end project list -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
