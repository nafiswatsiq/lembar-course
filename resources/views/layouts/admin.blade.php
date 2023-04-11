<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="./assets/img/favicon.png" />
    <title>Soft UI Dashboard Tailwind</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
 
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    <link href="{{ asset('assets') }}/css/styles.css?v=1.0.3" rel="stylesheet" />
    @stack('styles')
    @vite(['resources/css/app.css'])
    @livewireStyles
  </head>

  <body class="m-0 font-sans antialiased font-normal text-base leading-default bg-gray-50 text-slate-500">
    <x-notifications z-index="z-50" />
    <!-- sidenav  -->
    @include('layouts.navbars.sidebar-admin')
    <!-- end sidenav -->

    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
      <!-- Navbar -->
      <livewire:admin.navbar />
      <!-- end Navbar -->

      <!-- cards -->
      @yield('content')
      <!-- end cards -->
    </main>

    @livewireScripts
    @wireUiScripts
    @vite(['resources/js/app.js'])
    @livewire('livewire-ui-modal')
    @stack('scripts')
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- main script file  -->
    <script src="{{ asset('assets') }}/js/soft-ui-dashboard-tailwind.js?v=1.0.3" async></script>
  
  </body>
</html>
