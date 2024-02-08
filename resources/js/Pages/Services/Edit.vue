<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ServiceEditForm from '@/Components/ServiceEditForm.vue';
defineProps(['service']);
</script>
<template>
    <Head title="Service" />
    <AuthenticatedLayout>
        <div class="max-w-6xl mx-auto p-4 sm:p-6 lg:p-8">
            <ServiceEditForm :service="service" />
        </div>
    </AuthenticatedLayout>
</template>
