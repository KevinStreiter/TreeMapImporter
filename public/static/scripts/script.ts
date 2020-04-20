let Vue = require('vue/dist/vue');
import  '../css/main.css';
import '../../../node_modules/bulma/css/bulma.css';
import '../../../node_modules/@fortawesome/fontawesome-free/css/all.css';

window.onload = () => {
    initPage();
};

function initPage() {

    new Vue({
        el: '#main',
        methods: {
            onFileChange(e) {
                let files:any = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createSVG(files[0]);
            },
            createSVG(file) {
                if(file.type === 'image/svg+xml') {
                    let svgContainer:HTMLBodyElement = <HTMLBodyElement> document.getElementById('svgContainer')
                    let obj:HTMLObjectElement = <HTMLObjectElement> document.createElement('object');
                    obj.setAttribute("class","container");
                    obj.data = URL.createObjectURL(file);
                    obj.onload = e => URL.revokeObjectURL(obj.data);
                    svgContainer.appendChild(obj);
                }
            }
        }
    });

}
