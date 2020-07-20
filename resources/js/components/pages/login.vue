<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>

                    <div class="card-body">
                        <form>
                            <div class="form-group row">
                                <label
                                    for="email"
                                    class="col-md-4 col-form-label text-md-right"
                                    >E-Mail Address</label
                                >

                                <div class="col-md-6">
                                    <input
                                        id="email"
                                        type="email"
                                        class="form-control"
                                        name="email"
                                        v-model="email"
                                        required
                                        autocomplete="email"
                                        autofocus
                                    />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    for="password"
                                    class="col-md-4 col-form-label text-md-right"
                                    >Password</label
                                >

                                <div class="col-md-6">
                                    <input
                                        id="password"
                                        type="password"
                                        class="form-control"
                                        name="password"
                                        v-model="password"
                                        required
                                        autocomplete="current-password"
                                    />
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        Login
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            email: "",
            password: ""
        };
    },
    mounted() {
        console.log("Login Component mounted.");
    },
    methods: {
        login_user(evt) {
            evt.preventDefault();
            let formData = new FormData();
            formData.append("email", this.email);
            formData.append("password", this.password);

            let config = {
                header: {
                    "Content-Type": "multipart/form-data"
                }
            };
            axios
                .post(this.$host_url + "login", formData, config)
                .then(res => {
                    console.log(res.data);
                    let token = res.data.token.token;
                    let user_id = res.data.user.id;
                    console.log(user_id);

                    if (res.data.status === true) {
                        localStorage.setItem("token", token);
                        localStorage.setItem("user_id", user_id);
                        window.location.href =
                            "http://localhost:8000/home/admin";
                    }
                })
                .catch();
        }
    }
};
</script>
