


let fila = [];

fila.push("M", "F", "M"); //Enqueue
let valor = fila.pop(); //Dequeue
if (valor == "M") {
    console.log("Masculino");
} else {
    console.log("Feminino");
}

//console.log("Valor removido " + valor + "\n");
console.log("Fila atual: " + fila);