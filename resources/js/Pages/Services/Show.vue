<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ServiceCard from '@/Components/ServiceCard.vue';
import { useForm, Head } from '@inertiajs/inertia-vue3';

defineProps(['service']);
</script>
<template>
    <Head title="Service" />

    <AuthenticatedLayout>
        <div class="max-w-6xl mx-auto p-4 sm:p-6 lg:p-8">
            <ServiceCard :service="service"/>
        </div>
    </AuthenticatedLayout>
</template>
