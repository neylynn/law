<template>
    <div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit User</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <router-link to="/users" class="btn btn-sm btn-primary">
                               <i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Back</router-link>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">New User Form</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal" @submit.prevent="onUpdate" @keydown="form.errors.clear()" autocomplete="on">
                                <div class="card-body" style="height: 239px;">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="name" name="name" autocomplete="name" autofocus placeholder="Name" v-model="form.name">
                                            <span class="invalid-feedback d-block" role="alert" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputEmail3" placeholder="Email" v-model="form.email">
                                                <span class="invalid-feedback d-block" role="alert" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></span>
                                            </div>

                                        </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="password" placeholder="Password" v-model="form.password">
                                            <span class="invalid-feedback d-block" role="alert" v-if="form.errors.has('password')" v-text="form.errors.get('password')"></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info" :disabled="form.errors.any()">Save</button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->

    </div>

</template>

<script>
    export default {
            data() {
                return {
                    user: {},
                    form: new Form({
                        'name': '',
                        'email': '',
                        'password': '',
                        'password_confirmation': ''
                    })
                }
            },
            mounted () {
                axios
                    .get(`http://law.test/api/user/edit/${this.$route.params.id}`)
                    .then((response) => {
                        if(0 === Object.keys(response.data).length) {
                            this.$router.push({name: 'users'}); 
                        } else {
                            this.user = response.data;
                            this.form.name = this.user.name;
                            this.form.email = this.user.email;
                        }
                    });
            },
            methods: {
                onUpdate() {
                    this.form
                        .post(`http://law.test/api/user/update/${this.$route.params.id}`, this.user)
                        .then(() => {
                            Toast.fire({
                                icon: 'success',
                                title: 'User updated successfully'
                            })
                            this.$router.push({name: 'users'});
                        });
                }
            }
        }

</script>
