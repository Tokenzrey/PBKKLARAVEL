<x-app-layout>
    <div class="p-6 space-y-10">
        <h1 class="text-3xl font-bold mb-8">Component Sandbox</h1>

        {{-- Section: Button Link --}}
        <section>
            <h2 class="text-2xl font-semibold mb-4">Button Link Component</h2>
            <div class="flex gap-4">
                <x-button-link href="/" size="base" variant="primary">
                    Home
                </x-button-link>

                <x-button-link href="https://example.com" openNewTab="true" size="lg" variant="outline-primary">
                    External Link (New Tab)
                </x-button-link>

                <x-button-link href="/profile" size="sm" variant="success" leftIcon="heroicon-o-user">
                    Profile
                </x-button-link>

                <x-button-link href="/settings" size="base" variant="danger" rightIcon="heroicon-o-cog">
                    Settings
                </x-button-link>
            </div>
        </section>

        {{-- Section: Icon Link --}}
        <section>
            <h2 class="text-2xl font-semibold mb-4">Icon Link Component</h2>
            <div class="flex gap-4">
                <x-icon-link href="/" size="base" variant="primary" icon="heroicon-o-home" />
                <x-icon-link href="https://github.com" size="lg" variant="outline-success"
                    icon="heroicon-o-link" openNewTab="true" />
                <x-icon-link href="/trash" size="sm" variant="danger" icon="heroicon-o-trash" />
            </div>
        </section>

        {{-- Section: Unstyled Link --}}
        <section>
            <h2 class="text-2xl font-semibold mb-4">Unstyled Link Component</h2>
            <div class="flex gap-4">
                <x-unstyled-link href="/" class="text-blue-500 hover:underline">
                    Internal Link
                </x-unstyled-link>

                <x-unstyled-link href="https://example.com" openNewTab="true" class="text-green-500 hover:underline">
                    External Link (New Tab)
                </x-unstyled-link>
            </div>
        </section>
    </div>
</x-app-layout>
