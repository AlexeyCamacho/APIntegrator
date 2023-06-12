<template>
    <Disclosure as="nav" class="bg-white shadow" v-slot="{ open }">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button -->
                    <DisclosureButton class="z-10 inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none">
                        <span class="sr-only">Open main menu</span>
                        <Bars3Icon v-if="!open" class="block h-6 w-6" aria-hidden="true" />
                        <XMarkIcon v-else class="block h-6 w-6" aria-hidden="true" />
                    </DisclosureButton>
                </div>
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex flex-shrink-0 items-center">
                        <div class="block h-8 w-auto lg:hidden">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M24.4148 12.23L16.3564 13.5064L15.0801 5.44792L18.4711 0.780487L27.8059 7.56264L24.4148 12.23Z" fill="#7BA4DB"/>
                                    <path d="M13.6436 13.5064L14.92 5.44792L11.5289 0.780557L2.19414 7.56264L5.58511 12.2301L13.6436 13.5064Z" fill="#7BA4DB"/>
                                    <path d="M5.53553 12.3824L12.8052 16.0864L9.10116 23.3561L3.61433 25.1389L0.0487061 14.1651L5.53553 12.3824Z" fill="#7BA4DB"/>
                                    <path d="M9.23088 23.4503L15.0001 17.6811L20.7693 23.4503V29.2195H9.23088V23.4503Z" fill="#7BA4DB"/>
                                    <path d="M17.1948 16.0864L20.8989 23.3561L26.3859 25.1389L29.9514 14.1651L24.4646 12.3823L17.1948 16.0864Z" fill="#7BA4DB"/>
                                </svg>
                        </div>
                        <div class="hidden h-8 w-auto lg:block">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M24.4148 12.23L16.3564 13.5064L15.0801 5.44792L18.4711 0.780487L27.8059 7.56264L24.4148 12.23Z" fill="#7BA4DB"/>
                                    <path d="M13.6436 13.5064L14.92 5.44792L11.5289 0.780557L2.19414 7.56264L5.58511 12.2301L13.6436 13.5064Z" fill="#7BA4DB"/>
                                    <path d="M5.53553 12.3824L12.8052 16.0864L9.10116 23.3561L3.61433 25.1389L0.0487061 14.1651L5.53553 12.3824Z" fill="#7BA4DB"/>
                                    <path d="M9.23088 23.4503L15.0001 17.6811L20.7693 23.4503V29.2195H9.23088V23.4503Z" fill="#7BA4DB"/>
                                    <path d="M17.1948 16.0864L20.8989 23.3561L26.3859 25.1389L29.9514 14.1651L24.4646 12.3823L17.1948 16.0864Z" fill="#7BA4DB"/>
                                </svg>
                        </div>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <div class="hidden sm:-my-px sm:flex sm:space-x-8 ml-8" v-for="item in navigation">
                            <router-link
                                :key="item.name"
                                :to="item.href"
                                :class="[this.$route.path === item.href ? 'border-blue-400 text-gray-900' :
                                    'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700',
                                    'inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium']"
                            >
                                {{ item.name }}
                            </router-link>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

                    <!-- Profile dropdown -->
                    <Menu as="div" class="relative ml-3">
                        <div>
                            <MenuButton class="flex rounded-full bg-white text-sm">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                            </MenuButton>
                        </div>
                        <transition enter-active-class="transition ease-out duration-200" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                            <MenuItems class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                <MenuItem v-slot="{ active }">
                                    <a href="#" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Ваш профиль</a>
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                    <a href="#" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Настройки</a>
                                </MenuItem>
                                <template>
                                    <router-link :to="{ name: 'AdminPanel'}">
                                        <MenuItem v-slot="{ active }">
                                            <a :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Админ-панель</a>
                                        </MenuItem>
                                    </router-link>
                                </template>
                                <MenuItem v-slot="{ active }">
                                    <a :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Выход</a>
                                </MenuItem>
                            </MenuItems>
                        </transition>
                    </Menu>
                </div>
            </div>
        </div>

        <DisclosurePanel class="sm:hidden">
            <div class="space-y-1 pt-2 pb-4">
                <DisclosureButton as="a" class="block" v-for="item in navigation">
                    <router-link
                        :key="item.name"
                        :to="item.href"
                        :class="[this.$route.path === item.href ? 'block border-l-4 border-blue-400 bg-indigo-50 py-2 pl-3 pr-4 text-base font-medium text-neutral-700' :
                                    'block py-2 pl-3 pr-4 text-base font-medium text-neutral-700']"
                    >
                        {{ item.name }}
                    </router-link>
                </DisclosureButton>
            </div>
        </DisclosurePanel>

    </Disclosure>
</template>

<script>
import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { Bars3Icon, XMarkIcon } from '@heroicons/vue/24/outline'
import { useRouter, useRoute } from 'vue-router'
import {defineComponent} from "vue";


export default defineComponent({
    data() {
        return {
            navigation: [
                {name: 'Мероприятия', href: '/events', current: true},
                {name: 'Участники', href: '/members', current: false},
                {name: 'Аналитика', href: '/analytic', current: false},
                {name: 'Календарь', href: '/calendar', current: false},
            ]
        }
    },
    methods: {

    },
    components: {
        Bars3Icon,
        Disclosure,
        DisclosureButton,
        DisclosurePanel,
        Menu,
        MenuButton,
        MenuItem,
        MenuItems,
        XMarkIcon
    },
    computed: {

    },
})

</script>
