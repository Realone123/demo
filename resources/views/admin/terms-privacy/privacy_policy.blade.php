@extends('layouts.admin.layout')
@section('title')
<title>{{  $websiteLang->where('lang_key','privacy_policy')->first()->custom_text }}</title>
@endsection
@section('admin-content')
    <!-- DataTales Example -->
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                    <div class="card-body">
                        @if ($privacy)
                        <form action="{{ route('admin.update-privacy-policy') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="privacy_policy">{{  $websiteLang->where('lang_key','privacy_policy')->first()->custom_text }}</label>
                                <textarea class="summernote " id="summernote" name="privacy_policy">{{ $privacy->privacy_policy }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-success">{{  $websiteLang->where('lang_key','save')->first()->custom_text }} </button>
                        </form>
                        @else
                        <form action="{{ route('admin.update-privacy-policy') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="privacy_policy">{{  $websiteLang->where('lang_key','privacy_policy')->first()->custom_text }}</label>
                                <textarea class="summernote" id="summernote" name="privacy_policy"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">{{  $websiteLang->where('lang_key','save')->first()->custom_text }} </button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
