@php($menu = Navi::build($name))  
@if ($menu->isNotEmpty())
<nav class="w-full z-30 top-0 py-1" role="navigation" aria-label="Main navigation">
    <div class="w-full container flex flex-wrap items-center justify-between mt-0 px-8 py-6">
      <!-- Toggle icon starts -->
      <label for="menu-toggle" class="cursor-pointer md:hidden block" aria-label="Toggle menu">
        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
            <title>menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
        </svg>
      </label>
      <input class="peer hidden" type="checkbox" id="menu-toggle" aria-hidden="true" />
      <!-- Toggle icon ends -->
       <!-- Logo starts -->
      <div id="logo" role="banner">
          <a class="brand flex items-center tracking-wide no-underline hover:no-underline font-bold text-white text-xl 
          uppercase" href="{{ home_url('/') }}">
              {!! $siteName !!}
          </a>
      </div>
      <!-- Logo ends -->
      <!-- Menu starts -->
      <div id="menu" class="hidden peer-checked:block md:flex md:items-center 
      w-full md:w-auto absolute top-12 left-0 md:static bg-neutral-900 md:bg-none" role="menubar">
        <ul class="md:flex items-center justify-between text-sm pt-4 md:pt-0">
          @foreach ($menu->all() as $item)
            <li class="group my-menu-item relative {{ $item->classes ?? '' }} {{ $item->active ? 'active 
            after:absolute after:left-1/2 after:bottom-0 after:w-10 after:h-[3px] after:-ml-[21px] after:bg-neutral-600 
            after:content-[""] after:block after:transition-all after:duration-300 after:ease-in-out' : '' }} 
            flex md:block py-2 px-4 no-underline 
              font-open-sans text-textBodyGray hover:text-white" role="none">
              <a href="{{ $item->url }}" 
                 role="menuitem" 
                 @if ($item->children) 
                   aria-expanded="false"
                   aria-haspopup="true"
                 @endif
                 class="inline-block">
                {{ $item->label }}
                @if ($item->children)
                  <svg class="ml-1 inline-block w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                @endif
              </a>
              @if ($item->children)
                <!-- Child menu items start -->
                <ul class="hidden md:group-hover:block md:absolute md:top-full md:left-0 md:min-w-[200px] 
                md:bg-neutral-900 md:shadow-lg md:z-50 text-sm text-textBodyGray"
                    role="menu" 
                    aria-label="{{ $item->label }} submenu">
                  @foreach ($item->children as $child)
                    <li class="my-child-item {{ $child->classes ?? '' }} {{ $child->active ? 'active' : '' }} block no-underline 
                     py-2 px-4 hover:text-white" role="none">
                      <a href="{{ $child->url }}" role="menuitem">
                        {{ $child->label }}
                      </a>
                    </li>
                  @endforeach
                </ul>
                <!-- Child menu items end -->
              @endif
            </li>
          @endforeach
        </ul>
      </div> <!-- Menu ends -->
      <div class="flex items-center" id="nav-content">
         <!-- facebook icon -->
        <a class="inline-block no-underline " href="/my-account/" aria-label="Facebook Account">
        <x-css-facebook class="fill-current text-white hover:text-textBodyGray w-6 h-6 ml-3" />
        </a>
        <!-- github icons -->
        <a class="pl-3 inline-block no-underline" href="/cart" aria-label="Github">
          <x-bi-github class="text-white hover:text-textBodyGray" />
        </a>
    </div>
    </div> <!-- navigation container end -->
@endif