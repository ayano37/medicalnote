@extends('layouts.admin')
@section('title', '登録済みマイデータの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>データ一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\MedicalController@add') }}" role="button" class="btn btn-primary">新規追加</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\MedicalController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">検索</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="10%">体温</th>
                                <th width="10%">体重</th>
                                <th width="10%">生理開始日</th>
                                <th width="10%">生理終了日</th>
                                <th width="40%">ケガ情報</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $medical)
                                <tr>
                                    <th>{{ $medical->id }}</th>
                                    <td>{{ \Str::limit($medical->temperature, 10) }}</td>
                                    <td>{{ \Str::limit($medical->weight, 10) }}</td>
                                    <td>{{ \Str::limit($medical->period_s, 20) }}</td>
                                    <td>{{ \Str::limit($medical->period_f, 20) }}</td>
                                    <td>{{ \Str::limit($medical->injury, 250) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\MedicalController@edit', ['id' => $medical->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('Admin\MedicalController@delete', ['id' => $medical->id]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>    
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection