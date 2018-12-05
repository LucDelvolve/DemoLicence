var numeroCine;
function GetFilms(codeCine)
{
    numeroCine = codeCine;
    $.ajax
    (
        {
            type: 'get',
            url: "GetFilms.php",
            data:"codeCinema="+codeCine,
            success:function(data)
            {
                $('#divFilms').empty();
                $('#divActeurs').empty();
                $('#divFilms').append(data);
            },
            error:function()
            {
                alert("Impossible de récupérer les films");
            }
        }
    );
}
function GetActeurs(codeFilm)
{
    $.ajax
    (
        {
            type: 'get',
            url: "GetActeurs.php",
            data:"codeFilm="+codeFilm,
            success:function(data)
            {
                $('#divActeurs').empty();
                $('#divActeurs').append(data);
            },
            error:function()
            {
                alert("Impossible de récupérer les acteurs");
            }
        }
    );
}
function GetVotes(vote,codeFilm)
{
    $.ajax
    (
        {
            type: 'get',
            url: "GetVotes.php",
            data:"vote="+vote+"&codeFilm="+codeFilm,
            success:function(data)
            {
                GetFilms(numeroCine);
            },
            error:function()
            {
                alert("Impossible de voter");
            }
        }
    );
}