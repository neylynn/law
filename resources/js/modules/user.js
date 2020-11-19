export default {

    data() {

        return {
            users: {},
            form: new Form({
                id: '',
                name : '',
                email: '',
                password: '',
                password_confirmation: ''
            })
        }
    },
    methods: {
        created() {
            this.load(); 
        },
        load() {
            axios
                .get('http://law.test/api/users')
                .then(response => {
                    this.users = response.data;
                });
        },
        onSubmit() {
            this.form
                .post('http://law.test/api/user/store', this.user)
                .then(() => {
                    Toast.fire({
                        icon: 'success',
                        title: 'User created successfully'
                    })
                    this.$router.push({name: 'users'})
                })
                .catch(error => console.log(error))
                .finally(() => this.loading = false)
        },
        onUpdate() {
            axios
                .post(`http://law.test/api/user/update/${this.$route.params.id}`, this.user)
                .then(() => {
                    Toast.fire({
                        icon: 'success',
                        title: 'User updated successfully'
                    })
                    this.$router.push({name: 'users'});
                });
        },
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