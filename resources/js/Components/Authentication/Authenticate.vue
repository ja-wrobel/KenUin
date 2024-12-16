<script setup>
    import { useAuthModalStore } from '../../../stores/authModal';
    import LoginComponent from './LoginComponent.vue';
    import RegisterComponent from './RegisterComponent.vue';
    import { computed, onMounted, onUnmounted, watch } from 'vue';

    const auth_modal_store = useAuthModalStore();

    const getAuthModalType = computed(() => {
        return auth_modal_store.calledFor;
    });

    const getIsSmallDevice = computed(() => {
        return auth_modal_store.isSmallDevice;
    });

    /** @param {boolean} boolean  */
    function setIsSmallDevice(boolean) {
        auth_modal_store.$patch({isSmallDevice: boolean});
    };

    function close() {
        auth_modal_store.hide();
    };

    function handleResize() {
        const header_height = document.getElementsByTagName('header')[0].clientHeight;
        const window_height = window.innerHeight;
        const window_width = window.innerWidth;
        const rem_value = parseFloat(getComputedStyle(document.documentElement).fontSize);
        /**
         * Height calculations for big authentication container.
         *
         * Based on `Authenticate.css`:
         * - for `login` class: `height: clamp(470px, 60vh - 5rem + 15vw, 800px)`;
         * - for `register` class: `height: clamp(540px, 75vh + 5vw, 1400px)`;
         * @type {number}
         */
        let big_auth_height = 0;

        if (getAuthModalType.value === 'login') {
            big_auth_height = (0.6 * window_height) + (0.15 * window_width) - (5 * rem_value);
            big_auth_height = big_auth_height < 470 ? 470 : big_auth_height;
        }
        else {
            big_auth_height = (0.75 * window_height) + (0.05 * window_width);
            big_auth_height = big_auth_height < 540 ? 540 : big_auth_height;
        }

        if (window_height < (header_height + big_auth_height) && getIsSmallDevice.value !== true) {
            setIsSmallDevice(true);
        }
        else if (window_height > (header_height + big_auth_height) && getIsSmallDevice.value === true) {
            setIsSmallDevice(false);
        }
    };

    onMounted(()=>{
        handleResize();
        window.addEventListener('resize', handleResize);
    });

    onUnmounted(()=>{
        window.removeEventListener('resize', handleResize);
    });

    watch(getAuthModalType,
        () => handleResize(),
    );
</script>

<template>
    <div :class="`auth ${getAuthModalType} ${getIsSmallDevice === true ? 'small' : ''}`">
        <button class="close button" @click="close">
            X
        </button>

        <LoginComponent v-if="getAuthModalType === 'login'" />

        <RegisterComponent v-else-if="getAuthModalType === 'register'" />

    </div>
    <div class="mask"></div>
</template>
