<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { onMounted, ref } from "vue";

import CookieBanner from "@/components/CookieBanner.vue";
import FooterGuest from "@/components/FooterGuest.vue";
import NavbarGuest from "@/components/NavbarGuest.vue";
import ScrollProgress from "@/components/ScrollProgress.vue";

defineProps({
	title: {
		type: String,
		default: "Welcome to App",
		required: true,
	},
});

const network = ref(null)
const createNeuralNetwork = () => {
	if (!network.value) return
	const nodeCount = 50

	for (let i = 0; i < nodeCount; i++) {
		const node = document.createElement('div')
		node.className = 'neural-node'
		node.style.left = Math.random() * 100 + '%'
		node.style.top = Math.random() * 100 + '%'
		node.style.animationDelay = Math.random() * 2 + 's'
		network.value.appendChild(node)

		if (i % 5 === 0) {
			const connection = document.createElement('div')
			connection.className = 'neural-connection'
			connection.style.left = Math.random() * 100 + '%'
			connection.style.top = Math.random() * 100 + '%'
			connection.style.width = Math.random() * 200 + 100 + 'px'
			connection.style.transform = `rotate(${Math.random() * 360}deg)`
			connection.style.animationDelay = Math.random() * 3 + 's'
			network.value.appendChild(connection)
		}
	}
}

onMounted(() => {
	createNeuralNetwork();
})
</script>

<template>
	<Head><title>{{ title }}</title></Head>
	<CookieBanner />

	<div class="quantum-bg"></div>
	<div class="neural-network" id="neuralNetwork"></div>

	<ScrollProgress />
	<NavbarGuest />

	<div class="guest-layout">
		<slot />
	</div>

	<FooterGuest />

</template>

<style>
@import "@template/assets/scss/landing.scss";
</style>