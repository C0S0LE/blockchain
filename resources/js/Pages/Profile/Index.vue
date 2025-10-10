<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage();
const user = page.props.auth?.user;
// console.log(user);
// console.log(user?.avatar_url);

// {
//   "id": 1,
//   "uid": "ZE0OBDWKU9AF",
//   "name": "Test",
//   "lastName": "User",
//   "dni": "12345678",
//   "username": "usertest",
//   "email": "test432mhz@gmail.com",
//   "email_verified_at": "2025-08-28T05:33:57.000000Z",
//   "avatar": "66.webp",
//   "terms_accepted": true,
//   "status": "active",
//   "github_id": null,
//   "github_token": null,
//   "github_refresh_token": null,
//   "google_id": null,
//   "google_token": null,
//   "google_refresh_token": null,
//   "created_at": "2025-08-28T05:33:57.000000Z",
//   "updated_at": "2025-08-28T05:33:57.000000Z",
//   "deleted_at": null,
//   "hashid": "DY5LOkAdWNDqgVomKPvX",
//   "avatar_url": "https://blockchain.test/storage/assets/img/pic/66.webp",
//   "wallet_balance": "0.00",
//   "wallet": {
//     "id": 1,
//     "user_id": 1,
//     "balance": "0.00",
//     "created_at": "2025-08-28T05:33:57.000000Z",
//     "updated_at": "2025-08-28T05:33:57.000000Z",
//     "transactions": []
//   }
// }

const formatDate = (dateString) => {
  return new Date(dateString).toLocaleDateString('es-ES', {
    year: 'numeric',
    month: 'short',
    day: 'numeric'
  })
}
</script>

