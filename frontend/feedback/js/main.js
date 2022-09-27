const inputName = document.getElementById('inputName');
const textComment = document.getElementById('inputText');
const form = document.getElementById('form');
const commentPost = document.getElementById('commentPost');

form.addEventListener('submit',(event) => {
    event.preventDefault();

    let p = document.createElement('p');
    p.classList = 'p-2 d-flex text-warp';
    p.innerHTML = `<strong>${inputName.value}: </strong> &nbsp ${textComment.value}`;
    console.log(p);
    commentPost.appendChild(p); 
    inputName.value = '';
    textComment.value = '';
    inputName.focus();
});


const openModal = document.querySelector('#openModal');
const closeModal = document.querySelector('#closeModal');
const modal = document.querySelector('#modal');
const fade = document.querySelector('#fade');

const toggleModal = () => {
    modal.classList.toggle("hide");
    fade.classList.toggle("hide");
};

[openModal, closeModal, fade].forEach((el) => {
    el.addEventListener("click", () => toggleModal());
})