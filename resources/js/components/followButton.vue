<template>
  <div class="container">
    <button
      class="px-2 py-1 text-xs text-teal-500 border
      border-teal-500 rounded-full hover:bg-teal-500 hover:text-white"
      @click="followUser">
      {{ buttonText }}
    </button>
  </div>
</template>

<script>
export default {
      // vue props
    props: ['userId', 'follows'],

    mounted() {
        console.log('Component mounted.');
    },
    data: function() {
        return {
            status: this.follows,
        }
    },

    methods: {
        followUser() {
            axios.post('/profile/' + this.userId + '/follow')
                .then(response => {
                    this.status = !this.status;
                    console.log(response.data);

                })
                .catch(errors => {
                    console.log(errors);
                    if (errors.response.status == 401) {
                        window.location = "/login";
                    }
                });
        }
    },
    computed: {
        buttonText() {
            return (this.status) ? 'Unfollow' : 'Follow';
        }
    }
}
</script>