<template>
  <AppLayout :title="user ? user?.name : 'Perfil'">
    <div class="profile-content" data-bs-theme="dark">
      <div class="profile-header mb-4">
        <div class="d-flex align-items-center justify-content-between">
          <div class="d-flex align-items-center">
            <div class="position-relative me-4">
              <img :src="user?.avatar_url" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
              <div class="position-absolute bottom-0 end-0 bg-success rounded-circle border border-dark" style="width: 20px; height: 20px;"></div>
            </div>

            <div>
              <h2 class="text-white mb-1 fw-bold">{{ user?.name }} {{ user?.lastName }}</h2>
              <p class="text-muted mb-2">@{{ user?.username }} • ID: {{ user?.uid }}</p>
              <p class="text-muted mb-2">{{ user?.email }}</p>
              <div class="d-flex gap-2 mb-2">
                <span class="badge bg-success px-2 py-1">Activo</span>
                <span class="badge bg-info px-2 py-1" v-if="user?.email_verified_at">Email Verificado</span>
                <span class="badge bg-warning text-dark px-2 py-1" v-if="user?.terms_accepted">Términos Aceptados</span>
              </div>
              <div class="d-flex gap-3 text-muted small">
                <span>Miembro desde: {{ formatDate(user?.created_at) }}</span>
                <span>Última actividad: {{ formatDate(user?.updated_at) }}</span>
              </div>
            </div>
          </div>

          <div class="d-flex gap-2">
            <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editProfileModal">Editar Perfil</button>
            <button class="btn btn-warning">Cambiar Contraseña</button>
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Eliminar Cuenta</button>
          </div>
        </div>
      </div>

      <div class="balance-section mb-4">
        <div class="card bg-dark border-secondary">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <!-- Changed from balance to account summary -->
                <h6 class="text-muted mb-1">Estado de la Cuenta</h6>
                <h2 class="text-white mb-1">{{ user?.name }} {{ user?.lastName }}</h2>
                <p class="text-muted mb-2">DNI: {{ user?.dni || 'No proporcionado' }}</p>
                <div class="d-flex align-items-center">
                  <span class="text-muted me-2">Estado:</span>
                  <span class="text-success">Cuenta Activa</span>
                </div>
              </div>
              <div class="text-end">
                <!-- Simple activity indicator instead of chart -->
                <div class="d-flex flex-column align-items-end">
                  <div class="bg-success rounded mb-2" style="width: 60px; height: 4px;"></div>
                  <div class="bg-success rounded mb-2" style="width: 80px; height: 4px;"></div>
                  <div class="bg-success rounded" style="width: 100px; height: 4px;"></div>
                  <small class="text-muted mt-2">Actividad</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="mb-4">
        <h5 class="text-white mb-3">
          Configuración de Perfil
          <small class="text-primary ms-2">Gestionar ></small>
        </h5>

        <!-- Using Bootstrap native nav-tabs -->
        <ul class="nav nav-tabs nav-fill" id="profileTabs" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="personal-tab" data-bs-toggle="tab" data-bs-target="#personal"
              type="button">
              Información Personal
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="security-tab" data-bs-toggle="tab" data-bs-target="#security" type="button">
              Seguridad
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="sessions-tab" data-bs-toggle="tab" data-bs-target="#sessions" type="button">
              Sesiones Activas
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="preferences-tab" data-bs-toggle="tab" data-bs-target="#preferences"
              type="button">
              Preferencias
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="activity-tab" data-bs-toggle="tab" data-bs-target="#activity" type="button">
              Actividad Reciente
            </button>
          </li>
        </ul>
      </div>

      <div class="tab-content" id="profileTabsContent">
        <div class="tab-pane fade show active" id="personal" role="tabpanel">
          <div class="card bg-dark border-secondary">
            <div class="card-body p-0">
              <!-- Personal information display instead of crypto table -->
              <div class="p-4">
                <div class="row g-4">
                  <div class="col-md-6">
                    <label class="form-label text-muted">Nombre</label>
                    <input type="text" class="form-control bg-dark border-secondary text-white" :value="user?.name"
                      readonly>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label text-muted">Apellido</label>
                    <input type="text" class="form-control bg-dark border-secondary text-white" :value="user?.lastName"
                      readonly>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label text-muted">DNI</label>
                    <input type="text" class="form-control bg-dark border-secondary text-white"
                      :value="user?.dni || 'No proporcionado'" readonly>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label text-muted">Nombre de Usuario</label>
                    <input type="text" class="form-control bg-dark border-secondary text-white" :value="user?.username"
                      readonly>
                  </div>
                  <div class="col-12">
                    <label class="form-label text-muted">Email</label>
                    <div class="input-group">
                      <input type="email" class="form-control bg-dark border-secondary text-white" :value="user?.email"
                        readonly>
                      <span class="input-group-text bg-success border-success text-white" v-if="user?.email_verified_at">
                        ✓ Verificado
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Security Tab -->
        <div class="tab-pane fade" id="security" role="tabpanel">
          <div class="card bg-dark border-secondary">
            <div class="card-body">
              <div class="row g-4">
                <div class="col-12">
                  <h6 class="text-white mb-3">Configuración de Seguridad</h6>
                </div>
                <div class="col-md-6">
                  <div class="d-flex justify-content-between align-items-center p-3 bg-secondary bg-opacity-25 rounded">
                    <div>
                      <h6 class="text-white mb-1">Contraseña</h6>
                      <small class="text-muted">Última actualización: hace 30 días</small>
                    </div>
                    <button class="btn btn-warning btn-sm">Cambiar</button>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="d-flex justify-content-between align-items-center p-3 bg-secondary bg-opacity-25 rounded">
                    <div>
                      <h6 class="text-white mb-1">Autenticación 2FA</h6>
                      <small class="text-muted">No configurada</small>
                    </div>
                    <button class="btn btn-success btn-sm">Activar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Sessions Tab -->
        <div class="tab-pane fade" id="sessions" role="tabpanel">
          <div class="card bg-dark border-secondary">
            <div class="card-body p-0">
              <!-- Sessions table similar to crypto table structure -->
              <div class="row g-0 p-3 border-bottom border-secondary text-muted small">
                <div class="col-3">Dispositivo</div>
                <div class="col-3">Ubicación</div>
                <div class="col-3">Última Actividad</div>
                <div class="col-3 text-end">Acción</div>
              </div>

              <div class="session-item p-3 border-bottom border-secondary">
                <div class="row g-0 align-items-center">
                  <div class="col-3">
                    <div class="d-flex align-items-center">
                      <div class="bg-primary rounded me-3 d-flex align-items-center justify-content-center"
                        style="width: 32px; height: 32px;">
                        <span class="text-white">💻</span>
                      </div>
                      <div>
                        <div class="text-white fw-bold">MacBook Pro</div>
                        <div class="text-muted small">Chrome</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="text-white">Madrid, España</div>
                    <div class="text-muted small">192.168.1.100</div>
                  </div>
                  <div class="col-3">
                    <div class="text-white">Ahora</div>
                    <div class="text-success small">Sesión Actual</div>
                  </div>
                  <div class="col-3 text-end">
                    <span class="badge bg-success">Activa</span>
                  </div>
                </div>
              </div>

              <div class="session-item p-3 border-bottom border-secondary">
                <div class="row g-0 align-items-center">
                  <div class="col-3">
                    <div class="d-flex align-items-center">
                      <div class="bg-info rounded me-3 d-flex align-items-center justify-content-center"
                        style="width: 32px; height: 32px;">
                        <span class="text-white">📱</span>
                      </div>
                      <div>
                        <div class="text-white fw-bold">iPhone 13</div>
                        <div class="text-muted small">Safari</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="text-white">Madrid, España</div>
                    <div class="text-muted small">192.168.1.101</div>
                  </div>
                  <div class="col-3">
                    <div class="text-white">hace 2 horas</div>
                    <div class="text-muted small">20 ene 2024, 05:15</div>
                  </div>
                  <div class="col-3 text-end">
                    <button class="btn btn-danger btn-sm">Cerrar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Preferences Tab -->
        <div class="tab-pane fade" id="preferences" role="tabpanel">
          <div class="card bg-dark border-secondary">
            <div class="card-body">
              <h6 class="text-white mb-3">Preferencias de Usuario</h6>
              <div class="row g-3">
                <div class="col-12">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="notifications" checked>
                    <label class="form-check-label text-white" for="notifications">
                      Recibir notificaciones por email
                    </label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="darkMode" checked>
                    <label class="form-check-label text-white" for="darkMode">
                      Modo oscuro
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Activity Tab -->
        <div class="tab-pane fade" id="activity" role="tabpanel">
          <div class="card bg-dark border-secondary">
            <div class="card-body">
              <h6 class="text-white mb-3">Actividad Reciente</h6>
              <div class="timeline">
                <div class="d-flex mb-3">
                  <div class="bg-success rounded-circle me-3" style="width: 8px; height: 8px; margin-top: 8px;"></div>
                  <div>
                    <div class="text-white">Inicio de sesión exitoso</div>
                    <small class="text-muted">hace 5 minutos</small>
                  </div>
                </div>
                <div class="d-flex mb-3">
                  <div class="bg-warning rounded-circle me-3" style="width: 8px; height: 8px; margin-top: 8px;"></div>
                  <div>
                    <div class="text-white">Perfil actualizado</div>
                    <small class="text-muted">hace 2 horas</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content bg-dark border-danger">
            <div class="modal-header bg-danger">
              <h5 class="modal-title text-white">Eliminar Cuenta</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <p class="text-white">¿Estás seguro de que quieres eliminar tu cuenta permanentemente?</p>
              <input type="text" class="form-control bg-dark border-secondary text-white"
                placeholder="Escribe 'ELIMINAR' para confirmar">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-danger">Eliminar Permanentemente</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="editProfileModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
          <div class="modal-content bg-dark border-secondary">
            <div class="modal-header">
              <h5 class="modal-title text-white">Editar Perfil</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <form>
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label text-muted">Nombre</label>
                    <input type="text" class="form-control bg-dark border-secondary text-white" :value="user?.name">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label text-muted">Apellido</label>
                    <input type="text" class="form-control bg-dark border-secondary text-white" :value="user?.lastName">
                  </div>
                  <div class="col-12">
                    <label class="form-label text-muted">DNI</label>
                    <input type="text" class="form-control bg-dark border-secondary text-white" :value="user?.dni">
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary">Guardar Cambios</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>



<style lang="scss" scoped>
.profile-content {
  padding: 0;
  color: #fff;
}

.profile-header {
  padding: 2rem;
  background: rgba(255, 255, 255, 0.05);
  border-radius: 0.5rem;
  border: 1px solid rgba(255, 255, 255, 0.1);
}

.balance-section .card {
  border-radius: 0.5rem;
}

.nav-tabs {
  border-bottom: 1px solid #495057;

  .nav-link {
    color: #6c757d;
    border: none;
    border-bottom: 2px solid transparent;
    background: none;

    &.active {
      color: #fff;
      background: none;
      border-bottom-color: #ffc107;
    }

    &:hover {
      color: #fff;
      border-color: transparent;
    }
  }
}

.crypto-item:hover {
  background: rgba(255, 255, 255, 0.05);
}

.badge {
  font-weight: 500;
  border-radius: 0.375rem;
}

@media (max-width: 768px) {
  .profile-header {
    padding: 1rem;
  }

  .profile-header .d-flex {
    flex-direction: column;
    text-align: center;
    gap: 1rem;
  }
}
</style>