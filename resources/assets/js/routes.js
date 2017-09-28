import VueRouter from 'vue-router';

let routes = [
	{
		name: "Members",
		path: '/',
		component: require('./components/Member.vue')
	}
]

export default new VueRouter({
	routes: routes,
	mode: 'history',
  	base: __dirname,
	linkIsActive: 'is-active'
})