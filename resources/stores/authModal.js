import { defineStore } from "pinia";

export const useAuthModalStore = defineStore("authModal", {
    state: () => ({
        show: false,
        calledFor: "none",
        isSmallDevice: false,
    }),
    actions: {
        logIn() {
            if (this.show === true && this.calledFor === "login") {
                this.hide();
                return;
            }
            this.handleResize();
            this.show = true;
            this.calledFor = "login";
            window.addEventListener('resize', this.handleResize);
        },
        register() {
            if (this.show === true && this.calledFor === "register") {
                this.hide();
                return;
            }
            this.handleResize();
            this.show = true;
            this.calledFor = "register";
            window.addEventListener('resize', this.handleResize);
        },
        hide() {
            this.show = false;
            this.calledFor = "none";
            window.removeEventListener('resize', this.handleResize);
        },
        handleResize() {
            const window_height = window.innerHeight;

            if (window_height < 570 && this.isSmallDevice !== true) {
                this.isSmallDevice = true;
            }
            else if (window_height > 570 && this.isSmallDevice === true) {
                this.isSmallDevice = false;
            }
        }
    }
});
