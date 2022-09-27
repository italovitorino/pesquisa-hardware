const listaItemHeaders = document.querySelectorAll(".lista-item-header");

listaItemHeaders.forEach(listaItemHeader => {
  listaItemHeader.addEventListener("click", event => {
    

    listaItemHeader.classList.toggle("active");
    const listaItemBody = listaItemHeader.nextElementSibling;
    if(listaItemHeader.classList.contains("active")) {
      listaItemBody.style.maxHeight = listaItemBody.scrollHeight + "px";
    }
    else {
      listaItemBody.style.maxHeight = 0;
    }
    
  });
});