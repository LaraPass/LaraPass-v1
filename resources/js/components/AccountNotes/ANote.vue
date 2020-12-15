<template>
	<div>
		<span class="text" v-text="content"></span>
		<div class="tools">
		    <span class="pull-right">
		      <i @click="destroy" class="fa fa-trash-o text-danger"></i>
		    </span>
		</div>
	</div>
</template>
<script>
	export default{
		props: ['data'],

		data() {
			return {
				content: this.data.content
			};
		},

		methods: {
			destroy()
			{
				if(confirm('Are you sure you want to delete this Account Note ?'))
				{
					axios.delete('/account-notes/' + this.data.id);

					this.$emit('deleted', this.data.id);
				}

			}
		}
	}
</script>