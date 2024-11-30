<header class="banner bg-neutral-900">
  {{-- branding moved to resources/views/components/navigation.blade.php --}}
  @if (has_nav_menu('primary_navigation'))
    <x-navigation name="primary_navigation" />
  @endif
</header>
