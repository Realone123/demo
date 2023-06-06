@extends('layouts.user.profile.layout')
@section('title')
    <title>{{ $websiteLang->where('lang_key','order')->first()->custom_text }}</title>
@endsection
@section('user-dashboard')
<div class="row">
    <div class="col-xl-9 ms-auto">
        <div class="wsus__dashboard_main_content">
          <div class="wsus__dash_invoice">

            <div class="wsus__dash_info p_25 mb_25">
              <div class="row">
                <div class="col-xl-6 col-md-6">
                  <div class="invoice_left">
                    <a href="{{ route('home') }}">
                      <img src="{{ asset($logo->logo) }}" alt="topland" class="img-fluid">
                    </a>
                    <h4>{{ $order->user->name }}</h4>
                    <p>{{ $order->user->email }}</p>
                    @if ($order->user->phone)
                    <p>{{ $order->user->phone }}</p>
                    @endif
                    @if ($order->user->address)
                    <p>{{ $order->user->address }}</p>
                    @endif
                  </div>
                </div>
                <div class="col-xl-6 col-md-6">
                  <div class="invoice_left invoice_right">
                    <h4>{{ $websiteLang->where('lang_key','order_id')->first()->custom_text }}: {{ $order->order_id }}</h4>
                    <p>{{ $websiteLang->where('lang_key','amount')->first()->custom_text }}: {{ $order->currency_icon }}{{ $order->amount_real_currency }}</p>
                    @if ($order->payment_method)
                    <p>{{ $websiteLang->where('lang_key','payment')->first()->custom_text }}: {{ $order->payment_method }}</p>
                    @endif
                    @if ($order->transaction_id)
                    <p>{{ $websiteLang->where('lang_key','trans_id')->first()->custom_text }}: {!! clean(nl2br(e($order->transaction_id))) !!} </p>
                    @endif
                  </div>
                </div>
                <div class="col-12">
                  <div class="table-responsive">
                      <table class="table">
                        <tr>
                            <th class="packages">{{ $websiteLang->where('lang_key','package')->first()->custom_text }}</th>
                            <th class="p_date">{{ $websiteLang->where('lang_key','purchase_date')->first()->custom_text }}</th>
                            <th class="e_date">{{ $websiteLang->where('lang_key','expired_date')->first()->custom_text }}</th>
                            <th class="amount">{{ $websiteLang->where('lang_key','amount')->first()->custom_text }}</th>
                        </tr>
                        <tr>
                            <td class="packages">
                                {{ $order->package->package_name }}
                            </td>
                            <td class="p_date">
                                {{ $order->purchase_date }}
                            </td>
                            <td class="e_date">
                                {{ $order->expired_date == null ? 'Unlimited' :$order->expired_date }}
                            </td>
                            <td class="amount">
                                {{ $order->currency_icon }}{{ $order->amount_real_currency }}
                            </td>
                        </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <a onclick="window.print()" href="javascript:;" class="common_btn invoice_print">{{ $websiteLang->where('lang_key','print')->first()->custom_text }}</a>
          </div>
        </div>
    </div>
</div>
@endsection
