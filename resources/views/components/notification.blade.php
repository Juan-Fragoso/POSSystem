  <div x-data="{
      notifications: [],
      add(data) {
          const id = Date.now();
          this.notifications.push({
              id,
              variant: data.variant || 'success',
              title: data.title || 'Mensaje',
              message: data.message || ''
          });
          // Auto-cerrar después de 5 segundos
          setTimeout(() => {
              this.notifications = this.notifications.filter(n => n.id !== id);
          }, 5000);
      },
      init() {
          // Lógica para capturar el session()->flash('notify')
          @if(session()->has('notify'))
          this.add({
              variant: '{{ session('notify.variant') }}',
              title: '{{ session('notify.title') }}',
              message: '{{ session('notify.message') }}'
          });
          @endif
      }
  }" @notify.window="add($event.detail)"
      class="fixed top-5 right-5 z-[100] flex flex-col gap-3 w-full max-w-sm" data-navigate-once>

      <template x-for="n in notifications" :key="n.id">
          <div x-transition:enter="transition ease-out duration-300"
              x-transition:enter-start="opacity-0 transform translate-x-8"
              x-transition:enter-end="opacity-100 transform translate-x-0"
              x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
              x-transition:leave-end="opacity-0"
              :class="{
                  'bg-green-600': n.variant === 'success',
                  'bg-red-600': n.variant === 'error' || n.variant === 'danger',
                  'bg-blue-600': n.variant === 'info',
                  'bg-yellow-500': n.variant === 'warning'
              }"
              class="p-4 rounded-lg shadow-xl text-white flex justify-between items-start border-l-4 border-black/20">

              <div class="flex-1">
                  <div class="flex items-center gap-2 font-bold">
                      <template x-if="n.variant === 'success'">
                          <flux:icon.check-circle variant="mini" class="w-5 h-5" />
                      </template>
                      <template x-if="n.variant === 'error' || n.variant === 'danger'">
                          <flux:icon.exclamation-triangle variant="mini" class="w-5 h-5" />
                      </template>
                      <span x-text="n.title"></span>
                  </div>
                  <div x-text="n.message" class="text-sm opacity-90 mt-1"></div>
              </div>

              <button @click="notifications = notifications.filter(notif => notif.id !== n.id)"
                  class="ml-4 hover:bg-black/10 rounded-full p-1 transition-colors">
                  <flux:icon.x-mark variant="mini" class="w-4 h-4" />
              </button>
          </div>
      </template>
  </div>
