<template>
	<div class="form-group ">
		<input type="text" 
				id="content"
				name="content"
				required="true"
				v-model="content"
				placeholder="Write a note & press enter to save" 
				class="form-control form-control" 
				 @keyup.enter="addNote"
		/>
	</div>
</template>

<script>

export default {
	data() {
		return {
			content: '',
			endpoint: '/notes'
		};
	},

	methods: {
		addNote() {
			axios.post(this.endpoint, { content: this.content })
				.then(({data}) => {
					this.content = '';
					this.$emit('added', data);
			});
		}
	}
}
</script>