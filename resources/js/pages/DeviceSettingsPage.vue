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
                <LinkNav :title="'API'" @click="this.selectTab('APITab')" :active="this.currentTab === 'APITab'"></LinkNav>
                <LinkNav :title="'Пользователи'" @click="this.selectTab('UsersTab')" :active="this.currentTab === 'UsersTab'"></LinkNav>

                <CategoryNav :title="'Управление'"></CategoryNav>
                <LinkNav :title="'Ошибки'" @click="this.selectTab('APIErrorsTab')" :active="this.currentTab === 'APIErrorsTab'"></LinkNav>
                <LinkNav :title="'Состояния'" @click="this.selectTab('APIStatusesTab')" :active="this.currentTab === 'APIStatusesTab'"></LinkNav>
                <LinkNav :title="'Статистика'" @click="this.selectTab('APIStatsTab')" :active="this.currentTab === 'APIStatsTab'"></LinkNav>
                <LinkNav :title="'Команды'" @click="this.selectTab('APICommandsTab')" :active="this.currentTab === 'APICommandsTab'"></LinkNav>
            </VerticalNavigation>
            <div class="w-full p-4" ref="tabs">
                <KeepAlive include="a,b">
                    <component :is="this.currentTab" :device="getDevice"/>
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
import APITab from "../components/devices/settings/APITab.vue";
import APIErrorsTab from "../components/devices/settings/APIErrorsTab.vue";
import APICommandsTab from "../components/devices/settings/APICommandsTab.vue";
import APIStatusesTab from "../components/devices/settings/APIStatusesTab.vue";
import APIStatsTab from "../components/devices/settings/APIStatsTab.vue";

export default {
    components: {
        VerticalNavigation,
        LinkNav,
        CategoryNav,
        DataTab,
        UsersTab,
        APITab,
        APIErrorsTab,
        APICommandsTab,
        APIStatusesTab,
        APIStatsTab
    },
    data() {
        return {
            tabs: ['DataTab', 'UsersTab', 'APIErrorsTab', 'APICommandsTab', 'APIStatusesTab', 'APIStatsTab'],
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
            'loadDevice',
            'loadErrors',
            'loadStatuses'
        ]),
        selectTab(tabName) {
            this.currentTab = tabName;
        }
    },
    beforeMount() {
        this.loadDevice(this.$route.params.deviceID);
        this.loadErrors(this.$route.params.deviceID);
        this.loadStatuses(this.$route.params.deviceID);
    }
}
</script>

<style scoped>

</style>
