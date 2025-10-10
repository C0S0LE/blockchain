<script setup>
  import { onMounted } from 'vue'
  import { route } from 'ziggy-js'

  // Componentes que usas
  import AnimateCounters from '@/components/Animations/AnimateCounters.vue'
  import Particles from '@/components/Animations/Particles.vue'
  import GuestLayout from '@/Layouts/GuestLayout.vue'

  // Assets
  import logoIMG from '@template/assets/img/icons/icon-wrc.png'

  const initSmoothScrolling = () => {
    const anchors = document.querySelectorAll('a[href^="#"]')
    anchors.forEach(anchor => {
      anchor.addEventListener('click', e => {
        e.preventDefault()
        const target = document.querySelector(anchor.getAttribute('href'))
        if (target) {
          target.scrollIntoView({ behavior: 'smooth', block: 'start' })
        }
      })
    })
  }

  onMounted(() => {
    initSmoothScrolling();
  });

</script>

<template>
  <GuestLayout title="Blockchain">
    <section id="inicio" class="wrc-section wrc-section--hero">
      <div class="wrc-container">
        <div class="row align-items-center">
          <div class="col-lg-5">
            <h1 class="wrc-heading-hero">
              El Futuro del <span style="color: var(--wrc-success);">Reciclaje</span>
              es Blockchain
            </h1>

            <p class="wrc-text-lead">
              World Recycling Coin revoluciona la industria del reciclaje con tecnología blockchain de vanguardia.
              Gana WRC tokens mientras construyes un futuro sostenible para las próximas generaciones.
            </p>

            <div class="d-flex flex-column flex-md-row gap-3 mb-4">
              <a href="#gea-wrc" class="wrc-btn wrc-btn--primary">
                <i class="fas fa-coins"></i>
                Ganar Tokens WRC
              </a>
              <a href="#demo" class="wrc-btn wrc-btn--secondary">
                <i class="fas fa-play"></i>
                Ver Demo
              </a>
            </div>
          </div>

          <div class="col-lg-7 text-center">
            <div class="position-relative d-none d-md-flex justify-content-center">
              <img :src="logoIMG" alt="World Recycling Coin" class="img-fluid" style="max-width: 400px; filter: drop-shadow(0 0 50px var(--wrc-gold-glow));">
              <Particles />
            </div>

            <!-- Revolutionary Stats -->
            <AnimateCounters />
          </div>
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section id="caracteristicas" class="wrc-section">
      <div class="wrc-container">
        <div class="text-center mb-5">
          <h2 class="display-4 fw-bold mb-4" style="color: var(--wrc-gold-primary);">
            Tecnología Revolucionaria
          </h2>
          <p class="lead text-muted mx-auto" style="max-width: 600px;">
            Descubre cómo World Recycling Coin está transformando la industria del reciclaje
            con blockchain de última generación.
          </p>
        </div>

        <div class="wrc-features">
          <div class="wrc-feature">
            <div class="wrc-feature-icon">
              <i class="fas fa-leaf"></i>
            </div>
            <h3 class="wrc-feature-title">Reciclaje Inteligente</h3>
            <p class="wrc-feature-description">
              Sistema de IA que optimiza el proceso de reciclaje y maximiza la eficiencia
              de cada material procesado.
            </p>
          </div>

          <div class="wrc-feature">
            <div class="wrc-feature-icon">
              <i class="fas fa-coins"></i>
            </div>
            <h3 class="wrc-feature-title">Recompensas WRC</h3>
            <p class="wrc-feature-description">
              Gana tokens WRC por cada acción de reciclaje verificada en la blockchain.
              Convierte tu compromiso ambiental en valor real.
            </p>
          </div>

          <div class="wrc-feature">
            <div class="wrc-feature-icon">
              <i class="fas fa-shield-alt"></i>
            </div>
            <h3 class="wrc-feature-title">Seguridad Blockchain</h3>
            <p class="wrc-feature-description">
              Tecnología blockchain inmutable que garantiza la transparencia y
              trazabilidad de cada transacción.
            </p>
          </div>

          <div class="wrc-feature">
            <div class="wrc-feature-icon">
              <i class="fas fa-globe"></i>
            </div>
            <h3 class="wrc-feature-title">Impacto Global</h3>
            <p class="wrc-feature-description">
              Red mundial de centros de reciclaje conectados que maximizan el
              impacto ambiental positivo.
            </p>
          </div>

          <div class="wrc-feature">
            <div class="wrc-feature-icon">
              <i class="fas fa-chart-line"></i>
            </div>
            <h3 class="wrc-feature-title">ROI Sostenible</h3>
            <p class="wrc-feature-description">
              Modelo económico que genera retornos consistentes mientras
              contribuyes a un planeta más limpio.
            </p>
          </div>

          <div class="wrc-feature">
            <div class="wrc-feature-icon">
              <i class="fas fa-users"></i>
            </div>
            <h3 class="wrc-feature-title">Comunidad Activa</h3>
            <p class="wrc-feature-description">
              Únete a miles de eco-warriors que están construyendo el futuro
              del reciclaje descentralizado.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- GEA-WRC Enterprise Section -->
    <section id="gea-wrc" class="wrc-section" style="background: linear-gradient(135deg, rgba(255, 215, 0, 0.05) 0%, rgba(16, 185, 129, 0.05) 100%);">
      <div class="wrc-container">
        <div class="text-center mb-5">
          <h2 class="display-3 fw-bold mb-4" style="color: var(--wrc-gold-primary);">
            GEA-WRC Enterprise
          </h2>
          <p class="lead mx-auto text-white" style="max-width: 800px;">
            Soluciones empresariales de reciclaje blockchain que transforman tu negocio
            en un líder de sostenibilidad mientras generas ingresos adicionales.
          </p>
        </div>

        <div class="row g-4 mb-5">
          <div class="col-lg-4">
            <div class="wrc-card h-100 text-center">
              <div class="wrc-feature-icon mx-auto mb-4">
                <i class="fas fa-building"></i>
              </div>
              <h4 class="fw-bold mb-3" style="color: var(--wrc-gold-primary);">Empresas Corporativas</h4>
              <p class="mb-4 text-white">
                Implementa sistemas de reciclaje blockchain en tu empresa.
                Reduce costos operativos hasta un 40% mientras generas tokens WRC.
              </p>
              <ul class="list-unstyled text-start mb-4">
                <li class="mb-2 text-white"><i class="fas text-success fa-check me-2"></i>Auditoría gratuita de residuos</li>
                <li class="mb-2 text-white"><i class="fas text-success fa-check me-2"></i>ROI garantizado en 6 meses</li>
                <li class="mb-2 text-white"><i class="fas text-success fa-check me-2"></i>Certificación ISO 14001</li>
                <li class="mb-2 text-white"><i class="fas text-success fa-check me-2"></i>Dashboard ejecutivo en tiempo real</li>
              </ul>
              <div class="mt-auto">
                <div class="mb-3">
                  <span class="badge bg-success fs-6 px-3 py-2">🔥 OFERTA LIMITADA: 50% DESC</span>
                </div>
                <a href="#contacto-enterprise" class="wrc-btn wrc-btn--primary w-100">
                  <i class="fas fa-rocket"></i>
                  Solicitar Demo Ejecutiva
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="wrc-card h-100 text-center" style="border: 2px solid var(--wrc-gold-primary); transform: scale(1.05);">
              <div class="position-absolute top-0 start-50 translate-middle">
                <span class="badge" style="background: var(--wrc-gold-primary); color: var(--wrc-dark-primary); font-size: 0.8rem; padding: 0.5rem 1rem;">
                  MÁS POPULAR
                </span>
              </div>
              <div class="wrc-feature-icon mx-auto mb-4 mt-3">
                <i class="fas fa-industry"></i>
              </div>
              <h4 class="fw-bold mb-3" style="color: var(--wrc-gold-primary);">
                Plantas Industriales
              </h4>
              <p class="mb-4">
                Convierte tus residuos industriales en una fuente de ingresos.
                Tecnología blockchain que procesa hasta 10 toneladas/día.
              </p>
              <ul class="list-unstyled text-start mb-4">
                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Instalación completa incluida</li>
                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Soporte 24/7 especializado</li>
                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Contratos de compra garantizada</li>
                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Financiamiento hasta 84 meses</li>
              </ul>
              <div class="mt-auto">
                <div class="mb-3">
                  <span class="badge bg-danger fs-6 px-3 py-2">
                    ⚡ ÚLTIMAS 5 PLAZAS DISPONIBLES
                  </span>
                </div>
                <a href="#contacto-industrial" class="wrc-btn wrc-btn--primary w-100">
                  <i class="fas fa-cogs"></i>
                  Reservar Plaza Ahora
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="wrc-card h-100 text-center">
              <div class="wrc-feature-icon mx-auto mb-4">
                <i class="fas fa-handshake"></i>
              </div>
              <h4 class="fw-bold mb-3" style="color: var(--wrc-gold-primary);">
                Franquicias WRC
              </h4>
              <p class="mb-4">
                Conviértete en franquiciado oficial de World Recycling Coin.
                Modelo de negocio probado con ingresos recurrentes garantizados.
              </p>
              <ul class="list-unstyled text-start mb-4">
                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Inversión inicial desde $50K</li>
                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Territorio exclusivo protegido</li>
                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Capacitación completa incluida</li>
                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Marketing y branding incluido</li>
              </ul>
              <div class="mt-auto">
                <div class="mb-3">
                  <span class="badge bg-warning text-dark fs-6 px-3 py-2">
                    💎 OPORTUNIDAD ÚNICA
                  </span>
                </div>
                <a href="#contacto-franquicia" class="wrc-btn wrc-btn--primary w-100">
                  <i class="fas fa-crown"></i>
                  Información Franquicia
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Success Stories -->
        <div class="text-center mb-4" style="padding-top:5rem;">
          <h3 class="fw-bold mb-4" style="color: var(--wrc-white);">
            Casos de Éxito Reales
          </h3>
        </div>

        <div class="row g-4">
          <div class="col-md-4">
            <div class="wrc-card text-center">
              <div class="mb-3">
                <i class="fas fa-quote-left fa-2x" style="color: var(--wrc-gold-primary);"></i>
              </div>
              <p class="mb-3">
                "En 8 meses recuperamos la inversión completa y ahora generamos
                $15K mensuales adicionales con nuestros residuos."
              </p>
              <div class="fw-bold" style="color: var(--wrc-gold-primary);">
                - María González, CEO TechCorp
              </div>
              <div class="small text-muted">
                Ahorros: $180K anuales
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="wrc-card text-center">
              <div class="mb-3">
                <i class="fas fa-quote-left fa-2x" style="color: var(--wrc-gold-primary);"></i>
              </div>
              <p class="mb-3">
                "La planta WRC procesa 8 toneladas diarias. Nuestro ROI
                superó el 300% en el primer año de operación."
              </p>
              <div class="fw-bold" style="color: var(--wrc-gold-primary);">
                - Carlos Mendoza, Industrias del Norte
              </div>
              <div class="small text-muted">
                ROI: 300% primer año
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="wrc-card text-center">
              <div class="mb-3">
                <i class="fas fa-quote-left fa-2x" style="color: var(--wrc-gold-primary);"></i>
              </div>
              <p class="mb-3">
                "Mi franquicia WRC genera $25K mensuales netos.
                La mejor decisión de inversión que he tomado."
              </p>
              <div class="fw-bold" style="color: var(--wrc-gold-primary);">
                - Ana Rodríguez, Franquiciada WRC
              </div>
              <div class="small text-muted">
                Ingresos: $25K mensuales
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Tokenomics Section -->
    <section id="tokenomics" class="wrc-section">
      <div class="wrc-container">
        <div class="text-center mb-5">
          <h2 class="display-4 fw-bold mb-4" style="color: var(--wrc-gold-primary);">
            Tokenomics WRC
          </h2>
          <p class="lead text-muted mx-auto" style="max-width: 600px;">
            Economía deflacionaria diseñada para recompensar a los early adopters
            y crear valor sostenible a largo plazo.
          </p>
        </div>

        <div class="row g-4">
          <div class="col-lg-6">
            <div class="wrc-card h-100">
              <h4 class="fw-bold mb-4" style="color: var(--wrc-gold-primary);">
                Distribución de Tokens
              </h4>

              <div class="mb-4">
                <div class="d-flex justify-content-between mb-2">
                  <span>Recompensas Reciclaje (40%)</span>
                  <span class="fw-bold">400M WRC</span>
                </div>
                <div class="progress mb-3" style="height: 8px;">
                  <div class="progress-bar" style="width: 40%; background: var(--wrc-gold-primary);"></div>
                </div>
              </div>

              <div class="mb-4">
                <div class="d-flex justify-content-between mb-2">
                  <span>Desarrollo Ecosistema (25%)</span>
                  <span class="fw-bold">250M WRC</span>
                </div>
                <div class="progress mb-3" style="height: 8px;">
                  <div class="progress-bar" style="width: 25%; background: var(--wrc-success);"></div>
                </div>
              </div>

              <div class="mb-4">
                <div class="d-flex justify-content-between mb-2">
                  <span>Venta Pública (20%)</span>
                  <span class="fw-bold">200M WRC</span>
                </div>
                <div class="progress mb-3" style="height: 8px;">
                  <div class="progress-bar" style="width: 20%; background: var(--wrc-gold-light);"></div>
                </div>
              </div>

              <div class="mb-4">
                <div class="d-flex justify-content-between mb-2">
                  <span>Equipo & Asesores (10%)</span>
                  <span class="fw-bold">100M WRC</span>
                </div>
                <div class="progress mb-3" style="height: 8px;">
                  <div class="progress-bar" style="width: 10%; background: var(--wrc-gray-medium);"></div>
                </div>
              </div>

              <div class="mb-4">
                <div class="d-flex justify-content-between mb-2">
                  <span>Reserva Estratégica (5%)</span>
                  <span class="fw-bold">50M WRC</span>
                </div>
                <div class="progress mb-3" style="height: 8px;">
                  <div class="progress-bar" style="width: 5%; background: var(--wrc-dark-tertiary);"></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="wrc-card h-100">
              <h4 class="fw-bold mb-4" style="color: var(--wrc-gold-primary);">
                Utilidad del Token
              </h4>

              <div class="mb-4">
                <div class="d-flex align-items-center mb-3">
                  <div class="wrc-feature-icon me-3" style="width: 40px; height: 40px;">
                    <i class="fas fa-coins"></i>
                  </div>
                  <div>
                    <h6 class="fw-bold mb-1">Recompensas por Reciclaje</h6>
                    <small class="text-muted">Gana WRC por cada kg reciclado</small>
                  </div>
                </div>
              </div>

              <div class="mb-4">
                <div class="d-flex align-items-center mb-3">
                  <div class="wrc-feature-icon me-3" style="width: 40px; height: 40px;">
                    <i class="fas fa-vote-yea"></i>
                  </div>
                  <div>
                    <h6 class="fw-bold mb-1">Gobernanza DAO</h6>
                    <small class="text-muted">Vota en decisiones del protocolo</small>
                  </div>
                </div>
              </div>

              <div class="mb-4">
                <div class="d-flex align-items-center mb-3">
                  <div class="wrc-feature-icon me-3" style="width: 40px; height: 40px;">
                    <i class="fas fa-percentage"></i>
                  </div>
                  <div>
                    <h6 class="fw-bold mb-1">Staking Rewards</h6>
                    <small class="text-muted">Hasta 12% APY por hacer staking</small>
                  </div>
                </div>
              </div>

              <div class="mb-4">
                <div class="d-flex align-items-center mb-3">
                  <div class="wrc-feature-icon me-3" style="width: 40px; height: 40px;">
                    <i class="fas fa-store"></i>
                  </div>
                  <div>
                    <h6 class="fw-bold mb-1">Marketplace</h6>
                    <small class="text-muted">Compra productos eco-friendly</small>
                  </div>
                </div>
              </div>

              <div class="text-center mt-4">
                <div class="p-3 rounded"
                  style="background: rgba(255, 215, 0, 0.1); border: 1px solid rgba(255, 215, 0, 0.3);">
                  <div class="fw-bold mb-2" style="color: var(--wrc-gold-primary);">
                    Precio Actual WRC
                  </div>
                  <div class="display-6 fw-bold" style="color: var(--wrc-white);">
                    $0.0847
                  </div>
                  <div class="small" style="color: rgb(50 241 152);">
                    <i class="fas fa-arrow-up"></i> +24.7% (24h)
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="wrc-section">
      <div class="wrc-container">
        <div class="wrc-cta">
          <h2 class="display-4 fw-bold mb-4" style="color: var(--wrc-gold-primary);">
            ¿Listo para Revolucionar el Reciclaje?
          </h2>
          <p class="lead mb-4" style="max-width: 600px; margin: 0 auto;">
            Únete a miles de eco-warriors que ya están ganando WRC tokens
            mientras construyen un futuro más sostenible.
          </p>

          <div class="row g-4 mb-5">
            <div class="col-md-4">
              <div class="text-center">
                <div class="display-6 fw-bold mb-2" style="color: var(--wrc-gold-primary);">
                  1M+
                </div>
                <div class="small text-muted">Tokens Distribuidos</div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="text-center">
                <div class="display-6 fw-bold mb-2" style="color: rgb(50 241 152);">
                  50K+
                </div>
                <div class="small text-muted">Kg CO2 Evitados</div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="text-center">
                <div class="display-6 fw-bold mb-2" style="color: var(--wrc-gold-primary);">
                  2.5K+
                </div>
                <div class="small text-muted">Usuarios Activos</div>
              </div>
            </div>
          </div>

          <div class="d-flex flex-column flex-md-row gap-3 justify-content-center">
            <a href="#app" class="wrc-btn wrc-btn--primary">
              <i class="fas fa-mobile-alt"></i>
              Descargar App
            </a>
            <a href="#whitepaper" class="wrc-btn wrc-btn--secondary">
              <i class="fas fa-file-alt"></i>
              Leer documento técnico
            </a>
          </div>
        </div>
      </div>
    </section>
  </GuestLayout>
</template>