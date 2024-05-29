<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import BrandEditForm from '@/Components/BrandEditForm.vue';
defineProps(['brand']);
</script>
<template>
    <Head title="Brands" />
    <AuthenticatedLayout>
        <div class="max-w-6xl mx-auto p-4 sm:p-6 lg:p-8">
            <BrandEditForm :brand="brand" />
        </div>
    </AuthenticatedLayout>
</template>

<script>
export default {
    name: "Edit"
}

</script>

<style scoped>

</style>
