@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Email adresinizi doğrulayın!') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Yeni bir onay postası sizin hesabınıza gönderilmiştir.') }}
                        </div>
                    @endif

                    {{ __('İşlem yapmaya başlamadan önce lütfen onay postası için posta kutunuzu kontrol ediniz.') }}
                    {{ __('Eğer onay postası size ulaşmadıysa') }}, <a href="{{ route('verification.resend') }}">{{ __('başka bir tane göndermek için buraya tıklayınız.') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
