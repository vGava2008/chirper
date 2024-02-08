<template>
    <nav>
        <ol>
            <li v-for="(crumb, index) in crumbs" :key="index">
                <a :href="crumb.url">{{ crumb.label }}</a>
            </li>
        </ol>
    </nav>
</template>

<script>
export default {
    props: {
        crumbs: {
            type: Array,
            required: true
        }
    }
};
</script>

<style>
/* Стилизуйте хлебные крошки по вашему усмотрению */
</style>
