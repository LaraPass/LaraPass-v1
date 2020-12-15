<template>
    <div> 
        <div class="card-body bg-secondary">
          <!-- Projects table -->
          <ul class="todo-list ui-sortable">
            <li id="task1" v-for="(note, index) in items" :key="note.id">
                <q-note :data="note" @deleted="remove(index)"></q-note>
            </li>
          </ul>
        </div>
        <div class="card-footer">
            <q-new-note @added="add"></q-new-note>
        </div>
    </div>
</template>

<script>

import QNewNote from './QNewNote.vue';
import QNote from './QNote.vue';

    export default {
    
        props: ['data'],

        components: { QNewNote, QNote },

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