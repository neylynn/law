<template>
    <div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Laws</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <router-link to="/createLaw" class="btn btn-sm btn-primary">
                                <i class="fa fa-plus-square"></i>&nbsp;&nbsp;Add New</router-link>
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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">:)</h3>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="law in laws" :key="law.id">
                                    <td>{{law.id}}</td>
                                    <td>{{law.title}}</td>
                                    <td>{{law.description}}</td>
                                    <td>
                                        
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <router-link :to="`/editLaw/${law.id}`" class="btn btn-primary">Edit
                                            </router-link>
                                            <button class="btn btn-danger" @click="onDelete(law.id)">Delete</button>
                                        </div>
                                   </td>
                                </tr>
                                </tbody>
                            </table>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
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
                laws: []
            }
        },
        created() {
            axios
                .get('http://law.test/api/laws')
                .then(response => {
                    this.laws = response.data;
                });
        },
        methods: {
            onDelete(id) {
                Toast.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        axios
                            .delete(`http://law.test/api/law/delete/${id}`)
                            .then(response => {
                                Toast.fire(
                                    'Deleted!',
                                    'Law deleted successfully',
                                    'success'
                                )
                                let i = this.users.map(item => item.id).indexOf(id); // find index of your object
                                this.users.splice(i, 1)
                            });
                    }
                })
            }
        }
    }

</script>
