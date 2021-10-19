{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')


{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'マイデータの更新')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>マイデータ更新</h2>
                <form action="{{ action('Admin\MedicalController@create') }}" method="post" enctype="multipart/form-data">
                    
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group" style="display:inline-flex" step="0.1" >
                        <label class="col-md-2">体温</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="temperature" step="0.1">℃
                            //value="{{old(temperature)}}"はvalidationをしていないため削除
                        </div>
                        <label class="col-md-2">体重</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="weight">kg
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">生理開始日</label>
                        <div class="col-md-3">
                            <input type="date" name="period_s"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">生理終了日</label>
                        <div class="col-md-3">
                            <input type="date" name="period_f"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">ケガ情報</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="injury" rows="20"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection