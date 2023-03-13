@extends('layouts.master');
@section('content')
    <style>
        .container-fluid {
            margin-top: -50px;
        }

        .image {
            height: 150px;
            ;
            width: 150px;
            border-radius: 50%;
        }
        .default
        {
            border-radius: 20%;
            border: 12px gray;
        }
    </style>

    <div class="container-fluid">

        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Profile</h3>
            </div>

        </div>
        <!-- Row -->

        <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="mt-3 text-center">
                            @isset($Profile->Image)
                                
                            
                            @if ($Profile->Image)
                                <img src="{{ 'public/uploads/profile/' . $Profile->Image }}" class="image " alt="">
                                @endisset
                                @else
                                <img src="{{ asset('Admin/profile/user.png') }}" class="image" />
                            @endif

                            <h4 class="card-title mt-2" style="font-family:Montserrat">{{ $Profile->user->name }}</h4>
                            <span class=>Accoubts Manager Amix corp</span>
                            {{-- <div class="row text-center justify-content-md-center">
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i
                                                    class="fa fa-user"></i>
                                                <i class="font-medium">254</i>
                                                <font class="font-medium">254</font>
                                            </a></div>
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i
                                                    class="fa fa-camera"></i>
                                                <font class="font-medium">54</font>
                                            </a></div>
                                    </div> --}}
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <!-- Tab panes -->
                    <div class="card-body">
                        <form class="form-horizontal form-material mx-2" method="POST" action="{{ url('UserProfile') }}"
                            enctype="multipart/form-data">
                            @csrf
                            @isset($Profile)
                                <input type="hidden" name="id" value="{{ $Profile->id }}">
                            @endisset
                            <div class="form-group">
                                <label class="col-md-12">Full Name</label>
                                <div class="col-md-12">
                                    @if ($Profile->Full_name)
                                        <input type="text" name="name" value="{{ $Profile->Full_name }}"
                                            placeholder="Name" class="form-control form-control-line">
                                    @else
                                        <input type="text" name="name" placeholder="Name"
                                            class="form-control form-control-line">
                                    @endif
                                </div>
                                @error('name')
                                    <span class="text-danger mx-3   ">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Phone No</label>

                                <div class="col-md-12">
                                    @if (!$Profile->Phone_no == '')
                                        <input type="tel" name="number" value="{{ $Profile->Phone_no }}"
                                            placeholder="0123-4567890" class="form-control form-control-line">
                                    @else
                                        <input type="tel" name="number" placeholder="0123-4567890"
                                            class="form-control form-control-line">
                                    @endif
                                </div>
                                @error('number')
                                    <span class="text-danger mx-3   ">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Address</label>
                                <div class="col-md-12">
                                    @if (!$Profile->Address == '')
                                        <textarea rows="5" name="address" class="form-control form-control-line">{{ $Profile->Address }}</textarea>
                                    @else
                                        <textarea rows="5" name="address" class="form-control form-control-line"></textarea>
                                    @endif
                                </div>
                                @error('address')
                                    <span class="text-danger mx-3   ">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Select Country</label>
                                <div class="col-sm-12">
                                    @if (!$Profile->city == '')
                                        <select class="form-control form-control-line" name="country">
                                            <option value="{{ $Profile->city }}">
                                                {{ $Profile->city }}</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="India">India</option>
                                            <option value="Usa">Usa</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Thailand">Thailand</option>
                                        </select>
                                    @else
                                        <select class="form-control form-control-line" name="country">
                                            <option value="">Select Country</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="India">India</option>
                                            <option value="Usa">Usa</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Thailand">Thailand</option>
                                        </select>
                                    @endif
                                </div>
                                @error('country')
                                    <span class="text-danger mx-3   ">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12">Select Language</label>
                                <div class="col-sm-12">
                                    @if (!$Profile->Language == '')
                                        <select class="form-control form-control-line" name="language">
                                            <option value="{{ $Profile->Language }}">
                                                {{ $Profile->Language }}</option>
                                            <option value="English">English</option>
                                            <option value="German">German</option>
                                        </select>
                                    @else
                                        <select class="form-control form-control-line" name="language">
                                            <option value="">Select Language</option>
                                            <option value="English">English</option>
                                            <option value="German">German</option>
                                        </select>
                                    @endif

                                </div>
                                @error('language')
                                    <span class="text-danger mx-3   ">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Github</label>
                                <div class="col-md-12">
                                    @if (!$Profile->Github == '')
                                        <input type="text" placeholder="Johnathan Doe"
                                            class="form-control form-control-line" value="{{ $Profile->Github }}"
                                            name="github">
                                    @else
                                        <input type="text" placeholder="Johnathan Doe"
                                            class="form-control form-control-line" name="github">
                                    @endif
                                </div>
                                @error('github')
                                    <span class="text-danger mx-3   ">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Twitter</label>
                                <div class="col-md-12">
                                    @if (!$Profile->Twitter == '')
                                        <input type="text" placeholder="Johnathan Doe"
                                            class="form-control form-control-line" value="{{ $Profile->Twitter }}"
                                            name="twitter">
                                    @else
                                        <input type="text" placeholder="Johnathan Doe"
                                            class="form-control form-control-line" value="" name="twitter">
                                    @endif
                                </div>
                                @error('twitter')
                                    <span class="text-danger mx-3   ">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Profile Image</label>
                                <div class="col-md-12">
                                    <input type="file" class="form-control " name="image">
                                </div>
                                @error('image')
                                    <span class="text-danger mx-3   ">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
    <script>
        function phoneMask() {
            var num = $(this).val().replace(/\D/g, '');
            $(this).val(num.substring(0, 4) + '-' + num.substring(4, 7) + num.substring(7, 11));
        }
        $('[type="tel"]').keyup(phoneMask);
    </script>
@endsection
