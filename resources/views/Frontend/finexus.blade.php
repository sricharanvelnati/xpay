@extends('layouts.app')
@section('title', 'X-Pay')
@section('content')
    <!-- country code css -->
    <link type="text/css" rel="stylesheet" href="{{URL::to('public/Frontassets/css/intlTelInput.css')}}">
    <link type="text/css" rel="stylesheet"
          href="{{URL::to('public/Frontassets/css/bootstrap-datetimepicker.min.css')}}">
    <section>
        <div class="container">
            <form method="post" name="finexus" id="finexus" action="{{URL::to('card/finexus-store')}}">
                @if(!empty($errors->all()))
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <span> {{ $error }} </span><br/>
                        @endforeach
                    </div>
                @endif
                @csrf
                <div class="form-group ">
                    <label class="radio-label">{{__('finexus.title')}}:</label>
                    <div class="cstm-radio custom-control-inline">
                        <input type="radio" id="Mr" name="title" value="mr"
                               {{old('title') == 'mr'? 'checked':''}} required>
                        <label for="Mr">{{__('finexus.mr')}}.</label>
                    </div>
                    <div class="cstm-radio custom-control-inline">
                        <input type="radio" id="Ms" name="title" value="ms"
                               {{old('title') == 'ms'? 'checked':''}} required>
                        <label for="Ms">{{__('finexus.ms')}}.</label>
                    </div>
                    <div class="cstm-radio custom-control-inline">
                        <input type="radio" id="Mrs" name="title" value="mrs"
                               {{old('title') == 'mrs'? 'checked':''}} required>
                        <label for="Mrs">{{__('finexus.mrs')}}.</label>
                    </div>
                </div>
                <div class="form-group form-label-group">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name-field"
                           name="name" value="{{Auth::user()->first_name}} {{Auth::user()->last_name}}"
                           placeholder="{{__('finexus.nric_name')}}" required>
                    <label for="name-field">{{__('finexus.nric_name')}}</label>
                </div>
                <div class="form-group form-label-group">
                    <input type="text" class="form-control @error('nric_no') is-invalid @enderror" id="nrc-no-field"
                           name="nric_no" value="{{ old('nric_no') }}"
                           placeholder="{{__('finexus.nric_no')}}">
                    <label for="nrc-no-field">{{__('finexus.nric_no')}}</label>
                </div>
                <div class="form-group form-label-group">
                    <input type="text" class="form-control @error('passport_no') is-invalid @enderror" id="passport_no"
                           name="passport_no" value="{{ old('passport_no') }}"
                           placeholder="{{__('finexus.passport_no')}}">
                    <label for="passport_no">{{__('finexus.passport_no')}}</label>
                </div>
{{--                <div class="form-group form-label-group">--}}
{{--                    <input type="text" class="form-control @error('dob') is-invalid @enderror" id="dob-field" name="dob"--}}
{{--                           value="{{ old('dob') }}"--}}
{{--                           placeholder="{{__('finexus.dob')}}" required>--}}
{{--                    <label for="dob-field">{{__('finexus.dob')}}</label>--}}
{{--                </div>--}}
                <div class="form-group">
                    <div class='input-group date' id='datetimepicker1'>
                        <input placeholder="{{__('finexus.dob')}}" type="text" class="form-control @error('dob') is-invalid @enderror" id="dob-field" name="dob"
                               value="{{ old('dob') }}" autocomplete="false"  required>
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>

                    </div>
                </div>
                <div class="form-group">
                    <label class="radio-label">{{__('finexus.sex')}}:</label>
                    <div class="cstm-radio custom-control-inline">
                        <input type="radio" id="Male" name="sex" value="male"
                               {{old('sex') == 'male'? 'checked':''}} required>
                        <label for="Male">{{__('finexus.male')}}</label>
                    </div>
                    <div class="cstm-radio custom-control-inline">
                        <input type="radio" id="Female" name="sex" value="female"
                               {{old('sex') == 'female'? 'checked':''}} required>
                        <label for="Female">{{__('finexus.female')}}</label>
                    </div>
                </div>
                <div class="form-group form-label-group">
                    <input type="text" class="form-control @error('nationality') is-invalid @enderror"
                           id="nationality-field" name="nationality" value="{{ old('nationality') }}"
                           placeholder="{{__('finexus.nationality')}}" required>
                    <label for="nationality-field">{{__('finexus.nationality')}}</label>
                </div>
                <div class="form-group form-label-group">
                    <input type="text" class="form-control" id="mail_address-field" name="mail_address"
                           value="{{Auth::user()->address1 .' '. Auth::user()->address2  }}"
                           placeholder="{{__('finexus.mailing_address')}}" required>
                    <label for="mail_address-field">{{__('finexus.mailing_address')}}</label>
                </div>

                <div class="form-group form-label-group">
                    <input type="text" class="form-control @error('m_country') is-invalid @enderror"
                           id="m_country-field" name="m_country" value="{{Auth::user()->d_country}}"
                           placeholder="{{__('finexus.country')}}" required>
                    <label for="m_country-field">{{__('finexus.country')}}</label>
                </div>
                <div class="form-group form-label-group">
                    <input type="text" class="form-control @error('m_postalcode') is-invalid @enderror"
                           id="m_postalcode-field" name="m_postalcode" value="{{Auth::user()->pincode}}"
                           placeholder="{{__('finexus.nationality')}}" required>
                    <label for="m_postalcode-field">{{__('finexus.postalcode')}}</label>
                </div>
                <div class="form-group form-label-group">
                    <input type="text" class="form-control @error('m_state') is-invalid @enderror" id="m_state-field"
                           name="m_state" value="{{Auth::user()->state}}" placeholder="{{__('finexus.state')}}"
                           required>
                    <label for="m_state-field">{{__('finexus.state')}}</label>
                </div>
                <div class="form-group ">
                    <div class="cstm-check custom-control-inline">
                        <input type="checkbox" id="check" name="same" class="is_same"
                               value="yes" {{old('same') == 'yes'? 'checked':''}} >
                        <label for="check">{{__('finexus.same_address')}}.</label>
                    </div>
                </div>
                <div class="form-group form-label-group">
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="res_address"
                           name="address"
                           value="{{ old('address') }}"
                           placeholder="{{__('finexus.res_address')}}" required>
                    <label for="res_address">{{__('finexus.res_address')}}</label>
                </div>
                <div class="form-group form-label-group">
                    <input type="text" class="form-control @error('country') is-invalid @enderror" id="country-field"
                           name="country" value="{{ old('country') }}"
                           placeholder="{{__('finexus.country')}}" required>
                    <label for="country-field">{{__('finexus.country')}}</label>
                </div>
                <div class="form-group form-label-group">
                    <input type="text" class="form-control @error('pincode') is-invalid @enderror" id="pincode-field"
                           name="pincode" value="{{ old('pincode') }}"
                           placeholder="{{__('finexus.pincode')}}" required>
                    <label for="pincode-field">{{__('finexus.postalcode')}}</label>
                </div>
                <div class="form-group form-label-group">
                    <input type="text" class="form-control @error('state') is-invalid @enderror" id="state-field"
                           name="state" value="{{ old('state') }}" placeholder="{{__('finexus.state')}}" required>
                    <label for="state-field">{{__('finexus.state')}}</label>
                </div>


                <div class="form-group">
                    <input type="tel" id="phone" class="form-control" name="mobile"
                           value="{{Auth::user()->contactNumber}}"
                           placeholder="{{ __('finexus.mobile') }}" required>
                    <input type="hidden" id="countryCode" class="form-control" name="c_code"
                           value="{{Auth::user()->countryCode}}">
                    <input type="hidden" id="countryName" class="form-control" name="countryName"
                           value="{{Auth::user()->countryName}}">
                </div>
                <div class="form-group form-label-group">
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email-field"
                           name="email" value="{{Auth::user()->email}}"
                           placeholder="{{__('finexus.email')}}" required>
                    <label for="email-field">{{__('finexus.email')}}</label>
                </div>
                <div class="form-group form-label-group">
                    <input type="text" class="form-control @error('security') is-invalid @enderror" id="security-field"
                           name="security" value="{{ old('security') }}"
                           placeholder="{{__('finexus.security')}}" required>
                    <label for="security-field">{{__('finexus.security')}}:</label>
                </div>
                <div class="form-group">
                    <div id="signature"></div>
                    <div class="clearfix"><label class="italic-label">{{__('finexus.sign')}}.</label>
                        <button class="btn btn-secondary float-right" type="button"
                                onclick="$('#signature').jSignature('clear')">Clear
                        </button>
                    </div>
                    <input type="hidden" name="signimage" id="signimage">
                </div>
                <div class="text-center">
                    <button type="button" class="btn btn-primary submit-fineux">{{__('finexus.payment')}}</button>
                </div>
            </form>
        </div>
    </section>
