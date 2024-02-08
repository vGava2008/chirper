<template>
    <div>

        <ul>
            <li v-for="category in categories" :key="category.id">
                <div
                    class="mt-1 mb-1 p-1.5 flex items-center justify-between cursor-pointer bg-gray-200 rounded"
                    :class="{
                        'bg-gray-200': category?.children?.length,
                        'hover:bg-gray-400': true
                    }"
                    @click="toggleCategory(category)"
                >
                    <span class="hover:text-amber-200"
                        :class="{'font-bold' : !category.parent}">
                        <a :href="route('category.edit', category.id)"
                        @click.stop="false">{{
                            category.name }}</a>
                    </span>
                        <svg
                            v-if="category?.children?.length"
                            class="w-4 h-4 text-gray-600 transition-transform transform hover:text-amber-200"
                            :class="{ 'rotate-180': category.open }"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 9l-7 7-7-7"
                            />
                        </svg>
                </div>
                <ul v-if="category.open" class="pl-10 ">
                    <li class="p-1.5  cursor-pointer bg-gray-200 hover:bg-gray-400 rounded" v-for="child in
                    category.children"
                        :key="child.id">
                        <span
                            class="pl-5 hover:text-amber-200"><a :href="route('category.edit', child.id)">{{ child.name
                            }}</a></span>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props : {
        categories: {
            type: Object,
            required: true
        }
    },
    methods: {
        toggleCategory(category) {
            console.log(this);
            category.open = !category.open;
        },
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
