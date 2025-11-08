@extends('layout')

@section('content')
<div class="text-center mb-4">
  <h3 class="fw-bold text-success">Painel VerdeLab 🌿</h3>
  <p class="text-muted">Monitoramento de desempenho e sustentabilidade</p>
</div>

<div class="row text-center mb-4">
  <div class="col-md-4 mb-3">
    <div class="card shadow-sm border-0" style="background:#E8F5E9;">
      <div class="card-body">
        <i class="bi bi-building fs-2 text-success"></i>
        <h5 class="fw-bold mt-2">{{ $totalSetores }}</h5>
        <p class="text-muted">Setores Cadastrados</p>
      </div>
    </div>
  </div>
  <div class="col-md-4 mb-3">
    <div class="card shadow-sm border-0" style="background:#E3F2FD;">
      <div class="card-body">
        <i class="bi bi-lightning-charge fs-2 text-primary"></i>
        <h5 class="fw-bold mt-2">{{ $totalConsumos }}</h5>
        <p class="text-muted">Registros de Consumo</p>
      </div>
    </div>
  </div>
  <div class="col-md-4 mb-3">
    <div class="card shadow-sm border-0" style="background:#FFF8E1;">
      <div class="card-body">
        <i class="bi bi-recycle fs-2 text-warning"></i>
        <h5 class="fw-bold mt-2">{{ $totalAcoes }}</h5>
        <p class="text-muted">Ações Sustentáveis</p>
      </div>
    </div>
  </div>
</div>

<div class="card shadow-sm border-0">
  <div class="card-body">
    <h5 class="fw-bold text-success mb-3">
      <i class="bi bi-bar-chart-line"></i> Gráfico de Consumos Mensais
    </h5>
    <canvas id="graficoConsumos"></canvas>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('graficoConsumos').getContext('2d');
const chartData = {
  labels: {!! json_encode($dadosConsumo->pluck('mes')) !!},
  datasets: [
    {
      label: 'Energia (kWh)',
      data: {!! json_encode($dadosConsumo->pluck('energia')) !!},
      borderColor: '#4CAF50',
      backgroundColor: '#A5D6A7',
      tension: 0.3
    },
    {
      label: 'Água (Litros)',
      data: {!! json_encode($dadosConsumo->pluck('agua')) !!},
      borderColor: '#2196F3',
      backgroundColor: '#90CAF9',
      tension: 0.3
    },
    {
      label: 'Materiais (Kg)',
      data: {!! json_encode($dadosConsumo->pluck('materiais')) !!},
      borderColor: '#FFB300',
      backgroundColor: '#FFE082',
      tension: 0.3
    }
  ]
};
new Chart(ctx, { type: 'line', data: chartData });
</script>
@endsection
