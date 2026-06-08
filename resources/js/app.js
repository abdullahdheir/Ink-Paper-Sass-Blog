import Alpine from "alpinejs";
import axios from "axios";
axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
axios.defaults.headers.common["X-CSRF-TOKEN"] = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

window.axios = axios;
window.Alpine = Alpine;

Alpine.start();

