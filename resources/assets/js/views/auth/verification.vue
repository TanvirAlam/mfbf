<template>
    <div class="container is-centered box notification">
        <article class="message is-success">
            <div class="message-header">
                <p>Verify Your Email Address</p>
            </div>
            <div class="message-body">
                We now need to verify your email address. We've sent an email to <strong>{{ email }}</strong>
                to verify your address. Please click the link in that email to verify.
            </div>
            <hr>
            <div class="field">
                <p class="control">
                    <a href="#">Resend email</a>
                </p>
            </div>
        </article>
    </div>
</template>

<script>
  export default {
    props: ['email'],
  }
</script>
