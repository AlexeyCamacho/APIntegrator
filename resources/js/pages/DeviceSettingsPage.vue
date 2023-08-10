<template>
    <div class="text-sm breadcrumbs mt-4">
        <ul>
            <li @click="this.$router.push({ name: 'DevicesPage'})"><a>Устройства</a></li>
            <li @click="this.$router.push({ name: 'DevicePage', params: { deviceID: getDevice.id }})"><a>{{getDevice.name }}</a></li>
            <li>Настройки</li>
        </ul>
    </div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="flex flex-row">
            <VerticalNavigation>
                <CategoryNav :title="'Основное'"></CategoryNav>
                <LinkNav :title="'Данные устройства'" @click="this.selectTab('DataTab')" :active="this.currentTab === 'DataTab'"></LinkNav>
                <LinkNav :title="'Пользователи'" @click="this.selectTab('UsersTab')" :active="this.currentTab === 'UsersTab'"></LinkNav>

                <CategoryNav :title="'Управление'"></CategoryNav>
                <LinkNav :title="'Ошибки'"></LinkNav>
                <LinkNav :title="'Состояния'"></LinkNav>
                <LinkNav :title="'Статистика'"></LinkNav>
                <LinkNav :title="'Команды'"></LinkNav>
            </VerticalNavigation>
            <div class="w-full" ref="tabs">
                <KeepAlive include="a,b">
                    <component :is="this.currentTab" />
                </KeepAlive>
            </div>

        </div>
    </div>
</template>

<script>
import {mapActions, mapGetters} from "vuex";
import VerticalNavigation from "../components/shared/navbar/VerticalNavigation.vue";
import LinkNav from "../components/shared/navbar/LinkNav.vue";
import CategoryNav from "../components/shared/navbar/CategoryNav.vue";
import DataTab from "../components/devices/settings/DataTab.vue";
import UsersTab from "../components/devices/settings/UsersTab.vue";

export default {
    components: {
        VerticalNavigation,
        LinkNav,
        CategoryNav,
        DataTab,
        UsersTab
    },
    data() {
        return {
            tabs: ['DataTab', 'UsersTab'],
            currentTab: 'DataTab'
        }
    },
    computed: {
        ...mapGetters([
            'getDevice',
        ]),
    },
    methods: {
        ...mapActions([
            'loadDevice'
        ]),
        selectTab(tabName) {
            this.currentTab = tabName;
        }
    },
    beforeMount() {
        this.loadDevice(this.$route.params.deviceID);
    }
}
</script>

<style scoped>

</style>
