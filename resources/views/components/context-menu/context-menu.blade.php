<div class="hs-dropdown [--trigger:contextmenu] relative z-48">
  <div class="hs-dropdown-toggle">
    {{ $trigger }}
  </div>

  <div
    class="hs-dropdown-menu hidden min-w-60 bg-white shadow-md rounded-lg mt-2 dark:bg-gray-800 dark:border dark:border-gray-700"
    role="menu" aria-orientation="vertical" aria-labelledby="hs-default">
    <div class="p-1 space-y-0.5 border-b border-gray-200 dark:border-gray-800">
      {{ $content }}
    </div>
  </div>
</div>