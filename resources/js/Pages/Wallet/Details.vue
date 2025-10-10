<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from '@/Shared/Buttons/PrimaryButton.vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage();
const user = page.props.auth?.user ?? null;

console.log(user);

</script>

<template>
  <AppLayout title="Activos">
    <div class="profile-content" data-bs-theme="dark">
      <div class="profile-header mb-4">
        <div class="d-flex align-items-center justify-content-between">
          <div class="d-flex align-items-center">
            <div class="position-relative me-4">
              <img :src="user.avatar_url" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
            </div>

            <div>
              <h2 class="text-white mb-1 fw-bold">{{ user.username }}</h2>
              <p class="text-muted mb-2">UID: {{ user.uid }}</p>
              <div class="d-flex gap-2 mb-2">
                <span class="badge bg-warning text-dark px-2 py-1">Nivel VIP</span>
                <span class="badge bg-info px-2 py-1">Usuario habitual</span>
              </div>
              <div class="d-flex gap-3 text-muted small">
                <span>Siguiendo: 0</span>
                <span>Seguidores: 15</span>
              </div>
            </div>
          </div>

          <div class="d-flex gap-2">
            <button class="btn btn-secondary">Depositar</button>
            <button class="btn btn-secondary">Retirar</button>
            <button class="btn btn-primary">Efectivo</button>
          </div>
        </div>
      </div>

      <div class="balance-section mb-4">
        <div class="card bg-dark border-secondary">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <h6 class="text-muted mb-1">Balance estimado</h6>
                <h2 class="text-white mb-1">{{ user.wallet.balance }} <small class="text-muted">WRC</small></h2>
                <p class="text-muted mb-2">= {{ user.wallet.balance }} €</p>
                <div class="d-flex align-items-center">
                  <span class="text-muted me-2">PnL de hoy</span>
                  <span class="text-danger">-0,00 €(0,19%)</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="mb-4">
        <h5 class="text-white mb-3">Mercados
          <small class="text-primary ms-2"></small>
          <PrimaryButton class="px-0 pb-1">Más></PrimaryButton>
        </h5>

        <ul class="nav nav-tabs nav-fill" id="profileTabs" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="holding-tab" data-bs-toggle="tab" data-bs-target="#holding"
              type="button">Holding</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="popular-tab" data-bs-toggle="tab" data-bs-target="#popular"
              type="button">Populares</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="new-tab" data-bs-toggle="tab" data-bs-target="#new" type="button">Nueva
              inclusión</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="favorites-tab" data-bs-toggle="tab" data-bs-target="#favorites"
              type="button">Favoritos</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="gainers-tab" data-bs-toggle="tab" data-bs-target="#gainers"
              type="button">Principales ganadores</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="volume-tab" data-bs-toggle="tab" data-bs-target="#volume" type="button">Volumen
              en 24 h</button>
          </li>
        </ul>
      </div>

      <!-- Tab Content -->
      <div class="tab-content" id="profileTabsContent">
        <div class="tab-pane fade show active" id="holding" role="tabpanel">
          <div class="card bg-dark border-secondary">
            <div class="card-body p-0">
              <!-- Table Header -->
              <div class="row g-0 p-3 border-bottom border-secondary text-muted small">
                <div class="col-3">Moneda</div>
                <div class="col-2 text-end">Importe</div>
                <div class="col-3 text-end">Precio de la moneda / Precio de coste</div>
                <div class="col-2 text-end">Cambio en 24 h</div>
                <div class="col-2 text-end">Operar</div>
              </div>

              <!-- Crypto List -->
              <div class="crypto-item p-3 border-bottom border-secondary">
                <div class="row g-0 align-items-center">
                  <div class="col-3">
                    <div class="d-flex align-items-center">
                      <div class="bg-primary rounded-circle me-3 d-flex align-items-center justify-content-center"
                        style="width: 32px; height: 32px;">
                        <span class="text-white fw-bold small">A</span>
                      </div>
                      <div>
                        <div class="text-white fw-bold">ACH</div>
                        <div class="text-muted small">Alchemy Pay</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-2 text-end">
                    <div class="text-white">10,00</div>
                    <div class="text-muted small">0,16 €</div>
                  </div>
                  <div class="col-3 text-end">
                    <div class="text-white">0,02 €</div>
                    <div class="text-muted small">—</div>
                  </div>
                  <div class="col-2 text-end">
                    <span class="text-success">+2,78%</span>
                  </div>
                  <div class="col-2 text-end">
                    <button class="btn btn-warning btn-sm">Operar</button>
                  </div>
                </div>
              </div>

              <div class="crypto-item p-3 border-bottom border-secondary">
                <div class="row g-0 align-items-center">
                  <div class="col-3">
                    <div class="d-flex align-items-center">
                      <div class="bg-success rounded-circle me-3 d-flex align-items-center justify-content-center"
                        style="width: 32px; height: 32px;">
                        <span class="text-white fw-bold small">U</span>
                      </div>
                      <div>
                        <div class="text-white fw-bold">USDT</div>
                        <div class="text-muted small">TetherUS</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-2 text-end">
                    <div class="text-white">0,16094922</div>
                    <div class="text-muted small">0,14 €</div>
                  </div>
                  <div class="col-3 text-end">
                    <div class="text-white">0,86 €</div>
                    <div class="text-muted small">—</div>
                  </div>
                  <div class="col-2 text-end">
                    <span class="text-danger">-0,01%</span>
                  </div>
                  <div class="col-2 text-end">
                    <button class="btn btn-warning btn-sm">Operar</button>
                  </div>
                </div>
              </div>

              <div class="crypto-item p-3">
                <div class="row g-0 align-items-center">
                  <div class="col-3">
                    <div class="d-flex align-items-center">
                      <div class="bg-info rounded-circle me-3 d-flex align-items-center justify-content-center"
                        style="width: 32px; height: 32px;">
                        <span class="text-white fw-bold small">R</span>
                      </div>
                      <div>
                        <div class="text-white fw-bold">RESOLV</div>
                        <div class="text-muted small">Resolv</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-2 text-end">
                    <div class="text-white">0,37884214</div>
                    <div class="text-muted small">0,05 €</div>
                  </div>
                  <div class="col-3 text-end">
                    <div class="text-white">0,13 €</div>
                    <div class="text-muted small">0,23 €</div>
                  </div>
                  <div class="col-2 text-end">
                    <span class="text-success">+8,55%</span>
                  </div>
                  <div class="col-2 text-end">
                    <button class="btn btn-warning btn-sm">Operar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="tab-pane fade" id="popular" role="tabpanel">
          <div class="card bg-dark border-secondary">
            <div class="card-body">
              <p class="text-muted">Contenido de Populares...</p>
            </div>
          </div>
        </div>

        <div class="tab-pane fade" id="new" role="tabpanel">
          <div class="card bg-dark border-secondary">
            <div class="card-body">
              <p class="text-muted">Contenido de Nueva inclusión...</p>
            </div>
          </div>
        </div>

        <div class="tab-pane fade" id="favorites" role="tabpanel">
          <div class="card bg-dark border-secondary">
            <div class="card-body">
              <p class="text-muted">Contenido de Favoritos...</p>
            </div>
          </div>
        </div>

        <div class="tab-pane fade" id="gainers" role="tabpanel">
          <div class="card bg-dark border-secondary">
            <div class="card-body">
              <p class="text-muted">Contenido de Principales ganadores...</p>
            </div>
          </div>
        </div>

        <div class="tab-pane fade" id="volume" role="tabpanel">
          <div class="card bg-dark border-secondary">
            <div class="card-body">
              <p class="text-muted">Contenido de Volumen en 24 h...</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Delete Account Modal -->
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
    </div>
  </AppLayout>
</template>

<style scoped lang="scss">
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