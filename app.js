function delete_person(event, id)
{
    event.preventDefault();
    event.stopPropagation();
    var xmlhttp;
    if(confirm("Are you sure you want to remove this record?"))
    {
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var parent=event.target.parentNode.parentNode;
                parent.parentNode.removeChild(parent);
            }
        }

        xmlhttp.open("POST", "/zadatak3/delete.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("id="+id);
    }
}
function edit_person(id)
{
    window.location.assign("/zadatak3/edit.php?id=" +id);
}
function toIndex(e){
    e.preventDefault();
    e.stopPropagation();
    window.location.assign("/zadatak3/index.php");
}
function to_page(id)
{
    var form=document.getElementsByClassName("search")[0];
    form=form.getElementsByTagName("form")[0];
    form.action="/zadatak3/index.php?page="+id;
    form.submit();
    
}