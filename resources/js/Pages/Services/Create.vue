<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm, Head } from '@inertiajs/inertia-vue3';

defineProps(['categories']);

const form = useForm({
    name: '',
    description: '',
    phone_numbers: '',
    category: '',
});

</script>
<template>
    <Head title="Create new service" />
    <AuthenticatedLayout>
        <div class="max-w-6xl mx-auto p-4 sm:p-6 lg:p-8">
<!--        {{ categories }}-->
        <form @submit.prevent="form.post(route('service.store'), { onSuccess: () => form.reset() })">
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="name">
                    Service Name
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="name"
                    type="text"
                    placeholder="Name"
                    v-model="form.name"
                />
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="name">
                    Service Description
                </label>
                <textarea
                    v-model="form.description"
                    placeholder="Description of service"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                ></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="phone_numbers">
                    Phone Number
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="phone_numbers"
                    type="text"
                    placeholder="Phone Numbers"
                    v-model="form.phone_numbers"
                />
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="phone_numbers">
                    Category
                </label>
                <select class="w-full" name="category" id="category" v-model="form.category">
                    <option v-for="category in categories"
                            :value="category.id">{{ category.name }}</option>
                </select>
            </div>

<!--            <InputError :message="form.errors.message" class="mt-2" />-->
            <div class="mt-6 text-right">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
            </div>
        </form>
    </div>
    </AuthenticatedLayout>
</template>
