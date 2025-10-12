<script setup>
import icon from '@template/assets/img/icons/icon-wrc.png';
</script>

<template>
	<footer class="wrc-footer">
		<div class="wrc-container">
			<div class="wrc-footer-grid">
				<div>

					<div class="d-flex align-items-center gap-3 mb-4">
						<img :src="icon" alt="WRC Logo" style="height: 40px;">
						<span class="fw-bold fs-4" style="color: var(--wrc-gold-primary);">
							World Recycling Coin
						</span>
					</div>

					<p class="text-muted mb-4 text-center text-md-start">
						Revolucionando el reciclaje con tecnología blockchain.
						Construyendo un futuro sostenible, un token a la vez.
					</p>

					<div class="d-flex align-items-center justify-content-center justify-content-md-start gap-3">
						<a href="https://twitter.com/GeaWrc" target="_blank" class="text-muted">
							<i class="fab fa-twitter fa-lg"></i>
						</a>
						<a href="https://www.instagram.com/geawrc" target="_blank" class="text-muted">
							<i class="fab fa-instagram fa-lg"></i>
						</a>
						<a href="https://www.facebook.com/geawrc" target="_blank" class="text-muted">
							<i class="fab fa-facebook fa-lg"></i>
						</a>
						<a href="https://t.me/tokenwrc" target="_blank" class="text-muted">
							<i class="fab fa-telegram fa-lg"></i>
						</a>
					</div>
				</div>

				<div>
					<h4>Producto</h4>
					<a href="#" class="wrc-footer-link">App Móvil</a>
					<a href="#" class="wrc-footer-link">Dashboard Web</a>
					<a href="#" class="wrc-footer-link">API Developers</a>
					<a href="#" class="wrc-footer-link">Whitepaper</a>
				</div>

				<div>
					<h4>GEA-WRC</h4>
					<a href="#" class="wrc-footer-link">Soluciones Empresariales</a>
					<a href="#" class="wrc-footer-link">Plantas Industriales</a>
					<a href="#" class="wrc-footer-link">Franquicias</a>
					<a href="#" class="wrc-footer-link">Casos de Éxito</a>
				</div>

				<div>
					<h4>Soporte</h4>
					<a href="#" class="wrc-footer-link">Centro de Ayuda</a>
					<a href="#" class="wrc-footer-link">Contacto</a>
					<a href="#" class="wrc-footer-link">Status</a>
					<a href="#" class="wrc-footer-link">Términos</a>
				</div>
			</div>

			<div class="border-top pt-4 mt-4" style="border-color: rgba(255, 215, 0, 0.1) !important;">
				<div class="row align-items-center">
					<div class="col-md-6">
						<p class="text-muted mb-0">
							© 2024 World Recycling Coin. Todos los derechos reservados.
						</p>
					</div>
					<div class="col-md-6 text-md-end">
						<p class="text-muted mb-0">
							Construido con 💚 para un planeta mejor
						</p>
					</div>
				</div>
			</div>
		</div>
	</footer>
</template>