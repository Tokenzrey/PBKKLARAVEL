<x-app-layout>
    <div class="p-6 space-y-10">
        <x-typography as="h1" variant="h1" weight="bold" class="mb-8">
            Bladewind UI Modal Component Sandbox
        </x-typography>

        {{-- 1. Basic Modals --}}
        <section>
            <x-typography as="h2" variant="h2" class="mb-4">1. Basic Modals</x-typography>
            <div class="space-x-2">
                <x-bladewind::button onclick="showModal('basic')">Open Basic Modal</x-bladewind::button>
                <x-bladewind::button onclick="showModal('with-title')">Modal with Title</x-bladewind::button>
            </div>

            <x-bladewind::modal name="basic">
                This is a basic modal without a title.
            </x-bladewind::modal>

            <x-bladewind::modal name="with-title" title="Modal with Title">
                This modal includes a title.
            </x-bladewind::modal>
        </section>

        {{-- 2. Different Types of Modals --}}
        <section>
            <x-typography as="h2" variant="h2" class="mb-4">2. Modal Types</x-typography>
            <div class="space-x-2">
                <x-bladewind::button onclick="showModal('info')">Info</x-bladewind::button>
                <x-bladewind::button onclick="showModal('error')">Error</x-bladewind::button>
                <x-bladewind::button onclick="showModal('warning')">Warning</x-bladewind::button>
                <x-bladewind::button onclick="showModal('success')">Success</x-bladewind::button>
            </div>

            <x-bladewind::modal name="info" type="info" title="Info">
                This is an info modal.
            </x-bladewind::modal>

            <x-bladewind::modal name="error" type="error" title="Error">
                Something went wrong.
            </x-bladewind::modal>

            <x-bladewind::modal name="warning" type="warning" title="Warning">
                This is a warning message.
            </x-bladewind::modal>

            <x-bladewind::modal name="success" type="success" title="Success">
                Operation completed successfully!
            </x-bladewind::modal>
        </section>

        {{-- 3. Different Modal Sizes --}}
        <section>
            <x-typography as="h2" variant="h2" class="mb-4">3. Modal Sizes</x-typography>
            <div class="space-x-2">
                <x-bladewind::button onclick="showModal('tiny')">Tiny</x-bladewind::button>
                <x-bladewind::button onclick="showModal('small')">Small</x-bladewind::button>
                <x-bladewind::button onclick="showModal('medium')">Medium</x-bladewind::button>
                <x-bladewind::button onclick="showModal('large')">Large</x-bladewind::button>
                <x-bladewind::button onclick="showModal('xl')">XL</x-bladewind::button>
                <x-bladewind::button onclick="showModal('omg')">OMG</x-bladewind::button>
            </div>

            <x-bladewind::modal name="tiny" size="tiny" title="Tiny Modal">
                This is a tiny modal.
            </x-bladewind::modal>

            <x-bladewind::modal name="small" size="small" title="Small Modal">
                This is a small modal.
            </x-bladewind::modal>

            <x-bladewind::modal name="medium" title="Medium Modal">
                This is a medium-sized modal.
            </x-bladewind::modal>

            <x-bladewind::modal name="large" size="large" title="Large Modal">
                This is a large modal.
            </x-bladewind::modal>

            <x-bladewind::modal name="xl" size="xl" title="XL Modal">
                This is an extra-large modal.
            </x-bladewind::modal>

            <x-bladewind::modal name="omg" size="omg" title="OMG Modal">
                I take up the whole screen!
            </x-bladewind::modal>
        </section>

        {{-- 4. Custom Actions & Close Icon --}}
        <section>
            <x-typography as="h2" variant="h2" class="mb-4">4. Custom Actions & Close Icon</x-typography>
            <x-bladewind::button onclick="showModal('custom-actions')">Open Custom Actions Modal</x-bladewind::button>
            <x-bladewind::modal name="custom-actions" title="Custom Actions" show_close_icon="true"
                ok_button_action="alert('Action confirmed')" cancel_button_action="alert('Action cancelled')">
                Confirm your action.
            </x-bladewind::modal>
        </section>

        {{-- 5. Non-Dismissible Modal --}}
        <section>
            <x-typography as="h2" variant="h2" class="mb-4">5. Non-Dismissible Modal</x-typography>
            <x-bladewind::button onclick="showModal('non-dismissible')">Open Non-Dismissible Modal</x-bladewind::button>
            <x-bladewind::modal name="non-dismissible" title="Locked Modal" backdrop_can_close="false">
                This modal cannot be closed by clicking the backdrop.
            </x-bladewind::modal>
        </section>

        {{-- 6. Form Submission in Modal --}}
        <section>
            <x-typography as="h2" variant="h2" class="mb-4">6. Form Submission in Modal</x-typography>
            <x-bladewind::button onclick="showModal('form-modal')">Edit Profile</x-bladewind::button>
            <x-bladewind::modal name="form-modal" title="Edit Profile" ok_button_label="Save" close_after_action="false"
                ok_button_action="submitForm()">

                <form class="profile-form">
                    <x-bladewind::input name="first_name" label="First Name" required="true" />
                    <x-bladewind::input name="last_name" label="Last Name" required="true" />
                    <x-bladewind::input name="email" label="Email" required="true" />
                    <x-bladewind::button type="submit" class="mt-4">Submit</x-bladewind::button>
                </form>
            </x-bladewind::modal>
        </section>
    </div>

    <script>
        function submitForm() {
            if (validateForm('.profile-form')) {
                alert('Profile submitted successfully!');
                hideModal('form-modal');
            } else {
                alert('Please fill all required fields.');
            }
        }
    </script>
</x-app-layout>