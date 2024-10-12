<x-app-layout>
    <div class="p-6 space-y-10">
        <x-typography as="h1" variant="h1" weight="bold" class="mb-8">
            Button Component Sandbox
        </x-typography>

        {{-- Button Variants and Sizes --}}
        <section>
            <x-typography as="h2" variant="h2" class="mb-4">
                Variants and Sizes
            </x-typography>
            <div class="flex flex-wrap gap-4">
                {{-- Primary Buttons --}}
                <x-button variant="primary" size="sm">Primary Small</x-button>
                <x-button variant="primary" size="base">Primary Base</x-button>
                <x-button variant="primary" size="lg">Primary Large</x-button>

                {{-- Success Buttons --}}
                <x-button variant="success" size="sm">Success Small</x-button>
                <x-button variant="success" size="base">Success Base</x-button>
                <x-button variant="success" size="lg">Success Large</x-button>

                {{-- Danger Buttons --}}
                <x-button variant="danger" size="sm">Danger Small</x-button>
                <x-button variant="danger" size="base">Danger Base</x-button>
                <x-button variant="danger" size="lg">Danger Large</x-button>

                {{-- Outline Buttons --}}
                <x-button variant="outline-primary" size="base">Outline Primary</x-button>
                <x-button variant="outline-success" size="base">Outline Success</x-button>
                <x-button variant="outline-danger" size="base">Outline Danger</x-button>
            </div>
        </section>

        {{-- Button with Icons --}}
        <section>
            <x-typography as="h2" variant="h2" class="mb-4">
                Buttons with Icons
            </x-typography>
            <div class="flex flex-wrap gap-4">
                <x-button variant="primary" size="base" leftIcon="heroicon-o-home">Home</x-button>
                <x-button variant="success" size="base" rightIcon="heroicon-o-check">Submit</x-button>
                <x-button variant="danger" size="base" leftIcon="heroicon-o-trash" rightIcon="heroicon-o-x-mark">Delete
                </x-button>
            </div>
        </section>

        {{-- Button Loading State --}}
        <section>
            <x-typography as="h2" variant="h2" class="mb-4">
                Button Loading State
            </x-typography>
            <div class="flex flex-wrap gap-4">
                <x-button variant="primary" size="base" isLoading="true">Loading</x-button>
                <x-button variant="success" size="base" isLoading="true" leftIcon="heroicon-c-arrow-path">Saving
                </x-button>
            </div>
        </section>

        {{-- Disabled Buttons --}}
        <section>
            <x-typography as="h2" variant="h2" class="mb-4">
                Disabled Buttons
            </x-typography>
            <div class="flex flex-wrap gap-4">
                <x-button variant="primary" size="base" disabled="true">Primary Disabled</x-button>
                <x-button variant="success" size="base" disabled="true">Success Disabled</x-button>
                <x-button variant="danger" size="base" disabled="true">Danger Disabled</x-button>
            </div>
        </section>

        <x-typography as="h1" variant="h1" weight="bold" class="mt-8">
            Icon Button Component Sandbox
        </x-typography>

        {{-- Icon Buttons Variants and Sizes --}}
        <section>
            <x-typography as="h2" variant="h2" class="mb-4">
                Icon Button Variants and Sizes
            </x-typography>
            <div class="flex flex-wrap gap-4">
                {{-- Primary Icon Buttons --}}
                <x-icon-button variant="primary" size="sm" icon="heroicon-o-home" />
                <x-icon-button variant="primary" size="base" icon="heroicon-o-home" />
                <x-icon-button variant="primary" size="lg" icon="heroicon-o-home" />

                {{-- Success Icon Buttons --}}
                <x-icon-button variant="success" size="sm" icon="heroicon-o-check" />
                <x-icon-button variant="success" size="base" icon="heroicon-o-check" />
                <x-icon-button variant="success" size="lg" icon="heroicon-o-check" />

                {{-- Danger Icon Buttons --}}
                <x-icon-button variant="danger" size="sm" icon="heroicon-o-trash" />
                <x-icon-button variant="danger" size="base" icon="heroicon-o-trash" />
                <x-icon-button variant="danger" size="lg" icon="heroicon-o-trash" />

                {{-- Outline Icon Buttons --}}
                <x-icon-button variant="outline-primary" size="base" icon="heroicon-c-arrow-path" />
                <x-icon-button variant="outline-success" size="base" icon="heroicon-c-arrow-path" />
                <x-icon-button variant="outline-danger" size="base" icon="heroicon-c-arrow-path" />
            </div>
        </section>

        {{-- Disabled Icon Buttons --}}
        <section>
            <x-typography as="h2" variant="h2" class="mb-4">
                Disabled Icon Buttons
            </x-typography>
            <div class="flex flex-wrap gap-4">
                <x-icon-button variant="primary" size="base" icon="heroicon-o-home" disabled="true" />
                <x-icon-button variant="success" size="base" icon="heroicon-o-check" disabled="true" />
                <x-icon-button variant="danger" size="base" icon="heroicon-o-trash" disabled="true" />
            </div>
        </section>
    </div>
</x-app-layout>
