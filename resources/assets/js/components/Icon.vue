<template>
    <span :class="['icon', sizeClass(size)]">
        <i :class="['fa', icon]"></i>
    </span>
</template>

<script>
    export default {
        name: 'icon',

        props: {
            size: String,
            icon: String
        },

        methods: {
            sizeClass (size) {
                return size ? 'is-' + size : '';
            }
        }
    }
</script>
