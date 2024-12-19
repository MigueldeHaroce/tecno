function updateChartData(data) {
  console.log(data);
  const chartTemp = document.querySelector('#chart-temp table');
  const chartLuz = document.querySelector('#chart-luz table');
  const chartEnergia = document.querySelector('#chart-energia table');

  const tempRows = chartTemp.querySelectorAll('tr');
  const luzRows = chartLuz.querySelectorAll('tr');
  const energiaRows = chartEnergia.querySelectorAll('tr');

  const desiredMin = 0.1;
  const desiredMax = 0.9;

  function normalizeData(dataArray, dataKey) {
    let minVal = Infinity;
    let maxVal = -Infinity;

    for (const entry of dataArray) {
      const val = parseFloat(String(entry[dataKey]).replace(/[^\d.-]/g, ''));
      minVal = Math.min(minVal, val);
      maxVal = Math.max(maxVal, val);
    }

    if (minVal === maxVal) {
      maxVal = minVal + 1;
    }

    return dataArray.map(entry => {
      const val = parseFloat(String(entry[dataKey]).replace(/[^\d.-]/g, ''));
      let normalizedVal = (val - minVal) / (maxVal - minVal);
      console.log(normalizedVal * (desiredMax - desiredMin) + desiredMin);
      return normalizedVal * (desiredMax - desiredMin) + desiredMin;
    });
  }

  const normalizedTemps = normalizeData(data, 'temperatura');
  const normalizedLuz = normalizeData(data, 'intensitat');
  const normalizedEnergia = normalizeData(data, 'produccio');
  console.log(data.length);
  for (let i = 0; i < data.length; i++) {
    tempRows[i].querySelector('td').style.setProperty('--size', normalizedTemps[i]);
    luzRows[i].querySelector('td').style.setProperty('--size', normalizedLuz[i]);
    energiaRows[i].querySelector('td').style.setProperty('--size', normalizedEnergia[i]);
  }
}

updateChartData(data);


const chartDots = document.querySelectorAll('.menu .dot');
const prevChartButton = document.querySelector('.menu #prev');
const nextChartButton = document.querySelector('.menu #next');
const charts = document.querySelectorAll('.my-chart');

let currentChartIndex = 0;

function updateChartDots() {
  chartDots.forEach((dot, index) => {
    dot.classList.toggle('active', index === currentChartIndex);
  });
}

function updateCharts() {
  charts.forEach((chart, index) => {
    chart.style.display = index === currentChartIndex ? 'block' : 'none';
  });
}

prevChartButton.addEventListener('click', () => {
  currentChartIndex = (currentChartIndex - 1 + chartDots.length) % chartDots.length;
  updateChartDots();
  updateCharts();
});

nextChartButton.addEventListener('click', () => {
  currentChartIndex = (currentChartIndex + 1) % chartDots.length;
  updateChartDots();
  updateCharts();
});

updateChartDots();
updateCharts();


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