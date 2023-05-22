<?php
require '../../config.php';
require '../../verificar1.php';
require 'ultimoscadastros.php';
require '../../admin.php';


// Consulta para recuperar as quantidades de livros baixados para todos os meses
$result = $pdo->prepare("SELECT COUNT(*) as count, MONTH(hora_baixado) as month FROM baixados GROUP BY MONTH(hora_baixado)");

// Array para armazenar as quantidades de livros baixados para cada mês
$downloads_per_month = array_fill(0, 12, 0);

$result->execute();

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $downloads_per_month[$row['month'] - 1] = $row['count'];
}

?>



<script>
var ctx = document.getElementById('downloadsChart5').getContext('2d');
var downloadsChart5 = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        datasets: [{
            label: 'Livros baixados por mês',
            data: <?php echo json_encode($downloads_per_month); ?>,
            borderColor: 'blue',
            fill: false
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
