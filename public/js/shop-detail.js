document.getElementById('date').addEventListener('change', function() {
  document.querySelector('#table-date').innerText = this.value;
});

document.getElementById('time').addEventListener('change', function() {
  document.querySelector('#table-time').innerText = this.value;
});

document.getElementById('number').addEventListener('change', function() {
  document.querySelector('#table-number').innerText = this.value;
});
