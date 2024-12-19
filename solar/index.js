const dots = document.querySelectorAll('.dot');
const prevButton = document.getElementById('prev');
const nextButton = document.getElementById('next');
const charts = document.querySelectorAll('.my-chart');

let currentIndex = 0;

function updateDots() {
  dots.forEach((dot, index) => {
    dot.classList.toggle('active', index === currentIndex);
  });
}

function updateCharts() {
  charts.forEach((chart, index) => {
    chart.style.display = index === currentIndex ? 'block' : 'none';
  });
}



function updateChartData(data) {
  console.log(data);
  const chartTemp = document.querySelector('#chart-temp table');
  const chartLuz = document.querySelector('#chart-luz table');
  const chartEnergia = document.querySelector('#chart-energia table');

  const tempRows = chartTemp.querySelectorAll('tr');
  const luzRows = chartLuz.querySelectorAll('tr');
  const energiaRows = chartEnergia.querySelectorAll('tr');

  console.log(tempRows);

  // Update each bar with the corresponding row data
  for (let i = 0; i < data.length; i++) {
    const entry = data[i];
    const temperature = parseFloat(String(entry.temperatura).replace(/[^\d.-]/g, ''));
    const tempNormalized = Math.min(Math.max((temperature + 50) / 100, 0), 1) * 1; 

    const luzInt = parseFloat(String(entry.intensitat).replace(/[^\d.-]/g, ''));
    const luzNormalized = Math.min(Math.max(luzInt / 100, 0), 1) * 1; 

    const energiaInt = parseFloat(String(entry.produccio).replace(/[^\d.-]/g, ''));
    const energiaNormalized = Math.min(Math.max(energiaInt / 100, 0), 1) * 1; 

    tempRows[i].querySelector('td').style.setProperty('--size', tempNormalized);
    luzRows[i].querySelector('td').style.setProperty('--size', luzNormalized);
    energiaRows[i].querySelector('td').style.setProperty('--size', energiaNormalized);
  }
}


prevButton.addEventListener('click', () => {
  currentIndex = (currentIndex - 1 + dots.length) % dots.length;
  updateDots();
  updateCharts();
});

nextButton.addEventListener('click', () => {
  currentIndex = (currentIndex + 1) % dots.length;
  updateDots();
  updateCharts();
});

updateDots();
updateCharts();
updateChartData(data);


// ...existing code...

const tableDots = document.querySelectorAll('.menuTables .dot');
const prevTableButton = document.querySelector('.menuTables #prev');
const nextTableButton = document.querySelector('.menuTables #next');
const tables = [document.getElementById('tableTemp'), document.getElementById('tableLuz'), document.getElementById('tableEnergia')];

let currentTableIndex = 0;

function updateTableDots() {
  tableDots.forEach((dot, index) => {
    dot.classList.toggle('active', index === currentTableIndex);
  });
}

function updateTables() {
  tables.forEach((table, index) => {
    table.style.display = index === currentTableIndex ? 'table' : 'none';
  });
}

prevTableButton.addEventListener('click', () => {
  currentTableIndex = (currentTableIndex - 1 + tableDots.length) % tableDots.length;
  updateTableDots();
  updateTables();
});

nextTableButton.addEventListener('click', () => {
  currentTableIndex = (currentTableIndex + 1) % tableDots.length;
  updateTableDots();
  updateTables();
});

updateTableDots();
updateTables();