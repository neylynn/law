<template>
    <div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Users</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <router-link to="/createUser" class="btn btn-sm btn-primary">
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
                                    <th>User</th>
                                    <th>Email</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="user in users" :key="user.id">
                                    <td>{{user.id}}</td>
                                    <td>{{user.name}}</td>
                                    <td>{{user.email}}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <router-link :to="`/editUser/${user.id}`" class="btn btn-primary">Edit
                                            </router-link>
                                            <button class="btn btn-danger" @click="onDelete(user.id)">Delete</button>
                                        </div>
                                   </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="pull-right">
                                
                            </div>
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
                users: []
            }
        },
        created() {
            axios
                .get('http://law.test/api/users')
                .then(response => {
                    this.users = response.data;
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
                            .delete(`http://law.test/api/user/delete/${id}`)
                            .then(response => {
                                Toast.fire(
                                    'Deleted!',
                                    'User deleted successfully',
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
