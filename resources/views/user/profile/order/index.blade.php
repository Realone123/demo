@extends('layouts.user.profile.layout')
@section('title')
    <title>{{ $websiteLang->where('lang_key','order')->first()->custom_text }}</title>
@endsection
@section('user-dashboard')
<div class="row">
    <div class="col-xl-9 ms-auto">
        <div class="wsus__dashboard_main_content">
          <h4 class="heading">{{ $websiteLang->where('lang_key','order')->first()->custom_text }}</h4>
          <div class="wsus__dash_order mb_25">
            <div class="table-responsive">
              <table class="table">
                <tbody>
                  <tr>
                    <th  class="serial">{{ $websiteLang->where('lang_key','serial')->first()->custom_text }}</th>
                    <th class="package">{{ $websiteLang->where('lang_key','package')->first()->custom_text }}</th>
                    <th class="p_date">{{ $websiteLang->where('lang_key','purchase_date')->first()->custom_text }}</th>
                    <th class="e_date">{{ $websiteLang->where('lang_key','expired_date')->first()->custom_text }}</th>
                    <th class="price">{{ $websiteLang->where('lang_key','price')->first()->custom_text }}</th>
                    <th  class="action">{{ $websiteLang->where('lang_key','action')->first()->custom_text }}</th>

                  </tr>
                    @foreach ($orders as $index => $order)
                    <tr>
                        <td class="serial">{{ ++$index }}</td>
                        <td class="package">
                            {{ $order->package->package_name }}
                            <br>
                            @if ($order->status==1)
                                @if ($order->expired_date==null)
                                    <span class="custom-badge">{{ $websiteLang->where('lang_key','currently_active')->first()->custom_text }}</span>
                                @else
                                    @if (date('Y-m-d') < $order->expired_date)
                                        <span class="custom-badge">{{ $websiteLang->where('lang_key','currently_active')->first()->custom_text }}</span>
                                    @endif
                                @endif
                            @endif

                        </td>
                        <td class="p_date">{{ $order->purchase_date }}</td>
                        <td class="e_date">{{ $order->expired_date == null ? $websiteLang->where('lang_key','unlimited')->first()->custom_text :$order->expired_date }}</td>
                        <td class="price">{{ $order->currency_icon }}{{ $order->amount_real_currency }}</td>
                        <td class="action">
                            <a href="{{ route('user.order.details',$order->id) }}"> <i class="fa fa-eye" aria-hidden="true"></i> </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
          {{ $orders->links('user.paginator') }}
        </div>
    </div>
</div>
@endsection
