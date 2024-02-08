<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import NewCategoryForm from "@/Components/NewCategoryForm.vue";
</script>
<template>
    <Head title="Categories" />
    <AuthenticatedLayout>
        <div class="max-w-6xl mx-auto p-4 sm:p-6 lg:p-8">

            <NewCategoryForm :categories="categories" class="mb-8"></NewCategoryForm>

            <ul>
                <div class="flex justify-between mb-4">
                    <button class="btn hover:bg-blue-600" @click="openAll">Open All</button>
                    <button class="btn hover:bg-blue-600" @click="closeAll">Close All</button>
                </div>
                <category-item :categories="categories"></category-item>
            </ul>

        </div>
    </AuthenticatedLayout>
</template>

<script>
import CategoryItem from '@/Components/CategoryItem.vue';

export default {
    props: {
        categories: {
            type: Array,
            default: () => [],
        },
    },
    components: {
        CategoryItem,
    },
    methods: {
        openAll() {
            this.categories.forEach((category) => {
                category.open = true;
            });
        },
        closeAll() {
            this.categories.forEach((category) => {
                category.open = false;
            });
        },
    },
};
</script>
