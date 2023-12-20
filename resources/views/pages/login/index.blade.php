@extends('layouts.app')

@section('content')

    <div id="app">
        <div class="row align-items-center m-0 p-5" style="height: 100vh;">
            <div class="container shadow rounded bg-white-opacity-25 col-md-6 col-lg-4">

                {{-- <form @submit.prevent="login">
                    <label for="username">Username:</label>
                    <input type="text" id="username" v-model="username" required>

                    <label for="password">Password:</label>
                    <input type="password" id="password" v-model="password" required>

                    <button type="submit">Login</button>
                </form> --}}
                <div class="p-3">
                    <h1>WiFi繼電控制器</h1>
                    <div>
                        <div class="mb-3">
                            <label for="floatingUserId" class="form-label">帳號</label>
                            <input type="text" class="form-control opacity-75" id="floatingUserId"
                                placeholder="使用者ID" v-model="userId" v-on:keypress.enter="submit">
                        </div>
                        <div class="mb-3">
                            <label for="floatingPassword" class="form-label">密碼</label>
                            <input type="password" class="form-control opacity-75" id="floatingPassword"
                                v-model="password" v-on:keypress.enter="submit" placeholder="Password">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between m-1">
                        <div class="d-flex align-items-center">
                            <input type="checkbox" class="form-check-input" value="remember-me" id="rememberMe"
                                v-model="rememberMe" v-on:keypress.enter="rememberMeAndSubmit">
                            <label for="rememberMe" class="form-label m-0 ms-2">記住帳號密碼</label>
                        </div>
                        <button class="btn btn-outline-primary w-50" type="submit" id="submit"
                            v-on:click="submit">登入</button>
                    </div>
                </div>
            </div>
        </div>

</html>

<script>
    const app = Vue.createApp({
        data() {
            return {
                userId: '',
                password: ''
            };
        },
        methods: {
            login() {
                console.log('userId:', this.userId);
                console.log('Password:', this.password);
            }
        }
    });

    app.mount('#app');
</script>

@endsection