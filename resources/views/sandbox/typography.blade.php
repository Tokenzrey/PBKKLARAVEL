<x-app-layout>
    <div class="p-6 space-y-10">
        <x-typography as="h3" variant="h3" weight="semibold" class="mb-8">
            Typography Component Sandbox
        </x-typography>

        {{-- Heading Variants --}}
        <section>
            <x-typography as="h4" variant="h4" weight="medium" class="mb-4">
                Heading Variants
            </x-typography>
            <div class="space-y-2">
                <x-typography as="h1" variant="h1" weight="extrabold">
                    Heading 1 - Extra Bold
                </x-typography>

                <x-typography as="h2" variant="h2" weight="bold">
                    Heading 2 - Bold
                </x-typography>

                <x-typography as="h3" variant="h3" weight="semibold">
                    Heading 3 - Semi Bold
                </x-typography>

                <x-typography as="h4" variant="h4" weight="medium">
                    Heading 4 - Medium
                </x-typography>

                <x-typography as="h5" variant="h5" weight="regular">
                    Heading 5 - Regular
                </x-typography>

                <x-typography as="h6" variant="h6">
                    Heading 6 - Default Weight
                </x-typography>
            </div>
        </section>

        {{-- Paragraph and Text Variants --}}
        <section>
            <x-typography as="h4" variant="h4" weight="medium" class="mb-4">
                Paragraph and Text Variants
            </x-typography>
            <div class="space-y-2">
                <x-typography as="p" variant="p" class="text-gray-800">
                    This is a paragraph with the default variant.
                </x-typography>

                <x-typography as="p" variant="p2" class="text-gray-600">
                    This is a small paragraph (p2).
                </x-typography>

                <x-typography as="span" variant="bt" weight="bold" class="text-blue-600">
                    Bold Span Text (bt) - Blue
                </x-typography>

                <x-typography as="span" variant="btn-sm" weight="semibold">
                    Semi-bold Button Text Span (btn-sm)
                </x-typography>

                <x-typography as="span" variant="p3" class="text-red-500">
                    This is a tiny text (p3) - Red
                </x-typography>
            </div>
        </section>

        {{-- Different Font Families --}}
        <section>
            <x-typography as="h4" variant="h4" weight="medium" class="mb-4">
                Different Font Families
            </x-typography>
            <div class="space-y-2">
                <x-typography as="p" font="poppins" weight="regular">
                    Poppins Font - Regular
                </x-typography>

                <x-typography as="p" font="futura" weight="bold">
                    Futura Font - Bold
                </x-typography>
            </div>
        </section>

        {{-- Custom Classes --}}
        <section>
            <x-typography as="h4" variant="h4" weight="medium" class="mb-4">
                Typography with Custom Classes
            </x-typography>
            <div class="space-y-2">
                <x-typography as="h2" variant="h2" class="text-green-700 uppercase tracking-wider">
                    Custom Heading 2 with Green Text and Uppercase
                </x-typography>

                <x-typography as="p" class="italic text-gray-500">
                    This paragraph is italic and gray.
                </x-typography>
            </div>
        </section>
    </div>
</x-app-layout>
