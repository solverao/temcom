<div>
    <x-temcom::button.circular x-show="darkMode" icon="fas-sun" sr="sun" x-cloak
        @click="darkMode = false; localStorage.setItem('dark_mode', darkMode)" />

    <x-temcom::button.circular x-show="!darkMode" icon="fas-moon" sr="moon" x-cloak
        @click="darkMode = true; localStorage.setItem('dark_mode', darkMode)" />
</div>