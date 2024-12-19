import page2 from '@/views/page2.vue'
import page1 from '@/views/page1.vue'
import page3 from '@/views/page3.vue'
import HomePage from '@/views/HomePage.vue'
import { createRouter, createWebHistory } from 'vue-router'
import Header from '@/components/Header.vue'


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'App',
      component: Header
    }
    // {
    //   path: '/page1',
    //   name: 'Page1',
    //   component: page1
    // },
    // {
    //   path: '/page2',
    //   name: 'Page2',
    //   component: page2
    // },
    // {
    //   path: '/page3',
    //   name: 'Page3',
    //   component: page3
    // }
  ],
})

export default router
