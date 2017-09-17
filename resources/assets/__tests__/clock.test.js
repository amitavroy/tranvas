import Vue from 'vue/dist/vue.js';
import timemachine from 'timemachine';
import Clock from './../js/components/Clock.vue';

describe('vue clock component', () => {
    Vue.component('clock', Clock);

    beforeEach(() => {
        timemachine.config({
            dateString: 'December 25, 1991 13:12:59'
        });

        document.body.innerHTML = `
            <div id="app">
                <p>Hello World!</p>
                <clock></clock>
            </div>
        `;
    });

    it('clock shows the current time', async () => {
        await createVm();

        expect(document.body.innerHTML).toMatchSnapshot();
    });
});

async function createVm() {
    const vm = new Vue({
        el: '#app',
    });

    await Vue.nextTick();

    return vm.$children[0];
}
