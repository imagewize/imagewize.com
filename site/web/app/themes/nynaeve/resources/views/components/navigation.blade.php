@php($menu = Navi::build($name))
@if ($menu->isNotEmpty())
<nav class="w-full z-30 top-0 py-1">
    <div class="w-full container flex flex-wrap items-center justify-between mt-0 px-6 py-3">
      <!-- Toggle icon starts -->
      <label for="menu-toggle" class="cursor-pointer md:hidden block">
        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
            <title>menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
        </svg>
      </label>
      <input class="peer hidden" type="checkbox" id="menu-toggle" />
      <!-- Toggle icon ends -->
       <!-- Logo starts -->
      <div id="logo">
          <a class="brand flex items-center tracking-wide no-underline hover:no-underline font-bold text-white text-xl uppercase" href="{{ home_url('/') }}">
              {!! $siteName !!}
          </a>
      </div>
      <!-- Logo ends -->
      <!-- Menu starts -->
      <div id="menu" class="hidden peer-checked:block md:flex md:items-center 
      w-full md:w-auto absolute top-12 md:static">
        <ul class="md:flex items-center justify-between text-base pt-4 md:pt-0">
          @foreach ($menu->all() as $item)
            <li class="group my-menu-item relative {{ $item->classes ?? '' }} {{ $item->active ? 'active' : '' }} 
            flex md:block py-2 px-4 no-underline 
              font-open-sans text-textBodyGray hover:text-white">
              <a href="{{ $item->url }}" class="inline-block">
                {{ $item->label }}
                @if ($item->children)
                  <svg class="ml-1 inline-block w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
                @endif
              </a>
              @if ($item->children)
                <!-- Child menu items start -->
                <ul class="hidden md:group-hover:block md:absolute md:top-full md:left-0 md:min-w-[200px] md:bg-white md:shadow-lg md:z-50 text-base text-gray-700">
                  @foreach ($item->children as $child)
                    <li class="my-child-item {{ $child->classes ?? '' }} {{ $child->active ? 'active' : '' }} block no-underline hover:text-black hover:bg-gray-100 py-2 px-4">
                      <a href="{{ $child->url }}">
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
         <!-- account login icon -->
        <a class="inline-block no-underline hover:text-black" href="/my-account/">
            <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <circle fill="none" cx="12" cy="7" r="3" />
                <path d="M12 2C9.243 2 7 4.243 7 7s2.243 5 5 5 5-2.243 5-5S14.757 2 12 2zM12 10c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3S13.654 10 12 10zM21 21v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h2v-1c0-2.757 2.243-5 5-5h4c2.757 0 5 2.243 5 5v1H21z" />
            </svg>
        </a>
        <!-- social media icons -->
        <a class="pl-3 inline-block no-underline hover:text-black" href="/cart">
            <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M21,7H7.462L5.91,3.586C5.748,3.229,5.392,3,5,3H2v2h2.356L9.09,15.414C9.252,15.771,9.608,16,10,16h8 c0.4,0,0.762-0.238,0.919-0.606l3-7c0.133-0.309,0.101-0.663-0.084-0.944C21.649,7.169,21.336,7,21,7z M17.341,14h-6.697L8.371,9 h11.112L17.341,14z" />
                <circle cx="10.5" cy="18.5" r="1.5" />
                <circle cx="17.5" cy="18.5" r="1.5" />
            </svg>
        </a>

    </div>
    </div> <!-- navigation container end -->
@endif