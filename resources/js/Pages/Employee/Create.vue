<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ServicesTable from '@/Components/ServicesTable.vue'
import { useForm, Head } from '@inertiajs/inertia-vue3';

const form = useForm({
    first_name: '',
    phone_number: '',
    service_id: '',
});

</script>
<script>
export default {
    props: {
        services: {
            type: Array,
            required: true
        }
    },
}
</script>
<template>
    <Head title="Employee create" />
    <AuthenticatedLayout>
        <div class="max-w-6xl mx-auto p-4 sm:p-6 lg:p-8">
        <form @submit.prevent="form.post(route('employee.store'), { onSuccess: () => form.reset() })">
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="first_name">
                    Employee Name
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="first_name"
                    type="text"
                    placeholder="First Name"
                    v-model="form.first_name"
                />
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="phone_number">
                    Employee Phone number
                </label>
                <textarea
                    v-model="form.phone_number"
                    placeholder="Phone number employee"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                ></textarea>
            </div>
            <div class="mb-4">
                <div>
                    <label for="service" class="block text-gray-700">Service:</label>
                    <select id="service" v-model="form.service_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">Select a service</option>
                        <option v-for="service in services" :key="service.id" :value="service.id">{{ service.name }}</option>
                    </select>
                </div>
            </div>

<!--            <InputError :message="form.errors.message" class="mt-2" />-->
            <div class="mt-6 text-right">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
            </div>
        </form>
    </div>
    </AuthenticatedLayout>
</template>
