const containerSearch = document.querySelector('.container-search');
const bgModals = getElementExist('.bg-modals');




//  handle toggle menu
function buttonToggleMenu(menu){
    const menuElement = getElementExist(menu);
    if(menuElement.classList.contains('invisible')){
        menuElement.classList.remove('invisible','scale-0');
        menuElement.classList.add('visible','scale-100');
    }else{
        menuElement.classList.remove('visible','scale-100');
        menuElement.classList.add('invisible','scale-0');
    }
    
}
function buttonToggleMenuMobile(menu){
    
    const menuElement = getElementExist(menu);
    if(menuElement.classList.contains('hidden')){
        menuElement.classList.remove('hidden');
        menuElement.classList.add('flex');
    }else{
        menuElement.classList.remove('flex');
        menuElement.classList.add('hidden');
    }
}


//  get Element exist by table menu
function getElementExist(element){
    const elementExist = document.querySelector(element);
    if(element){
        return elementExist;
    }else{
        return null;
    }
}


function handleFocusSearch(focusSearch){
    if(focusSearch){
        containerSearch.classList.remove('max-w-10');

    }else{
        containerSearch.classList.add('max-w-10');
    }
}
