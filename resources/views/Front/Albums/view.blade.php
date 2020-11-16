@extends('Front.main')
@section('content')
    <section id="article-section" class="line">
        <div class="margin">
            <!-- ARTICLES -->
            <div class="s-12 l-12">
                <!-- ARTICLE 1 -->
                <article class="margin-bottom">
                    <div class="post-1 line">
                        <!-- image -->
                        <div class="s-12 l-11 post-image">
                            <img src="{{asset('images/albums/' . \App\Models\Albums::find($album->id)->title . "/".\App\Models\Albums::find($album->id)->img_url )}}" height="600px">
                        </div>
                        <!-- date -->
                        <div class="s-12 l-1 post-date">
                            @php
                                $myDate=new Carbon\Carbon($album->created_at);
                                $day=$myDate->format('j');
                                $month=$myDate->format('M');
                            @endphp
                            <p class="date">{{$day}}</p>
                            <p class="month">{{$month}}</p>
                        </div>
                    </div>
                    <!-- text -->
                    <div class="post-text">
                        <h1>{{$album->title}}</h1>
                        @php {{$i=1;}} @endphp
                        @foreach($photos as $photo)
                            <h2>Photo {{$i}}</h2>
                            <div class="s-12 l-3 post-image">
                                <img src="{{asset('images/albums/' . \App\Models\Albums::find($album->id)->title . "/".\App\Models\Photos::find($photo->id)->img_url )}}">
                            </div>
                            @php $i=$i+1; @endphp
                        @endforeach
                    </div>
                </article>
            </div>
            <!-- SIDEBAR -->
        </div>
    </section>
@endsection