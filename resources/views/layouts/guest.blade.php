<!DOCTYPE html>

<!DOCTYPE html>
<html>
<head>
<title>{{ config('app.name', 'Blog Post') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    @livewireStyles
</head>
<body>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="mt-5 col-md-8">
                <div class="card">
                    <div class="card-header">

<nav class="relative w-full flex flex-wrap items-center justify-between py-4 bg-gray-100 text-gray-500 hover:text-gray-700 focus:text-gray-700 shadow-lg">
  <div class="container-fluid w-full flex flex-wrap items-center justify-between px-6">
    <div class="flex">
      <a class="flex items-center text-gray-900 hover:text-gray-900 focus:text-gray-900 mt-2 lg:mt-0 mr-1" href="{{ url('/dashboard') }}">
        <span class="font-medium">Home</span>
      </a>
&nbsp;&nbsp;&nbsp;
    

                      <!-- Authentication -->
                      <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-jet-responsive-nav-link>
                </form>

    </div>
  </div>
</nav>
        </div>

                    <div class="card-body">
                         
    {{ $slot }}
    
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
</script>
</body>
</html>