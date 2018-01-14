<template>
    <form action="">
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Insert income</p>
            </header>
            <section class="modal-card-body">
                Insert Income form
            </section>
            <footer class="modal-card-foot">
                <button class="button" type="button" @click="$parent.close()">Close</button>
                <button class="button is-primary">Save</button>
            </footer>
        </div>
    </form>
</template>

<script>
  export default {
    props: []
  }
</script>

<style scoped>
    .modal-card {
        width: auto;
    }
</style>
