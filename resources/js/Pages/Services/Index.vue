<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ServicesTable from '@/Components/ServicesTable.vue'
import { useForm, Head } from '@inertiajs/inertia-vue3';


const form = useForm({
    name: '',
    description: '',
    phone_numbers: '',
    web_pages: '',
    socials: '',
    brand_id: '',
});

defineProps(['services']);
</script>

<template>
    <Head title="Services" />
    <AuthenticatedLayout>
        <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
            <ServicesTable :services="services"/>
            <div class="mt-6 text-right">
                <a :href="route('service.create')">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add new service</button>
                </a>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
