<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Brand from '@/Components/Brand.vue';
import BrandTable from '@/Components/BrandTable.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/inertia-vue3';

defineProps(['brands']);

const form = useForm({
    message: '',
});
</script>

<template>
    <Head title="Brands" />
    <AuthenticatedLayout>
        <div class="max-w-6xl mx-auto p-4 sm:p-6 lg:p-8">
            <BrandTable :brands="brands"/>
        </div>
    </AuthenticatedLayout>
</template>
