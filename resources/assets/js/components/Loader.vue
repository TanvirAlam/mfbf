<template>
    <div v-if="isLoading" class="is-fullheight has-text-centered">
        <icon size="large" icon="fa-spinner fa-pulse"></icon>
        <p>Loading ...</p>
    </div>
    <div v-else>
        <slot></slot>
    </div>
</template>

<script>
    export default {
        name: 'loader',

        props: {
            isLoading: Boolean
        }
    }
</script>
