<template>
    <div> 
        <div class="card-body bg-secondary">
          <!-- Projects table -->
          <ul class="todo-list ui-sortable">
            <li id="task1" v-for="(note, index) in items" :key="note.id">
                <a-note :data="note" @deleted="remove(index)"></a-note>
            </li>
          </ul>
        </div>
        <div class="card-footer">
            <a-new-note @added="add"></a-new-note>
        </div>
    </div>
</template>

<script>

import ANewNote from './ANewNote.vue';
import ANote from './ANote.vue';

    export default {
    
        props: ['data'],

        components: { ANewNote, ANote },

        data() {
            return {
                items: this.data
            };
        },

        methods: {
            add(notes) {
                this.items.push(notes);
            },

            remove(index) {
                this.items.splice(index, 1);
            }
        }
    }
</script>