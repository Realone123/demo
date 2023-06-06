@extends('layouts.admin.layout')
@section('title')
<title>{{  $websiteLang->where('lang_key','terms_cond')->first()->custom_text }}</title>
@endsection
@section('admin-content')
    <!-- DataTales Example -->
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="{{ route('admin.terms-conditions.update',$conditionPrivacy->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="terms_condition">{{ $websiteLang->where('lang_key','terms_cond')->first()->custom_text }}</label>
                            <textarea class="summernote" id="summernote" name="terms_condition">{{ $conditionPrivacy->terms_condition }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success">{{ $websiteLang->where('lang_key','update')->first()->custom_text }} </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
