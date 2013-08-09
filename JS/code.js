
function clickMenu(val)
{
    if(val == 'Home')
        window.location = "home.php";
    
    if(val == 'Message')
        window.location = "messages.php";
}

function goToUser(iduser)
{
    window.location = "home.php?iduser=" + iduser;
}