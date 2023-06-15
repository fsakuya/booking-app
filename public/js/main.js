const favoriteButtons = document.querySelectorAll('.favorite-button');
favoriteButtons.forEach(button => {
  button.addEventListener('click', (e) => {
    e.preventDefault();
    const shopId = button.dataset.shopId;
    let method = 'POST';

    if (button.querySelector('img').src.includes('red')) {
      method = 'DELETE';
    }

    fetch(`/favorite/${shopId}`, {
      method: method,
      headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
      }
    })
      .then(response => response.json())
      .then(data => {
        if (data.status === 'success') {
          const img = button.querySelector('img');
          if (method === 'DELETE') {
            img.src = "/images/heart-gray.svg";
          } else {
            img.src = "/images/heart-red.svg";
          }
        }
      });
  });
})

document.getElementById('date').addEventListener('change', function () {
  document.querySelector('#table-date').innerText = this.value;
});

document.getElementById('time').addEventListener('change', function () {
  document.querySelector('#table-time').innerText = this.value;
});

document.getElementById('number').addEventListener('change', function () {
  document.querySelector('#table-number').innerText = this.value + '人';
});




