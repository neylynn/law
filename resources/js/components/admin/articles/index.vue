<template>
    <div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Articles</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <router-link to="/createArticle" class="btn btn-sm btn-primary">
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
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="article in articles" :key="article.id">
                                    <td>{{article.id}}</td>
                                    <td>{{article.title}}</td>
                                    <td>{{article.description}}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <router-link :to="`/editArticle/${article.id}`" class="btn btn-primary">Edit
                                            </router-link>
                                            <button class="btn btn-danger" @click="onDelete(article.id)">Delete</button>
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
                articles: []
            }
        },
        created() {
            axios
                .get('http://law.test/api/articles')
                .then(response => {
                    this.articles = response.data;
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
                            .delete(`http://law.test/api/article/delete/${id}`)
                            .then(response => {
                                Toast.fire(
                                    'Deleted!',
                                    'Article deleted successfully',
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
