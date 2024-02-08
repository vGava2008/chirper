<script setup>
import {useForm} from "@inertiajs/inertia-vue3";

const form = useForm({
    name: '',
    parentId: '',
});
</script>
<template>
    <div>
        <form @submit.prevent="form.post(route('category.store'), { onSuccess: () => form.reset() })">
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Category Name:</label>
                <input type="text" id="name" v-model="form.name" class="w-full px-4 py-2 mt-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" />
            </div>
            <div class="mb-4">
                <label for="parent" class="block text-gray-700">Parent:</label>
                <select id="parent" v-model="form.parentId" class="w-full px-4 py-2 mt-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">No parent</option>
                    <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
                </select>
            </div>
            <button type="submit" class=" btn px-4 py-2 hover:bg-blue-600">Add Category</button>
        </form>
    </div>
</template>

<script>
export default {
    name: "NewCategoryForm",
    props : {
        categories: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            form: {
                name: '',
                parentId: '',
            },
        };
    },
    methods: {
        addCategory() {
            // Logic to add the new category
            console.log(this.newCategory);
            // Reset the form after submission
            this.newCategory.name = '';
            this.newCategory.parentId = '';
        },
    },
};
</script>
