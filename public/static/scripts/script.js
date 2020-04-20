"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
var Vue = require('vue/dist/vue');
require("../css/main.css");
require("../../../node_modules/bulma/css/bulma.css");
require("../../../node_modules/@fortawesome/fontawesome-free/css/all.css");
window.onload = function () {
    initPage();
};
function initPage() {
    new Vue({
        el: '#main',
        methods: {
            onFileChange: function (e) {
                var files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createSVG(files[0]);
            },
            createSVG: function (file) {
                if (file.type === 'image/svg+xml') {
                    var svgContainer = document.getElementById('svgContainer');
                    var obj_1 = document.createElement('object');
                    obj_1.setAttribute("class", "container");
                    obj_1.data = URL.createObjectURL(file);
                    obj_1.onload = function (e) { return URL.revokeObjectURL(obj_1.data); };
                    svgContainer.appendChild(obj_1);
                }
            }
        }
    });
}
