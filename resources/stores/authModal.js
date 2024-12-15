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
            this.show = true;
            this.calledFor = "login";
        },
        register() {
            if (this.show === true && this.calledFor === "register") {
                this.hide();
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
