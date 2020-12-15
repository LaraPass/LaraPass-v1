<template>
	<div class="form-group ">
		<input type="text" 
				id="content"
				name="content"
				required="true"
				v-model="content"
				placeholder="Write a note & press enter to save" 
				class="form-control form-control" 
				aid="$account->id"
				 @keyup.enter="addNote"
		/>
	</div>
</template>

<script>

export default {
	data() {
		return {
			content: '',
			aid: aid, 
		};
	},	


	methods: {
		addNote() {
			axios.post(location.pathname + '/' + this.aid + '/notes', { content: this.content })
				.then(({data}) => {
					this.content = '';
					this.$emit('added', data);
			});
		}
	}
}
</script>