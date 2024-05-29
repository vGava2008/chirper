<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    defineProps(['category', 'parents', 'children'])
    import {useForm} from "@inertiajs/inertia-vue3";
    import CategoryItem from '@/Components/CategoryItem.vue';

    const form = useForm({
        name: '',
        parent_id: '',
    });
</script>
<template>
    <AuthenticatedLayout>
        <div class="max-w-6xl mx-auto p-4 sm:p-6 lg:p-8">
            <div>
                <form @submit.prevent="updateModel">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">Category Name:</label>
                        <input type="text" id="name" v-model="category.name"
                               class="w-full px-4 py-2 mt-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" />
                    </div>
                    <div class="mb-4">
                        <label for="parent_id" class="block text-gray-700">Parent:</label>
                        <select
                            :disabled="children.length > 0"
                            id="parent_id" v-model="category.parent_id"
                                class="w-full px-4 py-2 mt-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="null">Parent</option>
                            <option v-if="!children.length > 0" v-for="parent in parents" :key="parent.id"
                                    :value="parent.id">
                                {{ parent.name }}
                            </option>
                        </select>
                        <span v-if="children.length > 0" class="text-red-500 text-sm">
                            Если в категории есть активные вложенные категории, нельзя задать ей родителя.
                            Сперва нужно удалить все вложенные категории или перенести их в другую родительскую категорию.
                        </span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="mt-6 text-right">
                            <button type="button"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                @click="cancel">Cancel</button>
                        </div>
                        <div class="mt-6 text-right">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <ul>
                <category-item :categories="children"></category-item>
            </ul>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import {useForm} from "@inertiajs/inertia-vue3";

export default {

    props: ['category', 'parents', 'children'],
    data: () => ({
        form: {
        }
    }),
    methods: {
        cancel() {
            window.history.go(-1);
        },
        updateModel() {
            const requestData = {
                name: this.category.name,
                parent_id: this.category.parent_id === '' ? null : this.category.parent_id
            };
            console.log(requestData);
            axios.put(route('category.update', this.category.id), requestData)
                .then(response => {
                    window.location.href = route('categories.index');
                });
        },
    },
}
</script>

<style scoped>

</style>
<style>
.rotate-180 {
    transform: rotate(180deg);
}

.btn {
    padding: 0.5rem 1rem;
    background-color: #4299e1;
    color: #fff;
    border: none;
    border-radius: 0.25rem;
    cursor: pointer;
}
</style>
