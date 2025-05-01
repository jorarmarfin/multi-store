<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Platform')" class="grid">
                    <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>{{ __('Dashboard') }}</flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>
            {{-- Grupo desplegable (submenú) --}}
            <flux:navlist.group heading="Almacén" expandable>
                <flux:navlist.item
                    icon="arrow-down-left"
                    :href="route('warehouse.entries')"
                    :current="request()->routeIs('warehouse.entries')"
                    wire:navigate
                >
                    Ingreso a almacén
                </flux:navlist.item>

                <flux:navlist.item
                    icon="arrow-up-right"
                    :href="route('warehouse.outputs')"
                    :current="request()->routeIs('warehouse.outputs')"
                    wire:navigate
                >
                    Salida a almacén
                </flux:navlist.item>

                <flux:navlist.item
                    icon="inbox-stack"
                    :href="route('warehouse.products')"
                    :current="request()->routeIs('warehouse.products')"
                    wire:navigate
                >
                    Productos
                </flux:navlist.item>

                <flux:navlist.item
                    icon="user-group"
                    :href="route('warehouse.suppliers')"
                    :current="request()->routeIs('warehouse.suppliers')"
                    wire:navigate
                >
                    Proveedores
                </flux:navlist.item>

                <flux:navlist.item
                    icon="bookmark"
                    :href="route('warehouse.categories')"
                    :current="request()->routeIs('warehouse.categories')"
                    wire:navigate
                >
                    Categorías
                </flux:navlist.item>

                <flux:navlist.item
                    icon="archive-box"
                    :href="route('warehouse.units')"
                    :current="request()->routeIs('warehouse.units')"
                    wire:navigate
                >
                    Unidades
                </flux:navlist.item>
            </flux:navlist.group>
            <flux:navlist.group heading="Compras" expandable>
                <flux:navlist.item
                    icon="rectangle-stack"
                    :href="route('dashboard')"
                    :current="request()->routeIs('dashboard')"
                    wire:navigate
                >
                    Artículos
                </flux:navlist.item>

                <flux:navlist.item
                    icon="bookmark"
                    :href="route('dashboard')"
                    :current="request()->routeIs('dashboard')"
                    wire:navigate
                >
                    Categorías
                </flux:navlist.item>
            </flux:navlist.group>
            <flux:navlist.group heading="Ventas" expandable>
                <flux:navlist.item
                    icon="rectangle-stack"
                    :href="route('dashboard')"
                    :current="request()->routeIs('dashboard')"
                    wire:navigate
                >
                    Artículos
                </flux:navlist.item>

                <flux:navlist.item
                    icon="bookmark"
                    :href="route('dashboard')"
                    :current="request()->routeIs('dashboard')"
                    wire:navigate
                >
                    Categorías
                </flux:navlist.item>
            </flux:navlist.group>
            <flux:navlist.group heading="Acceso" expandable>
                <flux:navlist.item
                    icon="rectangle-stack"
                    :href="route('dashboard')"
                    :current="request()->routeIs('dashboard')"
                    wire:navigate
                >
                    Artículos
                </flux:navlist.item>

                <flux:navlist.item
                    icon="bookmark"
                    :href="route('dashboard')"
                    :current="request()->routeIs('dashboard')"
                    wire:navigate
                >
                    Categorías
                </flux:navlist.item>
            </flux:navlist.group>
            <flux:navlist.group heading="Consultas" expandable>
                <flux:navlist.item
                    icon="rectangle-stack"
                    :href="route('dashboard')"
                    :current="request()->routeIs('dashboard')"
                    wire:navigate
                >
                    Compras
                </flux:navlist.item>

                <flux:navlist.item
                    icon="bookmark"
                    :href="route('dashboard')"
                    :current="request()->routeIs('dashboard')"
                    wire:navigate
                >
                    Ventas
                </flux:navlist.item>
            </flux:navlist.group>

            <flux:spacer />



            <!-- Desktop User Menu -->
            <flux:dropdown position="bottom" align="start">
                <flux:profile
                    :name="auth()->user()->name"
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevrons-up-down"
                />

                <flux:menu class="w-[220px]">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @fluxScripts
        @yield('scripts')
        <script>
            document.addEventListener('livewire:init', () => {
                Livewire.on('alert', function (data) {
                    Swal.fire({
                        title: data[0].title,
                        text: data[0].message,
                        icon: data[0].icon,
                        confirmButtonText: 'ok'
                    })
                });
            });
        </script>
    </body>
</html>
