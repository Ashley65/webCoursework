import NotesView from "./NotesView.js";
import NotesAPI from "./NotesAPI.js";

export default class App {
    constructor(root) {
        this.notes = []   ;
        this.activeNote = null;
        this.view = new NotesView(root, this._handlers());

        this._refreshNotes();
    }
    _handlers(){
        return{
            onNoteSelect: noteId => {
                const selectedNote = this.notes.find(note => note.id === noteId);
                this.setActiveNote(selectedNote);
            },
            onNoteAdd: () => {
                const newNote = {
                    title: "New Note",
                    body: "Take Note..."
                };
                NotesAPI.saveNotes(newNote);
                this._refreshNotes();
            },
            onNoteEdit: (title, body) => {
                NotesAPI.saveNotes({id: this.activeNote.id, title, body});
                this._refreshNotes();
            },
            onNoteDelete: noteId => {
                NotesAPI.deleteNotes({id: noteId});
                this._refreshNotes();
            }
        }
    }
    setActiveNote = (note) => {
        this.activeNote = note;
        this.view.updateActiveNote(note);
    }
    _refreshNotes(){
        const notes = NotesAPI.getAllNotes();
        this._setNotes(notes);
        if (notes.length > 0) {
            this.setActiveNote(notes[0]);
        }
    }
    _setNotes(notes){
        this.notes = notes;
        this.view.updateNoteList(notes);
        this.view.updateNotePreviewVisibility(notes.length > 0);
    }

}