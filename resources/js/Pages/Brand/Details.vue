<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import BrandInfo from '@/Components/BrandInfo.vue';
    defineProps(['brand']);
</script>
<template>
    <Head title="Brands" />
    <AuthenticatedLayout>
        <div class="max-w-6xl mx-auto p-4 sm:p-6 lg:p-8">
            <BrandInfo :brand="brand" />
        </div>
    </AuthenticatedLayout>
</template>

<script>
export default {
    name: "Details"
}

</script>

<style scoped>

</style>
