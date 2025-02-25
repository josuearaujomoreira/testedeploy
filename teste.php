<form id="deployForm">
    <input type="text" id="repo" name="repo" placeholder="Nome do Repositório" required><br>
    <input type="number" id="ram" name="ram" placeholder="RAM" required><br>
    <input type="number" id="cpu" name="cpu" placeholder="CPUs" required><br>
    <input type="number" id="disk" name="disk" placeholder="Espaço em Disco" required><br>
    <button type="submit">Iniciar Deploy</button>
</form>

<script>
document.getElementById('deployForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const repo = document.getElementById('repo').value;
    const ram = document.getElementById('ram').value + 'm';  // ex: 8m para 8GB
    const cpu = document.getElementById('cpu').value;
    const disk = document.getElementById('disk').value + 'g'; // ex: 20g para 20GB

    const data = {
        repo: repo,
        ram: ram,
        cpu: cpu,
        disk: disk
    };

    fetch('http://<IP_DA_SUA_VPS>/api/start_deploy_api.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            alert('Deploy iniciado com sucesso!');
        } else {
            alert('Erro ao iniciar deploy: ' + data.message);
        }
    })
    .catch(error => {
        alert('Erro na requisição: ' + error);
    });
});
</script>
