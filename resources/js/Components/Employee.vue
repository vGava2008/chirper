<script setup>
    defineProps(['employee']);
</script>
<template>
    <div class="max-w-6xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="bg-gray-800 text-white py-4 px-6 rounded-t">
            <h2 class="text-xl font-bold">{{ employee.first_name }}</h2>
        </div>
        <div class="p-4">
            Phone number:
            <p>{{ employee.phone_number }}</p>
        </div>
        <div class="flex items-center justify-between">
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="button"
                @click="goBack"
            >
                Go back
            </button>
            <a :href="route('employee.edit', employee.id)">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="button"
                >
                    Edit
                </button>
            </a>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            images: [
                { url: 'https://www.planetware.com/wpimages/2020/02/france-in-pictures-beautiful-places-to-photograph-eiffel-tower.jpg', alt: 'Eiffel Tower' },
                { url: 'https://www.planetware.com/wpimages/2020/02/france-in-pictures-beautiful-places-to-photograph-mont-st-michel.jpg', alt: 'Mont Saint-Michel' },
                { url: 'https://www.planetware.com/wpimages/2020/02/france-in-pictures-beautiful-places-to-photograph-versailles-gardens.jpg', alt: 'Versailles Gardens' },
                { url: 'https://www.planetware.com/wpimages/2020/02/france-in-pictures-beautiful-places-to-photograph-chateau-de-chenonceau.jpg', alt: 'Château de Chenonceau\n' },
                { url: 'https://www.planetware.com/wpimages/2020/02/france-in-pictures-beautiful-places-to-photograph-st-tropez-street.jpg', alt: 'Saint-Tropez' },
            ],
        };
    },
    methods: {
        goBack() {
            window.history.back();
        },
    }
};
</script>
