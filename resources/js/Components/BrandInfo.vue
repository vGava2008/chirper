<script setup>
import BrandServicesTable from "@/Components/BrandServicesTable.vue";

</script>
<template>
    <div class="p-4">
        <h1 class="text-2xl font-bold">{{ brand.name }}</h1>
        <a :href="`/brand/`+brand.id+`/edit`">
            <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                Edit
            </button>
        </a>
        <div class="mt-4">
            <p class="text-gray-600">{{ brand.description }}</p>
            <p class="text-gray-600">Website: <a :href="'http://'+brand.website" target="_blank">{{ brand.website }}</a></p>
            <p class="text-gray-600">Phone number: {{ brand.phone_number }}</p>
        </div>
    </div>

    <div class="max-w-6xl mx-auto p-4 sm:p-6 lg:p-8">
        <BrandServicesTable :services="brand.services" />
    </div>
<!--    <ServicesTable :services="brand.services" />-->

</template>

<script>
export default {
    props: {
        brand: {
            type: Object,
            required: true,
        },
    },
};
</script>

<style>
/* Optional: add custom styles here */
</style>
