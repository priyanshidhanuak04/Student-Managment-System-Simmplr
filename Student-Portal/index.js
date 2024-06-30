const table = document.getElementById("table-attendance");

let totalAttended = 0;
let totalConducted = 0;

for (let i = 1; i < table.rows.length; i++) {

  const cells = table.rows[i].cells;
  
  const attended = Number(cells[4].textContent);
  const conducted = Number(cells[5].textContent);
  
  totalAttended += attended;
  totalConducted += conducted;
}


console.log("Total classes attended:", totalAttended);
console.log("Total classes conducted:", totalConducted);




sessionStorage.setItem('totalAttended', totalAttended);
sessionStorage.setItem('totalConducted', totalConducted);






  