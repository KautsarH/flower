@extends('layouts.app1')

@section('content')

<style>
   .my-profile {
    label {
    display: block;
    }

    .form-control {
    margin-bottom: 30px;
    }

    input {
        border: 1px solid $text-color-light;
        padding: 16px 10px;
        border-radius: 5px;
        width: 66.6%;
        font-size: 14px;
    }

    .my-profile-button {
        background: $text-color;
        color: $white;
        border-radius: 5px;
        padding: 12px 50px;

        &:hover {
            background: lighten($text-color, 10%);
        }
    }
}
 </style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align:center">Welcome {{ Auth::user()->username }}!</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="products-section container">
        <div class="sidebar">

        </div> <!-- end sidebar -->
        <div class="my-profile">
            <div class="products-header">
                <h1 class="stylish-heading" style="text-align:center">My Account</h1>
            </div>


            <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">{{ auth()->user()->name }}</div>
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
                            <div class="col-md-6">{{ auth()->user()->username }}</div>
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                            <div class="col-md-6">{{ auth()->user()->email }}</div>
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>
                            <div class="col-md-6">{{ auth()->user()->phone_no }}</div>
                        </div>

                        <div class="btn-group">
									<a href="{{ route('admin.edit', $user) }}" class="btn btn-success">
										{{ __('Edit') }}
									</a>
								</div>
                </div>

            <div class="spacer"></div>
        </div>
    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
