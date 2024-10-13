<x-app-layout>
    <div class="p-6 space-y-10">
        <x-typography as="h1" variant="h1" weight="bold" class="mb-8">
            Comprehensive Bladewind UI Table Component Sandbox
        </x-typography>

        {{-- 1. Basic Table --}}
        <section>
            <x-typography as="h2" variant="h2" class="mb-4">
                1. Basic Table with Header
            </x-typography>
            <x-bladewind::table>
                <x-slot name="header">
                    <th>Name</th>
                    <th>Department</th>
                    <th>Email</th>
                </x-slot>
                <tr>
                    <td>Alfred Rowe</td>
                    <td>Consulting</td>
                    <td>alfred@therowe.com</td>
                </tr>
                <tr>
                    <td>Abigail Edwin</td>
                    <td>Quality Assurance</td>
                    <td>abigail@edwin.com</td>
                </tr>
            </x-bladewind::table>
        </section>

        {{-- 2. Table with Border, Divider, and Compact Mode --}}
        <section>
            <x-typography as="h2" variant="h2" class="mb-4">
                2. Table with Border, Divider, and Compact Mode
            </x-typography>
            <x-bladewind::table has_border="true" divider="thin" compact="true">
                <x-slot name="header">
                    <th>Name</th>
                    <th>Department</th>
                    <th>Email</th>
                </x-slot>
                <tr>
                    <td>Michael Ocansey</td>
                    <td>Engineering</td>
                    <td>mike@ocansey.com</td>
                </tr>
                <tr>
                    <td>John Doe</td>
                    <td>Virtual Reality</td>
                    <td>john@vrworld.com</td>
                </tr>
            </x-bladewind::table>
        </section>

        {{-- 3. Selectable and Checkable Table --}}
        <section>
            <x-typography as="h2" variant="h2" class="mb-4">
                3. Selectable and Checkable Table
            </x-typography>
            <x-bladewind::table selectable="true" checkable="true" name="staff_selection">
                <x-slot name="header">
                    <th>Name</th>
                    <th>Department</th>
                    <th>Email</th>
                </x-slot>
                <tr data-id="1">
                    <td>Alfred Rowe</td>
                    <td>Consulting</td>
                    <td>alfred@therowe.com</td>
                </tr>
                <tr data-id="2">
                    <td>Michael Ocansey</td>
                    <td>Engineering</td>
                    <td>mike@ocansey.com</td>
                </tr>
            </x-bladewind::table>
        </section>

        {{-- 4. Table with Action Icons --}}
        <section>
            <x-typography as="h2" variant="h2" class="mb-4">
                4. Table with Action Icons
            </x-typography>
            @php
            $action_icons = [
            "icon:chat-bubble-left | tip:Send Message | color:green | click:sendMessage('{first_name}')",
            "icon:pencil | click:redirect('/user/{id}')",
            "icon:trash | color:red | click:deleteUser({id}, '{first_name}')",
            ];
            @endphp
            <x-bladewind::table :action_icons="$action_icons" name="staff_table" selectable="true">
                <x-slot name="header">
                    <th>Name</th>
                    <th>Department</th>
                    <th>Email</th>
                    <th>Actions</th>
                </x-slot>
                <tr data-id="1">
                    <td>Alfred Rowe</td>
                    <td>Consulting</td>
                    <td>alfred@therowe.com</td>
                    <td class="flex gap-4">
                        <!-- Edit Button -->
                        <a class="bg-blue-500 hover:bg-blue-600 text-white shadow rounded-full p-2 text-sm me-1"
                            title="Edit">
                            <x-heroicon-o-pencil-square class="w-[20px]" />
                        </a>

                        <!-- Delete Button -->
                        <a class="bg-red-500 hover:bg-red-600 text-white shadow rounded-full p-2 text-sm">
                            <x-heroicon-s-trash class="w-[20px]" />
                        </a>
                    </td>
                </tr>
                <tr data-id="2">
                    <td>Michael Ocansey</td>
                    <td>Engineering</td>
                    <td>mike@ocansey.com</td>
                    <td class="flex gap-4">
                        <!-- Edit Button -->
                        <a class="bg-blue-500 hover:bg-blue-600 text-white shadow rounded-full p-2 text-sm me-1"
                            title="Edit">
                            <x-heroicon-o-pencil-square class="w-[20px]" />
                        </a>

                        <!-- Delete Button -->
                        <a class="bg-red-500 hover:bg-red-600 text-white shadow rounded-full p-2 text-sm">
                            <x-heroicon-s-trash class="w-[20px]" />
                        </a>
                    </td>
                </tr>
            </x-bladewind::table>
        </section>

        {{-- 5. Searchable Table --}}
        <section>
            <x-typography as="h2" variant="h2" class="mb-4">
                5. Searchable Table
            </x-typography>
            <x-bladewind::table searchable="true" search_placeholder="Search staff..." name="searchable_table">
                <x-slot name="header">
                    <th>Name</th>
                    <th>Department</th>
                    <th>Email</th>
                </x-slot>
                <tr>
                    <td>Abigail Edwin</td>
                    <td>Quality Assurance</td>
                    <td>abigail@edwin.com</td>
                </tr>
                <tr>
                    <td>John Doe</td>
                    <td>Virtual Reality</td>
                    <td>john@vrworld.com</td>
                </tr>
            </x-bladewind::table>
        </section>

        {{-- 6. Grouped Table --}}
        <section>
            <x-typography as="h2" variant="h2" class="mb-4">
                6. Grouped Table by Department
            </x-typography>
            <x-bladewind::table groupby="department" divider="thin" compact="true">
                <x-slot name="header">
                    <th>Name</th>
                    <th>Email</th>
                </x-slot>
                <tr data-id="1">
                    <td>Michael Ocansey</td>
                    <td>mike@ocansey.com</td>
                </tr>
                <tr data-id="2">
                    <td>Abigail Edwin</td>
                    <td>abigail@edwin.com</td>
                </tr>
            </x-bladewind::table>
        </section>

        {{-- 7. Table with Pre-Selected Rows --}}
        <section>
            <x-typography as="h2" variant="h2" class="mb-4">
                7. Table with Pre-Selected Rows
            </x-typography>
            <x-bladewind::table selectable="true" selected_value="1,2" name="preselected_table">
                <x-slot name="header">
                    <th>Name</th>
                    <th>Email</th>
                </x-slot>
                <tr data-id="1">
                    <td>Alfred Rowe</td>
                    <td>alfred@therowe.com</td>
                </tr>
                <tr data-id="2">
                    <td>Michael Ocansey</td>
                    <td>mike@ocansey.com</td>
                </tr>
            </x-bladewind::table>
        </section>

        {{-- 8. Table with Empty State --}}
        <section>
            <x-typography as="h2" variant="h2" class="mb-4">
                8. Table with Empty State
            </x-typography>
            @php
            $no_data = [];
            @endphp
            <x-bladewind::table :data="$no_data" no_data_message="No records found" />
        </section>
    </div>

    <script>
        function sendMessage(first_name) {
            alert(`Send message to ${first_name}`);
        }

        function deleteUser(id, first_name) {
            alert(`Deleted user: ${first_name}`);
        }

        function redirect(url) {
            window.open(url, '_blank');
        }
    </script>
</x-app-layout>