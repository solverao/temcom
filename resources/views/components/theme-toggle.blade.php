<div>
    <x-temcom::header.circular-button x-show="darkMode" icon="fas-sun" x-cloak
        @click="darkMode = false; localStorage.setItem('dark_mode', darkMode)" />

    <x-temcom::header.circular-button x-show="!darkMode" icon="fas-moon" x-cloak
        @click="darkMode = true; localStorage.setItem('dark_mode', darkMode)" />
</div>