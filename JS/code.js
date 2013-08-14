
function clickMenu(val)
{
    if(val == 'Home')
        window.location = "home.php";
    
    if(val == 'Message')
        window.location = "messages.php";
    
    if(val == 'Search')
        window.location = "search.php";
}

function goToUser(iduser)
{
    window.location = "home.php?iduser=" + iduser;
}

function searchByLetter(char)
{
    window.location = "search.php?char=" + char;
}