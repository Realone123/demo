@extends('layouts.user.profile.layout')
@section('title')
    <title>{{ $websiteLang->where('lang_key','pricing_plan')->first()->custom_text }}</title>
@endsection
@section('user-dashboard')
<div class="row">
    <div class="col-xl-9 ms-auto">
        <div class="wsus__dashboard_main_content">
          <div class="wsus__my_property">
            <h4 class="heading">{{ $websiteLang->where('lang_key','pricing_plan')->first()->custom_text }}</h4>
            <div class="row">
              @foreach ($packages as $item)
                <div class="col-xl-6 col-xxl-4 col-md-6 col-lg">
                    <div class="wsus__single_price">
                    <h4>{{ $item->package_name }}</h4>
                    <div class="wsus__round_area">
                        <h3>{{ $currency->currency_icon }}{{ $item->price }}</h3>
                        @if ($item->number_of_days==-1)
                        <p>{{ $websiteLang->where('lang_key','unlimited')->first()->custom_text }}</p>
                        @else
                        <p>{{ $item->number_of_days }} {{ $websiteLang->where('lang_key','days')->first()->custom_text }}</p>
                        @endif
                        <i class="fab fa-canadian-maple-leaf right"></i>
                    </div>
                    <ul>

                        @if ($item->number_of_property==-1)
                        <li>{{ $websiteLang->where('lang_key','unlimited_pro_submission')->first()->custom_text }}</li>
                        @else
                        <li>{{ $item->number_of_property }} {{ $websiteLang->where('lang_key','pro_submission')->first()->custom_text }}</li>
                        @endif

                        @if ($item->number_of_aminities==-1)
                        <li>{{ $websiteLang->where('lang_key','unlimited_aminity')->first()->custom_text }}</li>
                        @else
                        <li>{{ $item->number_of_aminities }} {{ $websiteLang->where('lang_key','aminity')->first()->custom_text }}</li>
                        @endif

                        @if ($item->number_of_nearest_place==-1)
                        <li>{{ $websiteLang->where('lang_key','unlimited_nearest_place')->first()->custom_text }}</li>
                        @else
                        <li>{{ $item->number_of_nearest_place }} {{ $websiteLang->where('lang_key','nearest_place')->first()->custom_text }}</li>
                        @endif
                        @if ($item->number_of_photo==-1)
                        <li>{{ $websiteLang->where('lang_key','unlimited_photo')->first()->custom_text }}</li>
                        @else
                        <li>{{ $item->number_of_photo }} {{ $websiteLang->where('lang_key','photo')->first()->custom_text }}</li>
                        @endif

                        @if ($item->is_featured==1)
                            <li>{{ $websiteLang->where('lang_key','featured_property')->first()->custom_text }}</li>
                        @else
                        <li class="delete">{{ $websiteLang->where('lang_key','featured_property')->first()->custom_text }}</li>
                        @endif

                        @if ($item->number_of_feature_property==-1)
                        <li>{{ $websiteLang->where('lang_key','unlimited_feature_property')->first()->custom_text }}</li>
                        @else
                        <li>{{ $item->number_of_feature_property }} {{ $websiteLang->where('lang_key','featured_property')->first()->custom_text }}</li>
                        @endif


                        @if ($item->is_top==1)
                            <li>{{ $websiteLang->where('lang_key','top_property')->first()->custom_text }}</li>
                        @else
                        <li class="delete">{{ $websiteLang->where('lang_key','top_property')->first()->custom_text }}</li>
                        @endif
                        @if ($item->number_of_top_property==-1)
                        <li>{{ $websiteLang->where('lang_key','unlimited_top_property')->first()->custom_text }}</li>
                        @else
                        <li>{{ $item->number_of_top_property }} {{ $websiteLang->where('lang_key','top_property')->first()->custom_text }}</li>
                        @endif


                        @if ($item->is_urgent==1)
                            <li>{{ $websiteLang->where('lang_key','urgent_property')->first()->custom_text }}</li>
                        @else
                        <li class="delete">{{ $websiteLang->where('lang_key','urgent_property')->first()->custom_text }}</li>
                        @endif
                        @if ($item->number_of_urgent_property==-1)
                        <li>{{ $websiteLang->where('lang_key','unlimited_urgent_property')->first()->custom_text }}</li>
                        @else
                        <li>{{ $item->number_of_urgent_property }} {{ $websiteLang->where('lang_key','urgent_property')->first()->custom_text }}</li>
                        @endif
                    </ul>
                    @if ($item->package_type == 0)
                    <a href="javascript:;" onclick="freeEnroll('{{ $item->id }}')" class="common_btn">{{ $websiteLang->where('lang_key','start_with')->first()->custom_text }} {{ $item->package_name }}</a>
                    @else

                    <a href="{{ route('user.purchase.package',$item->id) }}" class="common_btn">{{ $websiteLang->where('lang_key','start_with')->first()->custom_text }} {{ $item->package_name }}</a>
                    @endif
                    </div>
                </div>
            @endforeach
            </div>
          </div>
        </div>
    </div>
</div>


<script>
    function freeEnroll(id){
        Swal.fire({
            title: "{{ $websiteLang->where('lang_key','are_you_sure')->first()->custom_text }}",
            text: "{{ $websiteLang->where('lang_key','upgrade_plan')->first()->custom_text }}",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "{{ $websiteLang->where('lang_key','enrol_it')->first()->custom_text }}",
            cancelButtonText: "{{ $websiteLang->where('lang_key','cancel')->first()->custom_text }}",
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    "{{ $websiteLang->where('lang_key','enrolled')->first()->custom_text }}",
                    "{{ $websiteLang->where('lang_key','free_enroll')->first()->custom_text }}",
                    'success'
                )
                location.href = "{{ url('user/purchase-package/') }}" + "/" + id;
            }
        })
    }
</script>


@endsection
