@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        <h1>My Page</h1>
        @if (!is_null($headline))
            <div class="row">
                <div class="headline col-md-10 mx-auto">
                    <div class="row">
                        <div class="date col-md-10">
                            {{ $headline->updated_at->format('Y年m月d日') }}
                        </div>
                        <div class="col-md-10">
                            <p class="temperature mx-auto">体温：{{ str_limit($headline->temperature, 650) }}</p>
                        </div>
                        <div class="col-md-10">
                            <p class="weight mx-auto">体重：{{ str_limit($headline->weight, 650) }}</p>
                        </div>
                        <div class="col-md-10">
                            <p class="period_s mx-auto">生理開始日：{{ str_limit($headline->period_s, 650) }}</p>
                        </div>
                        <div class="col-md-10">
                            <p class="period_f mx-auto">生理終了日：{{ str_limit($headline->period_f, 650) }}</p>
                        </div>
                        <div class="col-md-10">
                            <p class="injury mx-auto">ケガ情報：{{ str_limit($headline->injury, 650) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif 
        <div class="right-side-container">
            @if (!is_null($headline))
            <div class="row">
                <div class="profile col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                                <div class="image">
                                    @if ($headline->image_path)
                                        <img src="{{ asset('storage/image/' . $headline->image_path) }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="temperature">
                                    <h2>体温：</h2>
                                    {{ str_limit($post->temperature, 150) }}
                                </div>
                                <div class="weight mt-3">
                                    <h3>体重：</h3>
                                    {{ str_limit($post->weight, 150) }}
                                </div>
                                <div class="period_s mt-3">
                                    <h4>生理開始日：</h4>
                                    {{ str_limit($post->period_s, 150) }}
                                </div>
                                <div class="period_f mt-3">
                                    <h5>生理終了日：</h5>
                                    {{ str_limit($post->period_f, 150) }}
                                </div>
                                <div class="injury mt-3">
                                    <h6>ケガ情報：</h6>
                                    {{ str_limit($post->injury, 1500) }}
                                </div>
                            </div>
                            <div class="image col-md-6 text-right mt-4">
                                @if ($post->image_path)
                                    <img src="{{ asset('storage/image/' . $post->image_path) }}">
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection