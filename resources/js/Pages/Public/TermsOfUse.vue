<script setup>
import { ref, onMounted, onUnmounted } from 'vue'

const activeSection = ref('acceptance')
const showBackToTop = ref(false)

const sections = ref([
  { id: 'acceptance', title: 'Aceptación de Términos' },
  { id: 'changes', title: 'Cambios en Términos' },
  { id: 'access', title: 'Acceso y Seguridad' },
  { id: 'intellectual', title: 'Propiedad Intelectual' },
  { id: 'trademarks', title: 'Marcas Comerciales' },
  { id: 'prohibited', title: 'Usos Prohibidos' },
  { id: 'links', title: 'Enlaces' },
  { id: 'service-changes', title: 'Cambios en Servicios' },
  { id: 'privacy', title: 'Información Personal' },
  { id: 'contact', title: 'Contacto' }
])

// Methods
const scrollToSection = (sectionId) => {
  const element = document.getElementById(sectionId)
  if (element) {
    element.scrollIntoView({ behavior: 'smooth' })
    activeSection.value = sectionId
  }
}

const scrollToTop = () => {
  window.scrollTo({ top: 0, behavior: 'smooth' })
}

const handleScroll = () => {
  showBackToTop.value = window.scrollY > 300
  const scrollPosition = window.scrollY + 100

  for (let i = sections.value.length - 1; i >= 0; i--) {
    const section = document.getElementById(sections.value[i].id)
    if (section && section.offsetTop <= scrollPosition) {
      activeSection.value = sections.value[i].id
      break
    }
  }
}

// Lifecycle hooks
onMounted(() => {
  window.addEventListener('scroll', handleScroll)
})

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll)
})

</script>

<template>
  <div class="terms-container">
    <header class="bg-primary text-white py-4 mb-4">
      <div class="container">
        <h1 class="display-4 mb-2">Condiciones de Uso</h1>
        <p class="lead mb-0">Meld Universal Inc.</p>
        <small class="text-light">Última modificación: 27 de julio de 2023</small>
      </div>
    </header>

    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-4">
          <div class="sticky-top" style="top: 20px;">
            <div class="card">
              <div class="card-header">
                <h5 class="mb-0">Índice</h5>
              </div>
              <div class="card-body p-0">
                <nav class="nav flex-column">
                  <a v-for="section in sections" :key="section.id" :href="`#${section.id}`" class="nav-link"
                    :class="{ 'active': activeSection === section.id }" @click="scrollToSection(section.id)">
                    {{ section.title }}
                  </a>
                </nav>
              </div>
            </div>
          </div>
        </div>

        <!-- Main Content -->
        <div class="col-lg-9 col-md-8">
          <div class="terms-content">

            <!-- Section 1: Aceptación -->
            <section id="acceptance" class="mb-5">
              <h2 class="section-title">Aceptación de los Términos de Uso</h2>
              <div class="content-block">
                <p>
                  Estos términos de uso son celebrados por y entre Usted ("Cliente" o "Tú") y
                  <strong>Meld Universal Inc.</strong> ("Empresa", "Meld", "nosotros" o "us"),
                  cada uno un "Fiesta" y colectivamente el "Partes".
                </p>
                <p>
                  Los siguientes términos y condiciones, junto con cualquier documento que incorporen
                  expresamente por referencia ("Condiciones de uso"), regir su acceso y uso de
                  <a href="http://www.meld.io" target="_blank">http://www.meld.io</a>, incluido
                  cualquier contenido, funcionalidad, software y servicios ofrecidos por la Compañía.
                </p>
                <div class="alert alert-warning">
                  <strong>Importante:</strong> Lea atentamente los Términos de uso antes de comenzar
                  a utilizar los Servicios. Al utilizar los Servicios, usted acepta y acepta estar
                  sujeto y cumplir con estos Términos de uso.
                </div>
                <p>
                  <strong>Requisito de edad:</strong> Estos Servicios se ofrecen y están disponibles
                  para usuarios mayores de 16 años.
                </p>
              </div>
            </section>

            <!-- Section 2: Cambios -->
            <section id="changes" class="mb-5">
              <h2 class="section-title">Cambios en los Términos de Uso</h2>
              <div class="content-block">
                <p>
                  Podemos revisar y actualizar estos Términos de uso de vez en cuando a nuestro
                  exclusivo criterio. Todos los cambios entran en vigor inmediatamente cuando
                  los publicamos.
                </p>
                <div class="alert alert-info">
                  Su uso continuo de los Servicios luego de la publicación de los Términos de uso
                  revisados significa que acepta y acepta los cambios.
                </div>
              </div>
            </section>

            <!-- Section 3: Acceso y Seguridad -->
            <section id="access" class="mb-5">
              <h2 class="section-title">Acceso a los Servicios y Seguridad de la Cuenta</h2>
              <div class="content-block">
                <p>
                  Nos reservamos el derecho de retirar o modificar los Servicios y cualquier
                  servicio o material que proporcionemos a través de los Servicios, a nuestro
                  exclusivo criterio y sin previo aviso.
                </p>

                <h4>Sus Responsabilidades:</h4>
                <ul class="responsibility-list">
                  <li>Realizar todos los arreglos necesarios para que usted tenga acceso a los Servicios</li>
                  <li>Garantizar que todas las personas que acceden a los Servicios a través de su conexión conozcan
                    estos Términos</li>
                  <li>Proporcionar información correcta, actual y completa</li>
                  <li>Mantener la confidencialidad de su nombre de usuario y contraseña</li>
                </ul>

                <div class="alert alert-danger">
                  <strong>Seguridad:</strong> Debe notificarnos inmediatamente sobre cualquier
                  acceso o uso no autorizado de su cuenta.
                </div>
              </div>
            </section>

            <!-- Section 4: Propiedad Intelectual -->
            <section id="intellectual" class="mb-5">
              <h2 class="section-title">Derechos de Propiedad Intelectual</h2>
              <div class="content-block">
                <p>
                  Los Servicios y todo su contenido, características y funcionalidad son propiedad
                  de la Compañía, sus licenciantes u otros proveedores y están protegidos por las
                  leyes de derechos de autor, marcas registradas, patentes y otras leyes de
                  propiedad intelectual.
                </p>

                <div class="row">
                  <div class="col-md-6">
                    <div class="card border-success">
                      <div class="card-header bg-success text-white">
                        <h5 class="mb-0">✓ Usos Permitidos</h5>
                      </div>
                      <div class="card-body">
                        <ul class="mb-0">
                          <li>Almacenamiento temporal en RAM</li>
                          <li>Archivos de caché del navegador</li>
                          <li>Impresión para uso personal</li>
                          <li>Descarga de aplicaciones oficiales</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="card border-danger">
                      <div class="card-header bg-danger text-white">
                        <h5 class="mb-0">✗ Usos Prohibidos</h5>
                      </div>
                      <div class="card-body">
                        <ul class="mb-0">
                          <li>Modificar copias del material</li>
                          <li>Uso comercial no autorizado</li>
                          <li>Eliminar avisos de derechos de autor</li>
                          <li>Uso separado de elementos gráficos</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>

            <!-- Section 5: Marcas Comerciales -->
            <section id="trademarks" class="mb-5">
              <h2 class="section-title">Marcas Comerciales</h2>
              <div class="content-block">
                <p>
                  El nombre de la Compañía y todos los nombres, logotipos, nombres de productos
                  y servicios, diseños y lemas relacionados son marcas comerciales de la Compañía
                  o sus afiliados o licenciantes.
                </p>
                <div class="alert alert-warning">
                  No debe utilizar dichas marcas sin el permiso previo por escrito de la Compañía.
                </div>
              </div>
            </section>

            <!-- Section 6: Usos Prohibidos -->
            <section id="prohibited" class="mb-5">
              <h2 class="section-title">Usos Prohibidos</h2>
              <div class="content-block">
                <p>Puede utilizar los Servicios únicamente para fines legales. Usted acepta no utilizar los Servicios:
                </p>

                <div class="prohibited-grid">
                  <div class="prohibited-item">
                    <i class="fas fa-ban text-danger"></i>
                    <strong>Actividades Ilegales</strong>
                    <p>De cualquier manera que viole leyes federales, estatales, locales o internacionales</p>
                  </div>
                  <div class="prohibited-item">
                    <i class="fas fa-child text-danger"></i>
                    <strong>Daño a Menores</strong>
                    <p>Para explotar o dañar menores de cualquier manera</p>
                  </div>
                  <div class="prohibited-item">
                    <i class="fas fa-envelope text-danger"></i>
                    <strong>Spam</strong>
                    <p>Para transmitir correo basura, cadenas o spam</p>
                  </div>
                  <div class="prohibited-item">
                    <i class="fas fa-mask text-danger"></i>
                    <strong>Suplantación</strong>
                    <p>Para hacerse pasar por la Compañía o terceros</p>
                  </div>
                  <div class="prohibited-item">
                    <i class="fas fa-robot text-danger"></i>
                    <strong>Automatización</strong>
                    <p>Usar robots, arañas o procesos automáticos no autorizados</p>
                  </div>
                  <div class="prohibited-item">
                    <i class="fas fa-virus text-danger"></i>
                    <strong>Malware</strong>
                    <p>Introducir virus, troyanos o material malicioso</p>
                  </div>
                </div>
              </div>
            </section>

            <!-- Section 7: Enlaces -->
            <section id="links" class="mb-5">
              <h2 class="section-title">Enlaces desde los Servicios</h2>
              <div class="content-block">
                <p>
                  Si los Servicios contienen enlaces a otros sitios y recursos proporcionados por
                  terceros, estos enlaces se proporcionan únicamente para su conveniencia.
                </p>
                <div class="alert alert-info">
                  No tenemos control sobre el contenido de esos sitios y no aceptamos ninguna
                  responsabilidad por ellos. Si decide acceder a sitios web de terceros, lo hace
                  bajo su propio riesgo.
                </div>
              </div>
            </section>

            <!-- Section 8: Cambios en Servicios -->
            <section id="service-changes" class="mb-5">
              <h2 class="section-title">Cambios en los Servicios</h2>
              <div class="content-block">
                <p>
                  Podemos actualizar los Servicios de vez en cuando, pero los Servicios se
                  proporcionan TAL CUAL. Los Servicios pueden estar desactualizados en cualquier
                  momento y no tenemos obligación de actualizarlos.
                </p>
              </div>
            </section>

            <!-- Section 9: Información Personal -->
            <section id="privacy" class="mb-5">
              <h2 class="section-title">Información sobre Usted y sus Visitas</h2>
              <div class="content-block">
                <p>
                  Toda la información que recopilamos a través de los Servicios está sujeta a
                  nuestra Política de Privacidad. Al utilizar el sitio web, usted acepta todas
                  las acciones que tomemos con respecto a su información.
                </p>
              </div>
            </section>

            <!-- Section 10: Contacto -->
            <section id="contact" class="mb-5">
              <h2 class="section-title">Sus Comentarios e Inquietudes</h2>
              <div class="content-block">
                <p>Este sitio web es operado por Meld Universal Inc.</p>
                <div class="contact-info">
                  <div class="card">
                    <div class="card-body text-center">
                      <i class="fas fa-envelope fa-2x text-primary mb-3"></i>
                      <h5>Contacto</h5>
                      <p class="mb-0">
                        Para comentarios, sugerencias, soporte técnico y otras comunicaciones:
                      </p>
                      <a href="mailto:contact@meld.io" class="btn btn-primary mt-2">
                        contact@meld.io
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </section>

          </div>
        </div>
      </div>
    </div>

    <button v-show="showBackToTop" @click="scrollToTop" class="btn btn-primary back-to-top" title="Volver arriba">
      <i class="fas fa-arrow-up"></i>
    </button>
  </div>
</template>

<style lang="scss" scoped>
.terms-container {
  min-height: 100vh;
  background-color: #f8f9fa;
}

.section-title {
  color: #2c3e50;
  border-bottom: 3px solid #007bff;
  padding-bottom: 10px;
  margin-bottom: 20px;
  font-weight: 600;
}

.content-block {
  background: white;
  padding: 25px;
  border-radius: 8px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  margin-bottom: 20px;

  p {
    line-height: 1.6;
    margin-bottom: 15px;
  }

  ul {
    padding-left: 20px;

    li {
      margin-bottom: 8px;
      line-height: 1.5;
    }
  }
}

.responsibility-list {
  li {
    position: relative;
    padding-left: 25px;

    &:before {
      content: "✓";
      position: absolute;
      left: 0;
      color: #28a745;
      font-weight: bold;
    }
  }
}

.prohibited-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 20px;
  margin-top: 20px;
}

.prohibited-item {
  background: #fff;
  padding: 20px;
  border-radius: 8px;
  border-left: 4px solid #dc3545;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);

  i {
    font-size: 1.5rem;
    margin-bottom: 10px;
  }

  strong {
    display: block;
    margin-bottom: 8px;
    color: #2c3e50;
  }

  p {
    margin: 0;
    font-size: 0.9rem;
    color: #6c757d;
  }
}

.contact-info {
  margin-top: 20px;

  .card {
    border: none;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
  }
}

.nav-link {
  color: #495057;
  padding: 10px 15px;
  border-radius: 5px;
  margin-bottom: 2px;
  transition: all 0.3s ease;

  &:hover {
    background-color: #e9ecef;
    color: #007bff;
    text-decoration: none;
  }

  &.active {
    background-color: #007bff;
    color: white;
    font-weight: 500;
  }
}

.back-to-top {
  position: fixed;
  bottom: 30px;
  right: 30px;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
  z-index: 1000;
  transition: all 0.3s ease;

  &:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
  }
}

// Responsive adjustments
@media (max-width: 768px) {
  .prohibited-grid {
    grid-template-columns: 1fr;
  }

  .back-to-top {
    bottom: 20px;
    right: 20px;
    width: 45px;
    height: 45px;
  }
}
</style>