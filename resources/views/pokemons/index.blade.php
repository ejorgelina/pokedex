<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link rel="stylesheet" type="text/css" href="/css/pokemon.css">
    <title>POKEDEX</title>
</head>
<body>

<div class="logo">
    <img src="https://upload.wikimedia.org/wikipedia/commons/9/98/International_Pok%C3%A9mon_logo.svg"
         alt="Logotipo de Pokemon">
</div>

<input id="buscar" type="text" class="buscador" placeholder="Buscar pokemon por nombre">
<div class="repo">
    <a href="https://github.com/ejorgelina/pokedex" class="btn btn-danger">Repo</a>
</div>
<div id="resultado" class="pokemonContainer container">

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="application/javascript">

    const listaPokemons = @json($pokemons);

    const pokemonItem = (pokemon) => {
        var divItem = '<div class="row pokemon"> <div class="float-left poke-image"> <img class="poke-name" src="' +
            pokemon.photo + '"> </div> <div class="centrar"> <p class="poke-name gris-claro">' + pokemon.name.toUpperCase() + '</p>'
        '</div></div>';

        return divItem;
    }

    function filtrarPorNombre(pokemons, inputVal) {
        var filter = pokemons.filter((pokemon) => {
            return pokemon.name.toLowerCase().includes(inputVal.toLowerCase()) == true;
        });
        return filter;
    }

    const actualizarResultados = (div, input) => {
        div.empty();
        const pokemonFilter = filtrarPorNombre(listaPokemons, input);
        pokemonFilter.forEach((pokemon) => {
            div.append(pokemonItem(pokemon));
        });
    }

    $('#buscar').on("keyup", (e) => {
        e.preventDefault();
        actualizarResultados( $('#resultado'), $('#buscar').val());
    });

</script>
</body>
</html>
