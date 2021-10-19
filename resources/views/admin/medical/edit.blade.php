@extends('layouts.admin')
@section('title', 'マイページの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>マイページの編集</h2>
                <form action="{{ action('Admin\MedicalController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                     <div class="form-group" style="display:inline-flex" step="0.1">
                        <label class="col-md-2">体温</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="temperature" step="0.1" value="{{ $medical_form->temperature }}">℃
                        </div>
                        <label class="col-md-2">体重</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="weight" value="{{ $medical_form->weight }}">kg
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">生理開始日</label>
                        <div class="col-md-3">
                            <input type="date" name="period_s" value="{{ $medical_form->period_s }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">生理終了日</label>
                        <div class="col-md-3">
                            <input type="date" name="period_f" value="{{ $medical_form->period_f }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">ケガ情報</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="injury" rows="20">{{ $medical_form->injury }}</textarea>
                        </div>
                    </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $medical_form->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $medical_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection