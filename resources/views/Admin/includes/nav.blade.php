<div class="card " style="border-radius: 0px">
    <div class="card-body p-3">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <span>
                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z" />
                    </svg>
                </span>
                <span class="mx-1">
                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M21,19V20H3V19L5,17V11C5,7.9 7.03,5.17 10,4.29C10,4.19 10,4.1 10,4A2,2 0 0,1 12,2A2,2 0 0,1 14,4C14,4.1 14,4.19 14,4.29C16.97,5.17 19,7.9 19,11V17L21,19M14,21A2,2 0 0,1 12,23A2,2 0 0,1 10,21" />
                    </svg>
                </span>
            </div>
            <div class="d-flex align-items-center">

                <div class="dropdown mx-2" >
                    <span style="cursor: pointer" class="dropdown-toggle show" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12 4C10.08 4 8.5 5.58 8.5 7.5C8.5 8.43 8.88 9.28 9.5 9.91C7.97 10.91 7 12.62 7 14.5C7 17.53 9.47 20 12.5 20C14.26 20 16 19.54 17.5 18.66L16.5 16.93C15.28 17.63 13.9 18 12.5 18C10.56 18 9 16.45 9 14.5C9 12.91 10.06 11.53 11.59 11.12L16.8 9.72L16.28 7.79L11.83 9C11.08 8.9 10.5 8.28 10.5 7.5C10.5 6.66 11.16 6 12 6C12.26 6 12.5 6.07 12.75 6.2L13.75 4.47C13.22 4.16 12.61 4 12 4Z" />
                        </svg>
                    </span>
                    <div class="dropdown-menu"  style="margin: 0px; position: absolute; inset: 0px auto auto 0px; transform: translate3d(0px, 31px, 0px);" data-popper-placement="bottom-start">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li>
                            <a rel="alternate" class="dropdown-item" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach
                    </div>
                </div>
                <div class="dropdown">
                    <span style="cursor: pointer" class="dropdown-toggle show" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <div class="d-flex align-items-center ">
                        <span class="mx-2">
                            jksa altifani osan
                        </span>
                        <img src="{{asset('undraw_profile_pic_ic5t.png')}}" width="30px" height="30px" alt="">
                    </div>
                    </span>
                    <div class="dropdown-menu"  style="margin: 0px; position: absolute; inset: 0px auto auto 0px; transform: translate3d(0px, 31px, 0px);" data-popper-placement="bottom-start">
                        <a href="{{route('setting')}}" style="color:#000">
                            <div class=" px-3">
                                <div class="d-flex justify-content-between">
                                    <span>Setting</span>
                                    <span class="icon">
                                        <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M12,15.5A3.5,3.5 0 0,1 8.5,12A3.5,3.5 0 0,1 12,8.5A3.5,3.5 0 0,1 15.5,12A3.5,3.5 0 0,1 12,15.5M19.43,12.97C19.47,12.65 19.5,12.33 19.5,12C19.5,11.67 19.47,11.34 19.43,11L21.54,9.37C21.73,9.22 21.78,8.95 21.66,8.73L19.66,5.27C19.54,5.05 19.27,4.96 19.05,5.05L16.56,6.05C16.04,5.66 15.5,5.32 14.87,5.07L14.5,2.42C14.46,2.18 14.25,2 14,2H10C9.75,2 9.54,2.18 9.5,2.42L9.13,5.07C8.5,5.32 7.96,5.66 7.44,6.05L4.95,5.05C4.73,4.96 4.46,5.05 4.34,5.27L2.34,8.73C2.21,8.95 2.27,9.22 2.46,9.37L4.57,11C4.53,11.34 4.5,11.67 4.5,12C4.5,12.33 4.53,12.65 4.57,12.97L2.46,14.63C2.27,14.78 2.21,15.05 2.34,15.27L4.34,18.73C4.46,18.95 4.73,19.03 4.95,18.95L7.44,17.94C7.96,18.34 8.5,18.68 9.13,18.93L9.5,21.58C9.54,21.82 9.75,22 10,22H14C14.25,22 14.46,21.82 14.5,21.58L14.87,18.93C15.5,18.67 16.04,18.34 16.56,17.94L19.05,18.95C19.27,19.03 19.54,18.95 19.66,18.73L21.66,15.27C21.78,15.05 21.73,14.78 21.54,14.63L19.43,12.97Z" />
                                        </svg>
                                    </span>
                                </div>
                                <hr class="p-0 my-2  ">
                            </div>
                        </a>
                        <form class="d-none" action="{{route('logout')}}" method="post" id='Logout'>
                            @csrf
                        </form>
                        <a href="#" style="color:#000" onclick="document.getElementById('Logout').submit()">
                            <div class="px-3">
                                <div class="d-flex justify-content-between">
                                    <span>Logout </span>
                                    <span class="icon">
                                        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M16,17V14H9V10H16V7L21,12L16,17M14,2A2,2 0 0,1 16,4V6H14V4H5V20H14V18H16V20A2,2 0 0,1 14,22H5A2,2 0 0,1 3,20V4A2,2 0 0,1 5,2H14Z" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