@endsection
@section('front-footer')
    <script src="{{URL::to('public/Frontassets/js/jSignature.min.js')}}"></script>
    <script src="{{URL::to('public/Frontassets/js/intlTelInput.js')}}"></script>
    <script src="{{URL::to('public/Frontassets/js/utils.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{URL::to('public/Frontassets/js/bootstrap-datetimepicker.min.js')}}"></script>
    {{--    <script src="{{URL::to('public/Frontassets/js/custom.js')}}"></script>--}}
    <script>
        $(document).ready(function () {
            $("#signature").jSignature({color: "#000", "background-color": "#fff"});
            // http://www.unbolt.net/jSignature/

            // multi language start
            var local = '{{app()->getLocale()}}';
            if (local === 'en') {
                $('#lang-drop').text('English');
            } else {
                $('#lang-drop').text('中文');
            }


                $('#datetimepicker1 input').datetimepicker({
                    format: 'DD-MM-YYYY',
                    useCurrent: false,
                    icons: {
                        date: 'far fa-calendar-alt',
                        previous: 'fas fa-chevron-left',
                        next: 'fas fa-chevron-right',
                        today: 'fas fa-calendar-day',
                    },
                });

            $('#datetimepicker1 input').attr("placeholder","{{__('finexus.dob')}}");
//multi language end

// country code start
            var input = document.querySelector("#phone");
            var iti = window.intlTelInput(input, {
                utilsScript: "utils.js",
            });
            iti.setCountry($('#countryName').val());

            input.addEventListener("countrychange", function () {
                var countryData = iti.getSelectedCountryData();

                $('#countryCode').val(countryData.dialCode);
                $('#countryName').val(countryData.iso2);
            });
// country code end
        })

        $(document).on('click', '.submit-fineux', function () {
            var image = $('#signature').jSignature('getData');
            $('#signimage').val(image);

            $('#finexus').submit();
        });
        $(document).on('click', '.is_same', function () {

            if ($(this).prop("checked") == true) {
                $('#res_address').val($('#mail_address-field').val());
                $('#res_address').siblings('label').addClass('freeze');
                $('#country-field').val($('#m_country-field').val());
                $('#country-field').siblings('label').addClass('freeze');
                $('#pincode-field').val($('#m_postalcode-field').val());
                $('#pincode-field').siblings('label').addClass('freeze');
                $('#state-field').val($('#m_state-field').val());
                $('#state-field').siblings('label').addClass('freeze');
            } else {
                $('#res_address').val('');
                $('#res_address').siblings('label').removeClass('freeze');
                $('#country-field').val('');
                $('#country-field').siblings('label').removeClass('freeze');
                $('#pincode-field').val('');
                $('#pincode-field').siblings('label').removeClass('freeze');
                $('#state-field').val('');
                $('#state-field').siblings('label').removeClass('freeze');
            }


        });
    </script>
@endsection
