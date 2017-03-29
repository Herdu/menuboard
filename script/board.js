/**
 * Created by Mati on 2017-03-29.
 */

var numberOfCategories = 3;







var insertTable = function (id, number){
    var table = document.createElement("table");

    for (j=0; j<number; j++)
    {
        var tr = document.createElement("tr");

        tr.innerHTML = "<td>Nazwa_produktu</td><td>cena_produktu</td>";

        table.appendChild(tr);
    }

    document.getElementById(id).appendChild(table);

}



var createCategories = function(number){

    var container = document.getElementById("categories");

    for (i=0; i<number; i++){ // FOR EACH CATEGORY

        var div = document.createElement('div');
        div.className+="category";
        div.id = "category-"+(i+1);
        var span = document.createElement('span');
        span.innerHTML = "Kategoria "+(i+1);

        div.appendChild(span);
        container.appendChild(div);
        insertTable(div.id, 8);
        console.log(i);
    }

}

window.onload = function(){

    createCategories(numberOfCategories);

}