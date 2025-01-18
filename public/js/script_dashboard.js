const containerSearch = document.querySelector('.container-search');
function handleFocusSearch(focusSearch){
    if(focusSearch){
        containerSearch.classList.remove('max-w-10');

    }else{
        containerSearch.classList.add('max-w-10');
    }
}
