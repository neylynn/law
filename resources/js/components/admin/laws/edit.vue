<template>
    <div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">New Law</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <router-link to="/laws" class="btn btn-sm btn-primary">
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
                                <h3 class="card-title">New Law Form</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal" @submit.prevent="onUpdate" @keydown="form.errors.clear()">
                                <div class="card-body" style="height: 239px;">
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="title" name="title" autocomplete="title" autofocus placeholder="Title" v-model="form.title">
                                            <span class="invalid-feedback d-block" role="alert" v-if="form.errors.has('title')" v-text="form.errors.get('title')"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="descripion" v-model="form.description"></textarea>
                                                <span class="invalid-feedback d-block" role="alert" v-if="form.errors.has('description')" v-text="form.errors.get('description')"></span>
                                            </div>

                                        </div>

                                    <div class="form-group row">
                                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-10">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="status" value="1" v-model="form.status"> Active
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="status" value="0" v-model="form.status"> Inactive
                                                </label>
                                            </div>
                                            <span class="invalid-feedback d-block" role="alert" v-if="form.errors.has('status')" v-text="form.errors.get('status')"></span>
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
                    law: {},
                    form: new Form({
                        'title': '',
                        'description': '',
                        'status': ''
                    })
                }
            },
            mounted () {
                axios
                    .get(`http://law.test/api/law/edit/${this.$route.params.id}`)
                    .then((response) => {
                        if(0 === Object.keys(response.data).length) {
                            this.$router.push({name: 'laws'}); 
                        } else {
                            this.law = response.data;
                            this.form.title = this.law.title;
                            this.form.description = this.law.description;
                            this.form.status = this.law.status;
                        }
                    });
            },
            methods: {
                onUpdate() {
                    this.form
                        .post(`http://law.test/api/law/update/${this.$route.params.id}`, this.law)
                        .then(() => {
                            Toast.fire({
                                icon: 'success',
                                title: 'Law updated successfully'
                            })
                            this.$router.push({name: 'laws'});
                        });
                }
            }
        }

</script>
