<template>
    <section class="contact">
        <div class="container">
            <h2 class="title">Contacts me!</h2>
            <form @submit.prevent="onSubmit" class="contact-form">
                <!-- name -->
                <AppInput v-model="user.name">Name:</AppInput>
                <!-- email -->
                <AppInput v-model="user.email" type="email">Email:</AppInput>
                <!-- textarea -->
                <AppTextarea v-model="user.text">Comment:</AppTextarea>
                <!-- buttons -->
                <div class="controls">
                    <AppButton class="btnWhite">Submit!</AppButton>
                </div>
            </form>
        </div>
    </section>
</template>

<script>

export default {
    name: 'contacts',
    data () {
        return {
            user: {
                name: '',
                email: '',
                text: ''
            }
        }
    },
    methods: {
        onSubmit () {
            console.log(this.user);
        }
    }
}
</script>

<style lang="scss">
    .contact {
        text-align: center;
        background-color: #4f68f4;
        color: #fff;
        .title {
            color: #fff;
        }
        .controls {
            margin: 30px 0;
        }
        .contact-form {
            max-width: 600px;
            margin: 30px auto;
        }
    }
</style>
