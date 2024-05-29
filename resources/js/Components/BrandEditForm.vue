<script setup>
import axios from 'axios';
defineProps(['brand']);
</script>
<template>
    Author : {{brand.user.name}}
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" @submit.prevent="updateModel">
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="brand_name">
                Brand Name
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="brand_name"
                type="text"
                placeholder="Brand Name"
                v-model="brand.name"
            />
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="description">
                Description
            </label>
            <textarea
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="description"
                placeholder="Description"
                style="width: 100%;"
                v-model="brand.description"
            ></textarea>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="email">
                Email
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="email"
                type="email"
                placeholder="Enter contact email address"
                v-model="brand.email"
            />
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2" for="website">
                Website
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                id="website"
                type="text"
                placeholder="Website"
                v-model="brand.website"
            />
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2" for="phone_number">
                Phone Number
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                id="phone_number"
                type="text"
                placeholder="Website"
                v-model="brand.phone_number"
            />
        </div>
        <div class="flex items-center justify-between">
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit"
            >
                Update
            </button>
        </div>
    </form>
</template>

<script>
export default {
    props: ['brand'],

    data() {
        return {
            form: {
                name: '',
                description: '',
                // Добавьте здесь другие поля модели, которые необходимо обновить
            },
            errors: {},
        };
    },

    mounted() {
        this.form = { ...this.brand };
    },

    methods: {
        updateModel() {
            console.log( this.brand.id)
            // Отправка POST-запроса на обновление модели
            axios.post(`/brand/`+this.brand.id+`/update`, this.brand)
                .then(response => {
                    console.log(response.data)
                    this.$emit('brand-updated', response.data.brand);
                    this.form = { ...response.data.brand };
                    window.location.href = '/brand/'+this.brand.id+'/show';
                });
        },
    },
};
</script>
