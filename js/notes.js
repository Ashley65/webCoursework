+













































// import App from './App.js';
//
// const root = document.getElementById('app');
// const app = new App(root);

// app.js

// Get the form and form elements
const form = document.getElementById("form");
const titleInput = document.getElementById("title");
const contentInput = document.getElementById("content");
const notesList = document.getElementById("notes-list");

// Create an array to store the notes
let notes = [];

// Get notes from local storage
function getNotes() {
    if (localStorage.getItem("notes")) {
        notes = JSON.parse(localStorage.getItem("notes"));
    }
    renderNotes();
}

// Add a new note to the array and local storage
function addNote(e) {
    e.preventDefault();

    const title = titleInput.value;
    const content = contentInput.value;

    if (!title || !content) {
        alert("Please fill in all fields.");
        return;
    }

    //Check if we're editing a note
    if (form.dataset.editing) {
        const id = Number(form.dataset.editing);
        const note = notes.find((note) => note.id === id);

        note.title = title;
        note.content = content;
        note.created_at = new Date().toLocaleString();
    } else {
        // we're adding a new note
        const note = {
            id: Date.now(),
            title,
            content,
            created_at: new Date().toLocaleString(),
        };
        notes.push(note);
    }

    localStorage.setItem("notes", JSON.stringify(notes));

    renderNotes();

    titleInput.value = "";
    contentInput.value = "";
    delete form.dataset.editing; // exit editing mode
}

// Delete a note from the array and local storage
function deleteNote(id) {
    notes = notes.filter((note) => note.id !== id);
    localStorage.setItem("notes", JSON.stringify(notes));
    renderNotes();
}

// Render the notes in the UI
function renderNotes() {
    notesList.innerHTML = "";

    //reverse the notes array so the newest note is at the top
    const reversedNotes = notes.slice().reverse();

    reversedNotes.forEach((note) => {
        const li = document.createElement("li");
        li.classList.add("note");

        const h3 = document.createElement("h3");
        h3.innerText = note.title;

        const p = document.createElement("p");
        p.innerText = note.content.substring(0, 250) + "...";

        const p2 = document.createElement("p");
        p2.innerText = note.created_at;

        const btn = document.createElement("button");
        btn.classList.add("delete-btn");
        btn.innerText = "Delete";
        btn.addEventListener("click", () => deleteNote(note.id));

        const editBtn = document.createElement("button");
        editBtn.classList.add("edit-btn");
        editBtn.innerText = "Edit";
        editBtn.addEventListener("click", () => {
            titleInput.value = note.title;
            contentInput.value = note.content;
            form.dataset.editing = note.id;
        });

        li.appendChild(h3);
        li.appendChild(p);
        li.appendChild(btn);
        li.appendChild(editBtn);
        li.appendChild(p2);

        notesList.appendChild(li);
    });
}

// Event listeners
form.addEventListener("submit", addNote);
document.addEventListener("DOMContentLoaded", getNotes);
