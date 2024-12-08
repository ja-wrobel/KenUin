import { defineStore } from "pinia";

export const useAuthStateStore = defineStore('authState', {
    state: () => ({
        show: false,
        calledFor: "none",
    }),
    actions: {
        logIn() {
            if (this.show === true) {
                this.show = false;
                return;
            }
            this.show = true;
            this.calledFor = "login";
        },
        register() {
            if (this.show === true) {
                this.show = false;
                return;
            }
            this.show = true;
            this.calledFor = "register";
        },
        hide() {
            this.show = false;
            this.calledFor = "none";
        }
    }
});
