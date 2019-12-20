const categorie = document.getElementById('category');
if(categorie) {
    categorie.addEventListener('click', e => {
        if(e.target.className==="btn btn-danger delete-categorie"){
            if(confirm('confirm delelte?')){
                const id = e.target.getAttribute('data-id');
                fetch("/categorie/delete/{id}",{method:'DELETE'})
                    .then(res =>window.location.reload());
        }
            //alert('are you sure');
        }
    });

}