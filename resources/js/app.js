import { createApp } from 'vue'
import App from './App.vue'
import order_detail from './order_detail.vue'

const app = createApp(order_detail);
app.mount("#order_detail")