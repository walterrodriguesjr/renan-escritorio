
<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 fixed top-0 w-full z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                {{-- <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                       <img src="./img/Renan_Rodrigues_Marca_principal_azul_Impressão_3.png" alt=""
                            style="width: 100px; height: 25px;">
                    </a>
                </div> --}}

                    <a class="nav-link" data-widget="pushmenu" id="qqq" href="#"><i class="fa fa-bars" style="margin-top: 18px; color: grey"></i></a>


                <!-- Navigation Links -->
                {{-- <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Home') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('clientes')" :active="request()->routeIs('clientes')">
                        {{ __('Clientes') }}
                    </x-nav-link>
                </div> --}}
            </div>

            <!-- Settings Dropdown -->
            {{-- <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Sair') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div> --}}

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Home') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('clientes')" :active="request()->routeIs('clientes')">
                {{ __('Clientes') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Sair') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

<script src="{{ asset('js/jquery.min.js') }}"></script>

<script>
    $(document).ready(function() {
        var $spanTeste = $('#span-teste'); // Seleciona o elemento com o ID #span-teste

      var $sidebar = $('.main-sidebar');
      var $navLinks = $sidebar.find('.nav-link'); // Seleciona todos os links do menu
      var $menuToggle = $('#qqq'); // Elemento de âncora do botão de menu
      var $contentDiv = $('.min-h-screen.bg-gray-100'); // Seleciona a div que você quer alterar a margem
      var sidebarExpanded = false; // Variável para controlar o estado do sidebar
  
      // Adiciona um manipulador para o evento de passar o mouse
      $sidebar.on('mouseenter', function() {
        if (!sidebarExpanded) {
          $sidebar.addClass('expanded'); // Adiciona a classe 'expanded' para expandir o sidebar
          $navLinks.find('p').show(); // Mostra os textos dos links
        }
      });
  
      // Adiciona um manipulador para o evento de sair com o mouse
      $sidebar.on('mouseleave', function() {
        if (!sidebarExpanded) {
          $sidebar.removeClass('expanded'); // Remove a classe 'expanded' para recuar o sidebar
          $navLinks.find('p').hide(); // Oculta os textos dos links
        }
      });
  
      // Adiciona um manipulador para o evento de clicar no botão de menu
      $menuToggle.on('click', function() {
        sidebarExpanded = !sidebarExpanded; // Alterna o estado do sidebar
        
        if (sidebarExpanded) {
          $sidebar.addClass('expanded');
          $contentDiv.css('margin-left', '250px');
          $spanTeste.css('display', 'block'); // Mostra o span quando o sidebar expande
          $navLinks.find('p').show(); // Mostra os textos dos links
        } else {
          $sidebar.removeClass('expanded');
          $contentDiv.css('margin-left', '80px');
          $spanTeste.css('display', 'none'); // Oculta o span quando o sidebar recua
          $navLinks.find('p').hide(); // Oculta os textos dos links
        }
      });
    });
  </script>
  
