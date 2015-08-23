function check_dl(path)
{
    var r = confirm("Do you really want to download this folder/file ?");
    if(r)
    {
         location.href=path;
    }
}
