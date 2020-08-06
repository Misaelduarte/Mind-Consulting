<div class="col-md-6">
  <div class="card">
      <div class="card-header">
          <h3 class="card-title">Sobre o Sistema</h3>
      </div>
      <div class="card-body">
          ...
      </div>
  </div>
</div>
</div>
<script>
  window.onload = function() {
      let ctx = document.getElementById('pagePie').getContext('2d');
      window.pagePie = new Chart(ctx, {
          type: 'pie',
          data: {
              datasets: [{
                  data: [3, 5, 1],
                  backgroundColor: '#0000FF'
              }],
              labels: ['P1', 'P2', 'P3']
          },
          options: {
              responsive: true,
              legend: {
                  display: false
              }
          }
      });
  }
</script>