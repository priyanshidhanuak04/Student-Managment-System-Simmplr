
const totalAttended = sessionStorage.getItem('totalAttended');
const totalConducted = sessionStorage.getItem('totalConducted');

const percentage = ((totalAttended / totalConducted) * 100).toFixed(2);

console.log(totalAttended, totalConducted,percentage);

document.getElementById("total-classes").innerHTML = "<strong>Total classes</strong> - " + totalConducted;
document.getElementById("attended-classes").innerHTML = "<strong>Attended classes</strong> - " + totalAttended;
document.getElementById("attendance-percentage").innerHTML = "<strong>Attendance Percentage</strong> - " + percentage +"%";


missed = totalConducted - totalAttended;


// chart

const ctx = document.getElementById('myChart');

new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['Missed','Attended'],
      datasets: [{
        data: [missed,totalAttended],
        backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)' 
          ],
          hoverOffset: 4
      }]
    },
    options: {
        borderRadius: 2,
        plugins: {
            legend: {
                display : false,
            },
        },
    },
    
  });


  