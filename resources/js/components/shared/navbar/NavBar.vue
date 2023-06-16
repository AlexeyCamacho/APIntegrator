<template>
    <div class="navbar bg-base-100 shadow">
        <div class="flex-1">
            <div class="dropdown">
                <label tabindex="0" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
                </label>
                <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                    <router-link :to="{ name: 'DevicesPage'}"><li><a>Устройства</a></li></router-link>
                    <router-link :to="{ name: 'StatisticsPage'}"><li><a>Статистика</a></li></router-link>
                </ul>
            </div>

            <a class="font-semibold text-xl px-4">APIntegrator</a>

            <ul class="menu menu-horizontal px-1 hidden lg:flex space-x-2">
                <router-link :to="{ name: 'DevicesPage'}"><li><a>Устройства</a></li></router-link>
                <router-link :to="{ name: 'StatisticsPage'}"><li><a>Статистика</a></li></router-link>
            </ul>
        </div>

        <div class="flex-none">
            <div class="dropdown dropdown-end">
                <button class="btn btn-ghost btn-circle">
                    <div class="indicator">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>
                        <span class="badge badge-xs badge-primary indicator-item"></span>
                    </div>
                </button>
            </div>
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img src="https://turbomaster-nsk.ru/wp-content/uploads/2023/03/volkswagen-%D0%B7%D0%BD%D0%B0%D0%BA.jpg" />
                    </div>
                </label>
                <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                    <li>
                        <a class="justify-between">
                            Profile
                            <span class="badge">New</span>
                        </a>
                    </li>
                    <li><a>Settings</a></li>
                    <li><a>Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>


export default {
    data() {
        return {

        }
    },
    methods: {

    },
    components: {

    },
    computed: {

    },
}

</script>

<style>
a.router-link-active li a {
    background-color: rgb(196 181 253);
}
</style>
