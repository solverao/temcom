<div>
    <x-temcom::button.ghost x-show="darkMode" size="small" svg="fas-sun" x-cloak
        @click="darkMode = false; localStorage.setItem('dark_mode', darkMode)" />

    <x-temcom::button.ghost x-show="!darkMode" size="small" svg="fas-moon" x-cloak
        @click="darkMode = true; localStorage.setItem('dark_mode', darkMode)" />
</div>