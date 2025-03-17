<header class="banner bg-neutral-900 sticky top-0 z-50">
  {{-- branding moved to resources/views/components/navigation.blade.php --}}
  @if (has_nav_menu('primary_navigation'))
    @php
      // Check if ACF function exists and get the option value
      $use_megamenu = function_exists('get_field') ? get_field('use_megamenu', 'option') : false;
    @endphp
    
    @if ($use_megamenu)
      <x-mega-menu name="primary_navigation" />
    @else
      <x-navigation name="primary_navigation" />
    @endif
  @endif
</header>
