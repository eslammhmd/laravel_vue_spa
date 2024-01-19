// import './bootstrap';

import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';

// Import components
import App from './components/App.vue';
import ProductList from './components/ProductList.vue';
import ProductForm from './components/ProductForm.vue';
import Product from './components/Product.vue';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/', component: ProductList },
        { path: '/student/create', component: ProductForm },
        { path: '/student/:id', component: Product },
        { path: '/student/:id/edit', component: ProductForm },
    ]
});

const app = createApp(App);
app.use(router);
app.mount('#app');  //fire app
