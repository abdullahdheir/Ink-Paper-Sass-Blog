/**
 * resources/js/app.js
 *
 * Load the js of application.
 */

import Alpine from "alpinejs";
import axios from "axios";
import Quill from "quill";
import { share } from "./utils/share";
import "./utils/ajax"; // sets up global axios config and ajaxError class
import ajax from "./utils/ajax";
import "./articles/main";
import TomSelect from "tom-select";

axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
axios.defaults.headers.common["X-CSRF-TOKEN"] = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");

window.axios = axios;
window.Alpine = Alpine;
window.share = share;
window.Quill = Quill;
window.TomSelect = TomSelect;
window.ajax = ajax;

Alpine.start();
